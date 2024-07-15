<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Dashboar
 *
 *  @author Hunter Ninggolan
 *  @date June 10th, 2019
 */
class Users extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'users/';
        $this->data['menu'] = 'users';
        $this->data['active_menu'] = 'users';
        $this->data['mainData'] = null;
        $this->data['ishome'] = true;
        $this->load->model('user_model', 'muser');
    }

    function index() {
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'MY Request Info';
        $where = array('roles' => 'user');
        $this->data['list_user'] = $this->muser->get_data(null, $where);

        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function reset() {
        $id = $this->uri->segment(3);
        $new_password = generate_random_string();
        $this->data ['user_update'] = $this->muser->get_data(null, array('id' => $id), null, null, null, null, 'row');
        if ($this->muser->edit_data(array('password' => sha1($new_password)), array('id' => $id))) {
            $this->session->set_flashdata('info_messages', $this->data ['user_update']->email . ' Password Successful Reset to <b><u>' . $new_password . '</u></b>');
            redirect('users');
        } else {
            $this->session->set_flashdata('err_messages', $this->data ['user_update']->email . ' Failed to Reset Password');
            redirect('users');
        }
    }

    function asset() {
        $this->data['userid'] = $this->uri->segment(3);
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'MY Request Info';
        $this->load->model('user_item_model', 'user_item');
        $this->data['list_item'] = $this->user_item->get_data(null, array('user_id' => $this->data['userid']));
        $this->data ['page'] = $this->load->view($this->get_page('asset'), $this->data, true);
        $this->render();
    }

    function add() {
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Administration';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'User Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_phone', 'Phone Number', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_job', 'Job Position', 'trim|xss_clean|required');
            if ($this->data['userdata']['sess-role'] == 'admin') {
                $this->form_validation->set_rules('txt_userid', 'User ID', 'trim|xss_clean|required');
            } else {
                $this->form_validation->set_rules('txt_email', 'Email Address', 'trim|xss_clean|required');
            }

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'id' => $this->input->post('txt_userid'),
                    'name' => $this->input->post('txt_name'),
                    'phonenumber' => $this->input->post('txt_phone'),
                    'jobposition' => $this->input->post('txt_job'),
                    'insert_user' => $this->session->userdata('sess-id'),
                    'insert_date' => date("Y-m-d H:i:s")
                );
                $cek = $this->muser->get_data('id', array('id' => $data['id']), null, null, null, null, 'row');
                $is_exist = $cek == array() ? false : true;
                $data['roles'] = ($this->data['userdata']['sess-role'] == 'admin') ? 'user' : 'admin';
                if ($is_exist) {
                    $this->data ['error_messages'] = get_messages('User Already Registered');
                } else {
                    if ($this->muser->add_data($data)) {
                        $this->session->set_flashdata('info_messages', 'Users Registered Successful');
                        redirect('users');
                    } else {
                        $this->data ['error_messages'] = get_messages('Failed to add User');
                    }
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['page'] = $this->load->view($this->get_page('add'), $this->data, true);
        $this->render();
    }

    function edit() {
        $id = $this->uri->segment(3);
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Administration';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'User Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_phone', 'Phone Number', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_job', 'Job Position', 'trim|xss_clean|required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'phonenumber' => $this->input->post('txt_phone'),
                    'jobposition' => $this->input->post('txt_job'),
                    'update_user' => $this->session->userdata('sess-id'),
                    'update_date' => date("Y-m-d H:i:s")
                );
                if ($this->muser->edit_data($data, array('id' => $id))) {
                    $this->session->set_flashdata('info_messages', 'Users Updated Successful');
                    redirect('users');
                } else {
                    $this->data ['error_messages'] = get_messages('Failed to add Area');
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['rec_user'] = $this->muser->get_data(null, array('id' => $id), null, null, null, null, 'row');
        $this->data ['page'] = $this->load->view($this->get_page('edit'), $this->data, true);
        $this->render();
    }

}

/**
 * End of file home.php
 * Location : ./application/controllers/home.php
 */