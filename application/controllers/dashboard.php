<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Dashboar
 *
 *  @author Hunter Ninggolan
 *  @date June 10th, 2019
 */
class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'dashboard/';
        $this->data['menu'] = 'dashboard';
        $this->data['active_menu'] = 'dashboard';
        $this->data['mainData'] = null;
        $this->data['ishome'] = true;
    }

    function index() {
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'MY Request Info';
        $this->load->model('user_model', 'user');
        $this->load->model('item_model', 'item');
        $this->load->model('rent_model', 'rent');
        $this->data['total_user'] = $this->user->get_total_user();
        $this->data['good_tools'] = $this->item->get_tools_by_condition('good');
        $this->data['incomplete_tools'] = $this->item->get_tools_by_condition('incomplete');
        $this->data['broken_tools'] = $this->item->get_tools_by_condition('broken');
        $this->data['lost_tools'] = $this->item->get_tools_by_condition('lost');
        $this->data['all_tools'] = $this->item->get_tools_by_condition();
        $this->data['rec_req_rent'] = $this->rent->get_req_user_rent();
        $this->data['count_req'] = $this->rent->total_rows;

//        $this->load->model('user_item_model', 'user_item');
//        $this->data['list_item'] = $this->user_item->get_data(null, array('user_id' => $this->session->userdata('sess-id')));
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function profile() {
        //debug($_POST);exit();
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'MY Profile';
        $this->load->model('user_model', 'user');
        $this->data['rec_data'] = $this->user->get_data(null, array('id' => $this->session->userdata['sess-id']), null, null, null, null, 'row');
        if ($this->input->post('submit')) {
            $this->form_validation->set_error_delimiters("<li>", "</li>");
            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|xss_clean');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required|xss_clean');
            $this->form_validation->set_rules('repassword', 'Re Password', 'required|xss_clean|matches[newpassword]');
            if ($this->form_validation->run()) {
                if (sha1($this->input->post('oldpassword')) == $this->data['rec_data']->password) {

                    if ($this->user->edit_data(array('password' => sha1($this->input->post('newpassword'))), array('id' => $this->session->userdata['sess-id']))) {
                        $this->session->set_flashdata('info_messages', 'Successfully change your password');
                        redirect('dashboard/profile');
                    } else {
                        $this->data ['error_messages'] = get_messages('Failed to change your password. Please try again or contact your IT Administrator');
                    }
                } else {

                    $this->data ['form_validation_errors'] = get_messages(wrap_text('Wrong Old password'));
                }
            } else {
                $this->data ['form_validation_errors'] = get_messages(validation_errors());
            }
        }
        $this->data ['page'] = $this->load->view($this->get_page('profile'), $this->data, true);
        $this->render();
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/**
 * End of file home.php
 * Location : ./application/controllers/home.php
 */