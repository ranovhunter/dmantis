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
        $this->layout_dir = 'layout/user/';
        $this->data ['html_title'] = 'Rent';
        if ($this->input->post('submit')) {
            $this->form_validation->set_error_delimiters("<li>", "</li>");
            $this->form_validation->set_rules('txt_userid', 'User ID', 'trim|xss_clean|required');
            if ($this->form_validation->run()) {
                $rec_user = $this->muser->get_data(null, array('id' => $this->input->post('txt_userid'), 'roles' => 'user'), null, null, null, null, 'row');
                if ($this->muser->total_rows == 1) {
                    redirect(site_url('home/detail/' . $rec_user->id));
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

    function detail() {
        $this->data['active_menu'] = 'dashboard';
        $this->data ['html_title'] = 'Rent';
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['rec_user'] = $this->muser->get_data(null, array('id' => $this->data['userid'], 'roles' => 'user'), null, null, null, null, 'row');
        if ($this->input->post('confirm')) {
            $insertdata = json_decode($this->input->post('data'));
            debug($insertdata);

            //Load Database
//            $this->load->model('')
            //Insert into database
//            foreach ($insertdata as $row) {
//                $detail_data = json_decode($row);
//                $arr_data = array(
//                    'item_id' => $row['itemID'], //Belum di kirim
//                    'qty' => $row['quantity'], //Belum di kirim
//                    'request_date' => date('Y-m-d H:i:s'), 
//                    'request_user' => $this->data['userid']
//                );
//                $this->rent->add_data();
//            }
            exit();
        }
        if ($this->data['rec_user'] == array())
            redirect(site_url('home'));

        $this->data['list_items'] = $this->item->get_data(null, "icondition IN ('good','incomplete')");
        $this->data ['page'] = $this->load->view($this->get_page('detail'), $this->data, true);
        $this->render();
    }
}

/**
 * End of file login.php
 * Location : ./application/controllers/login.php
 */