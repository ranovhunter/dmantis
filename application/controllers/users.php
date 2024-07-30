<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Users
 *
 *  @author Hunter Nainggolan
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
        $this->load->library('Ciqrcode');
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'User Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_phone', 'Phone Number', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_job', 'Job Position', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_nrp', 'NRP', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_gl', 'NRP', 'trim|xss_clean');
            if ($this->data['userdata']['sess-role'] != 'admin') {
                $this->form_validation->set_rules('txt_email', 'Email Address', 'trim|xss_clean|required');
            }

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nrp' => $this->input->post('txt_nrp'),
                    'name' => $this->input->post('txt_name'),
                    'phonenumber' => $this->input->post('txt_phone'),
                    'jobposition' => $this->input->post('txt_job'),
                    'groupleader' => $this->input->post('txt_gl'),
                    'id' => 'U' . date('ymdHis'),
                    'insert_user' => $this->session->userdata('sess-id'),
                    'insert_date' => date("Y-m-d H:i:s")
                );
                $where = "roles = 'user' AND (id = '" . $data['id'] . "' OR nrp = '" . $data['id'] . "')";
                $cek = $this->muser->get_data('id', $where, null, null, null, null, 'row');
                $is_exist = $cek == array() ? false : true;
                $data['roles'] = ($this->data['userdata']['sess-role'] == 'admin') ? 'user' : 'admin';
                if ($is_exist) {
                    $this->data ['error_messages'] = get_messages('User Already Registered');
                } else {
                    if ($this->muser->add_data($data)) {
                        $params['data'] = $data['id'];
                        $params['level'] = 'H';
                        $params['size'] = 20;
                        $params['savename'] = QR_PATH . DIRECTORY_SEPARATOR . $data['id'] . '.png';
                        $this->ciqrcode->generate($params);
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
            $this->form_validation->set_rules('txt_nrp', 'NRP', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_gl', 'NRP', 'trim|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'phonenumber' => $this->input->post('txt_phone'),
                    'jobposition' => $this->input->post('txt_job'),
                    'nrp' => $this->input->post('txt_nrp'),
                    'groupleader' => $this->input->post('txt_gl'),
                    'update_user' => $this->session->userdata('sess-id'),
                    'update_date' => date("Y-m-d H:i:s")
                );
                $where_cek = "nrp ='".$data['nrp']."' and id <> '".$id."'";
                $cek = $this->muser->get_data('id', $where_cek , null, null, null, null, 'row');
                if ($cek == array()) {
                    if ($this->muser->edit_data($data, array('id' => $id))) {
                        $this->session->set_flashdata('info_messages', 'Users Updated Successful');
                        redirect('users');
                    } else {
                        $this->data ['error_messages'] = get_messages('Failed to add User');
                    }
                } else {
                    $this->data ['error_messages'] = get_messages('NRP has already registered on the System');
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['rec_user'] = $this->muser->get_data(null, array('id' => $id), null, null, null, null, 'row');
        $this->data ['page'] = $this->load->view($this->get_page('edit'), $this->data, true);
        $this->render();
    }

    function rent() {
        $this->data['max_rows'] = 9;
        $this->load->model('rent_model', 'rent');
        $this->data['userid'] = $this->uri->segment(3);
        $this->data['active_menu'] = 'history';
        $this->data ['html_title'] = 'History';
        $page = $this->uri->segment(4);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data['rec_user'] = $this->muser->get_data(null, array('id' => $this->data['userid'], 'roles' => 'user'), null, null, null, null, 'row');
        $this->data ['list_data'] = $this->rent->get_data(null, array('rent_user' => $this->data['userid']), $this->data['max_rows'], $this->data['offset'], 'rstatus DESC');
        $this->data['pagination'] = $this->build_pagination(base_url() . 'users/rent/' . $this->data['userid'] . '/', 4, $this->rent->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page('rent'), $this->data, true);
        $this->render();
    }

}

/**
 * End of file users.php
 * Location : ./application/controllers/users.php
 */