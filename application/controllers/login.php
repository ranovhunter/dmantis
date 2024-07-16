<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Login
 *
 *  @author Hunter Nainggolan
 *  @date June 10th, 2023
 */
class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->layout_dir = 'layout/login/';
        $this->page_dir = 'login/';
        if ($this->session->userdata('sess-loggedin')) {
            redirect(site_url());
        }
    }

    function index() {
        if ($this->input->post('submit')) {
            $this->form_validation->set_error_delimiters("<li>", "</li>");
            $this->form_validation->set_rules('txt_userid', 'User ID', 'trim|xss_clean|required');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
            if ($this->form_validation->run()) {
                $this->load->model('user_model', 'muser');
                $rec_user = $this->muser->get_data(null, array('id' => $this->input->post('txt_userid')), null, null, null, null, 'row');
                if ($this->muser->total_rows == 1) {
                    if (sha1($_POST ['password']) == $rec_user->password) {
                            $this->session->set_userdata(array(
                                'sess-id' => $rec_user->id,
                                'sess-name' => $rec_user->name,
                                'sess-role' => $rec_user->roles,
                                'sess-personalid' => $rec_user->personalid,
                                'sess-loggedin' => true,
                                'sess-starttime' => date('Y-m-d H:i:s')
                            ));
                            redirect(site_url('dashboard'));
                        
                    } else {
                        $this->data ['form_validation_errors'] = wrap_text('Your password doesn\'t match');
                    }
                } else {
                    $this->data ['form_validation_errors'] = wrap_text('Your User ID is not Registered');
                }
            } else {
                $this->data ['form_validation_errors'] = validation_errors();
            }
        }
        $this->data ['html_title'] = 'Administration Login';
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

}

/**
 * End of file login.php
 * Location : ./application/controllers/login.php
 */