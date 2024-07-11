<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Purchasing
 *
 *  @author Hunter Ninggolan
 *  @date March 16th, 2015
 */
class Rent extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'rent/';
        $this->load->model('rent_model', 'rent');
        $this->load->model('item_model', 'item');
        $this->load->model('user_model', 'user');
        $this->data['active_menu'] = 'rent';
    }

    function index() {
        $this->data ['curr_poss'] = 'request';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Request Rent';
        $this->data ['rec_data'] = $this->rent->get_req_user_rent();
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function ready() {
        $this->data ['curr_poss'] = 'ready';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Request Rent';
        $this->data ['rec_data'] = $this->rent->get_appr_user_rent();
        $this->data ['page'] = $this->load->view($this->get_page('ready'), $this->data, true);
        $this->render();
    }

    function active() {
        $this->data ['curr_poss'] = 'active';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Active Rent';
        $this->data ['rec_active_rent'] = $this->rent->get_active_user_rent();
        $this->data ['page'] = $this->load->view($this->get_page('active'), $this->data, true);
        $this->render();
    }

    function request() {
        $this->data['user_id'] = $this->uri->segment(3);
        $this->data['rec_user'] = $this->user->get_data(null, array('id' => $this->data['user_id']), null, null, null, null, 'row');
        if ($this->data['rec_user'] == array())
            redirect(site_url('rent'));
        $this->data ['curr_poss'] = 'request';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->rent->get_data(null, array('rstatus' => 3, 'rent_user' => $this->data['user_id']));
        if ($this->data ['list_data'] == array())
            redirect(site_url('rent'));
        if ($this->input->post('submit')) {
            $data = $this->input->post('cb_approve');

            foreach ($this->data['list_data'] as $row) {

                if (array_key_exists($row->id, $data)) {
                    $update_data = array(
                        'rstatus' => 2,
                        'approve_date' => date("Y-m-d H:i:s"),
                        'approve_user' => $this->session->userdata('sess-id')
                    );
                } else {
                    $update_data = array(
                        'rstatus' => 0,
                        'reject_date' => date("Y-m-d H:i:s"),
                        'reject_user' => $this->session->userdata('sess-id')
                    );
                    $this->item->edit_data(array('istatus' => 1), array('id' => $row->item_id));
                }
                $this->rent->edit_data($update_data, array('id' => $row->id));
            }
            $this->session->set_flashdata('info_messages', ' Request Approved');
            redirect(site_url('rent'));
        }
        $this->data ['page'] = $this->load->view($this->get_page('request'), $this->data, true);
        $this->render();
    }

    function approved() {
        $this->data['user_id'] = $this->uri->segment(3);
        $this->data ['curr_poss'] = 'approved';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->load->model('item_model', 'item');
        $this->data ['list_data'] = $this->rent->get_data(null, array('rstatus' => 2, 'rent_user' => $this->data['user_id']));
        if ($this->data ['list_data'] == array())
            redirect(site_url('rent/ready'));
        if ($this->input->post('submit')) {
            $this->out($this->data['user_id'], $this->input->post('item_qr'));
        }
        $this->data ['page'] = $this->load->view($this->get_page('approved'), $this->data, true);
        $this->render();
    }

    function out($user_id, $item_qr) {
        $item = $this->item->get_data('id,name', array('qrcode' => $item_qr), null, null, null, null, 'row');
        if ($item == array()) {
            $this->data ['err_messages'] = get_messages('Your QR Code is not registered');
        } else {
            $cek_rent = $this->rent->get_data('id', array('item_id' => $item->id, 'rent_user' => $user_id), null, null, null, null, 'row');
            if ($cek_rent == array()) {
                $this->data ['err_messages'] = get_messages('Your ID not have any Rent Request');
            } else {

                $this->rent->edit_data(array('rstatus' => 1, 'rent_date' => date('Y-m-d H:i:s')), array('id' => $cek_rent->id));
                $this->session->set_flashdata('info_messages', $item->name . ' Scan Out Successfull');
                redirect(site_url('rent/approved/' . $user_id));
            }
        }
    }

    function get_detail() {
        $user_id = $this->uri->segment(3);
        $qrvalue = $this->input->post('qrvalue');
        $result = $this->rent->get_rent_by_qr($user_id, $qrvalue);
        if ($result != array()) {
            echo "<form class='row g-3 needs-validation novalidate' action='" . site_url('rent/in/') . "' method='post' role='form' autocomplete='off'>";
            echo '<div class="col-md-6">';
            echo '<div class="form-floating">';
            echo '<input type="text" class="form-control" id="floatingName" placeholder="Tools Name" value="' . $result->item_name . '" readonly>';
            echo '<label for="floatingName">Tools Name</label>';
            echo '</div>';
            echo '</div>';
            if ($result->item_size > 0) {
                echo '<div class="col-md-6">';
                echo '<div class="form-floating">';
                echo '<input type="text" class = "form-control" id="floatingSize" placeholder="Tools Size" value="' . $result->item_size . '" readonly>';
                echo '<label for="floatingSize">Item Size</label>';
                echo '</div>';
                echo '</div>';
            }

            echo '<div class="col-md-6">';
            echo '<div class="form-floating">';
            echo '<input type="text"class="form-control" id="floatingDate" placeholder="Rent Date" value="' . $result->rent_date . '" readonly> ';
            echo '<label for="floatingDate">Rent Date</label>';
            echo '</div>';
            echo '</div>';

            echo '<div class="col-md-6">';
            echo '<div class="form-floating">';
            echo '<input type="text" class="form-control" id="floatingDetails" placeholder="Tools Size" value="' . $result->rent_user_name . '" readonly>';
            echo '<label for="floatingDetails">Rent User</label>';
            echo '</div>';
            echo '</div>';
            echo '<input type="hidden" name="txt_id" class="form-control" id="floatingID" placeholder="Item ID" value="' . $result->id . '" readonly>';

            echo '<div class = "text-center">';
            echo '<button type = "submit" class = "btn btn-primary" name = "submit" value = "submit">Confirm Received</button>';
            echo '</div>';
            echo '</form>';
        } else {
            echo '<h3>Your QR is not supported</h3>';
            echo '<p>Click Cancel or close(x) button to rescan the QR</p>';
        }
    }

    function return() {
        $this->data['user_id'] = $this->uri->segment(3);
        $this->data ['curr_poss'] = 'return';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->rent->get_data(null, array('rstatus' => 1, 'rent_user' => $this->data['user_id']));
        if ($this->data ['list_data'] == array())
            redirect(site_url('rent'));

        $this->data ['page'] = $this->load->view($this->get_page('return'), $this->data, true);
        $this->render();
    }

    function in() {
        $rent_id = $this->input->post('txt_id');
        $cek_rent = $this->rent->get_data(null, array('id' => $rent_id), null, null, null, null, 'row');

        if ($cek_rent == array()) {
            $this->session->set_flashdata('err_messages', get_messages('Your ID not have any Rent Data'));
            redirect(site_url('rent/return/' . $cek_rent->rent_user));
        } else {
            $this->item->edit_data(array('istatus' => 1), array('id' => $cek_rent->item_id));
            $update_data = array(
                'rstatus' => 0,
                'return_date' => date("Y-m-d H:i:s"),
                'return_user' => $this->session->userdata('sess-id')
            );
            $this->rent->edit_data($update_data, array('id' => $cek_rent->id));
            $this->session->set_flashdata('info_messages', $cek_rent->item_name . ' Scan in Successfull');
            redirect(site_url('rent/return/' . $cek_rent->rent_user));
        }
    }

    function report() {
        $this->data['id'] = $this->uri->segment(3);
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Rent - Report';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Rent Report';
        $this->data ['rec_data'] = $this->rent->get_data(null, array('rstatus' => 1, 'id' => $this->data['id']), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('rent/return'));
        $this->data ['page'] = $this->load->view($this->get_page('report'), $this->data, true);
        $this->render();
    }

}

/**
     * End of file rent.php
     * Location : ./application/controllers/rent.php
     */
    