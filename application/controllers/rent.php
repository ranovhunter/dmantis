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
        $this->data ['curr_poss'] = 'request';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->rent->get_data(null, array('status' => 3, 'rent_user' => $this->data['user_id']));
        if ($this->data ['list_data'] == array())
            redirect(site_url('rent'));
        if ($this->input->post('submit')) {
            $data = $this->input->post('item');
            foreach ($this->data['list_data'] as $row) {
                if ($row->quantity == $data[$row->id]) {
                    $this->rent->edit_data(array('status' => 2), array('id' => $row->id));
                } else {
                    $cstock = $this->item->get_data(null, array('id' => $row->item_id), null, null, null, null, 'row')->stock;
                    $update_stock = $row->quantity - $data[$row->id] + $cstock;
                    $this->item->edit_data(array('stock' => $update_stock), array('id' => $row->item_id));
                    $this->rent->edit_data(array('status' => 2, 'quantity' => $data[$row->id]), array('id' => $row->id));
                }
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
        $this->data ['list_data'] = $this->rent->get_data(null, array('status' => 2, 'rent_user' => $this->data['user_id']));
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
                $this->rent->edit_data(array('status' => 1, 'rent_date' => date('Y-m-d H:i:s')), array('id' => $cek_rent->id));
                $this->session->set_flashdata('info_messages', $item->name . ' Scan Out Successfull');
                redirect(site_url('rent/approved/' . $user_id));
            }
        }
    }

    function get_detail($qrvalue) {
        $user_id = $this->uri->segment(3);
        $rec_item = $this->rent->get_data(null, array('status' => 1, 'rent_user' => $user_id, 'qrcode' => $qrvalue), null, null, null, null, 'row');
        debug($rec_item);
    }

    function return() {
        $this->data['user_id'] = $this->uri->segment(3);
        $this->data ['curr_poss'] = 'return';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->rent->get_data(null, array('status' => 1, 'rent_user' => $this->data['user_id']));
        if ($this->data ['list_data'] == array())
            redirect(site_url('rent'));
        if ($this->input->post('submit')) {
//            $item_qr = $this->input->post('item_qr');
//            $item = $this->item->get_data('id,name', array('qrcode' => $item_qr), null, null, null, null, 'row');
//            if ($item == array()) {
//                $this->data ['err_messages'] = get_messages('Your QR Code is not registered');
//            } else {
//                $cek_rent = $this->rent->get_data('id', array('item_id' => $item->id, 'rent_user' => $user_id), null, null, null, null, 'row');
//                if ($cek_rent == array()) {
//                    $this->data ['err_messages'] = get_messages('Your ID not have any Rent Request');
//                } else {
//                    $this->rent->edit_data(array('status' => 0, 'return_date' => date('Y-m-d H:i:s')), array('id' => $cek_rent->id));
//                    $this->session->set_flashdata('info_messages', $item->name . ' Scan Succesfull');
//                    redirect(site_url('rent/return/' . $user_id));
//                }
//            }
        }
        $this->data ['page'] = $this->load->view($this->get_page('return'), $this->data, true);
        $this->render();
    }

}

/**
     * End of file purchaseorder.php
     * Location : ./application/controllers/purchaseorder.php
     */
    