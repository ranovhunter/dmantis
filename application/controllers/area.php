<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Category
 *
 *  @author Hunter Ninggolan
 *  @date March 16th, 2015
 */
class Area extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'area/';
        $this->load->model('area_model', 'area');
        $this->data['active_menu'] = 'dashboard';
    }

    function index() {
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Administration';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Area';
        $this->data ['list_area'] = $this->area->get_data();
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function add() {
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Administration';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'Category Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Category Detail', 'trim|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'detail' => $this->input->post('txt_detail'),
                    'insert_user' => $this->session->userdata('sess-id'),
                    'insert_date' => date("Y-m-d H:i:s")
                );

                if ($this->area->add_data($data)) {
                    redirect('area');
                } else {
                    $this->data ['error_messages'] = get_messages('Failed to add Area');
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['page'] = $this->load->view($this->get_page('add'), $this->data, true);
        $this->render();
    }

    function detail() {
        $this->data['id'] = $this->uri->segment(3);
        if ($this->input->post('update')) {
            $this->form_validation->set_rules('txt_name', 'Category Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Category Detail', 'trim|xss_clean');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'detail' => $this->input->post('txt_detail'),
                    'update_user' => $this->session->userdata('sess-id'),
                    'update_date' => date("Y-m-d H:i:s")
                );

                if ($this->area->edit_data($data, array('id' => $this->data['id']))) {
                    redirect('area');
                } else {
                    $this->data ['error_messages'] = get_messages('Gagal Mengupdate Data Area Ini');
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['area'] = $this->area->get_data(null, array('id' => $this->data['id']), null, null, null, null, 'row');
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Update Area';

        $this->data ['page'] = $this->load->view($this->get_page('detail'), $this->data, true);
        $this->render();
    }

    public function delete() {
        if ($this->data['userdata']['sess-role'] == 2)
            redirect('home');
        $param = $this->uri->uri_to_assoc(4);
        $key_update = '';
        if (!empty($param ['id'])) {
            $key_update = $param ['id'];
        }
        if ($this->admin->delete_data(array(
                    'id' => $key_update
                ))) {
            redirect('admin/modules');
        } else {
            $this->data ['messages'] = 'Data Gagal di Hapus';
        }
    }

}

/**
 * End of file modules.php
 * Location : ./application/controllers/modules.php
 */