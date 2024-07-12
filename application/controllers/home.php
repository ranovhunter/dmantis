<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'muser');
        $this->load->model('item_model', 'item');
        $this->layout_dir = 'layout/home/';
        $this->page_dir = 'home/';
    }

    function index() {
        $this->session->sess_destroy();
        $this->layout_dir = 'layout/user/';
        $this->data ['html_title'] = 'Rent';
        if ($this->input->post('submit')) {
            $this->form_validation->set_error_delimiters("<li>", "</li>");
            $this->form_validation->set_rules('txt_userid', 'User ID', 'trim|xss_clean|required');
            if ($this->form_validation->run()) {
                $rec_user = $this->muser->get_data(null, array('id' => $this->input->post('txt_userid'), 'roles' => 'user'), null, null, null, null, 'row');
                if ($this->muser->total_rows == 1) {
                    redirect(site_url('home/request/' . $rec_user->id));
                } else {
                    $this->data ['form_validation_errors'] = wrap_text('Your User ID is not Registered');
                }
            } else {
                $this->data ['form_validation_errors'] = validation_errors();
            }
        }
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function request() {
        $this->data['active_menu'] = 'dashboard';
        $this->data ['html_title'] = 'Rent';
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['rec_user'] = $this->muser->get_data(null, array('id' => $this->data['userid'], 'roles' => 'user'), null, null, null, null, 'row');
        if ($this->data['rec_user'] == array())
            redirect(site_url('home'));
        $this->data['data_cart'] = $this->session->userdata('cart') ? $this->session->userdata('cart') : array();
        $this->data['list_items'] = $this->item->get_data(null, "icondition IN ('good') and istatus = 1");
        $this->data ['page'] = $this->load->view($this->get_page('request'), $this->data, true);
        $this->render();
    }

    function cart() {
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['active_menu'] = 'dashboard';
        $this->data ['html_title'] = 'Cart';
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['rec_user'] = $this->muser->get_data(null, array('id' => $this->data['userid'], 'roles' => 'user'), null, null, null, null, 'row');
        $id = $this->session->userdata('cart');
        if ($id) {
            $item_id = implode(',', $id);
            $this->data ['list_data'] = $this->item->get_data(null, 'id IN (' . $item_id . ')');
        } else {
            $this->data ['list_data'] = array();
        }
        $this->data ['page'] = $this->load->view($this->get_page('cart'), $this->data, true);
        $this->render();
    }

    function add_cart() {
        $item_id = $this->input->post('itemid');
        if ($this->session->userdata('cart')) {
            $scart = $this->session->userdata('cart');
            $scart[$item_id] = $item_id;
        } else {
            $scart = array($item_id => $item_id);
        }
        $this->session->set_userdata(array('cart' => $scart));
        echo true;
    }

    function remove_cart() {
        $item_id = $this->input->post('itemid');
        $scart = $this->session->userdata('cart');
        unset($scart[$item_id]);
        $this->session->set_userdata(array('cart' => $scart));
        echo true;
    }

    function emcart() {
        $userid = $this->uri->segment(3);
        $this->session->sess_destroy();
        $this->session->set_flashdata('info_messages', 'Cart Empty Successfully');
        redirect(site_url('home/request/' . $userid));
    }

    function rmcart() {
        $userid = $this->uri->segment(3);
        $item_id = $this->uri->segment(4);
        $scart = $this->session->userdata('cart');
        unset($scart[$item_id]);
        $this->session->set_userdata(array('cart' => $scart));
        $this->session->set_flashdata('info_messages', 'Cart Empty Successfully');
        redirect(site_url('home/cart/' . $userid));
    }

    function confirm() {
        $userid = $this->uri->segment(3);
        $insertdata = $this->session->userdata('cart');
        if ($insertdata) {
            $this->load->model('rent_model', 'rent');
            //Insert into database
            foreach ($insertdata as $row) {
                $arr_data = array(
                    'item_id' => $row, //Belum di kirim
                    'request_date' => date('Y-m-d H:i:s'),
                    'rstatus' => 3,
                    'icondition' => 'good',
                    'rent_user' => $userid
                );
                if ($this->rent->add_data($arr_data)) {
                    $this->item->edit_data(array('istatus' => 0), array('id' => $row));
                }
            }
            $this->session->sess_destroy();
            redirect(site_url('home/history/' . $userid));
        } else {
            redirect(site_url('home/request/' . $userid));
        }
    }

    function history() {
        $this->data['max_rows'] =9;
        $this->load->model('rent_model', 'rent');
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['active_menu'] = 'history';
        $this->data ['html_title'] = 'History';
        $page = $this->uri->segment(4);

        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data['rec_user'] = $this->muser->get_data(null, array('id' => $this->data['userid'], 'roles' => 'user'), null, null, null, null, 'row');

        $this->data ['list_data'] = $this->rent->get_data(null, array('rent_user' => $this->data['userid']), $this->data['max_rows'], $this->data['offset'],'rstatus DESC');
        $this->data['pagination'] = $this->build_pagination(base_url() . 'home/history/' . $this->data['userid'] . '/', 4, $this->rent->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page('history'), $this->data, true);
        $this->render();
    }

}

/**
     * End of file home.php
     * Location : ./application/controllers/home.php
     */
    