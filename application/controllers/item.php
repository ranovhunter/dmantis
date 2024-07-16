<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Item
 *
 *  @author Hunter Ninggolan
 *  @date March 16th, 2023
 */
class Item extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'item/';
        $this->load->model('item_model', 'item');
        $this->data['active_menu'] = 'item';
    }

    function index() {
        $this->data ['enable_search'] = true;
        $this->data ['action_search'] = site_url('item/index/');
        if ($this->input->post('search')) {
            redirect(site_url('item/search/' . str_rot13($this->input->post('tx_search'))));
        }
        $page = $this->uri->rsegment(3, 0);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data ['curr_poss'] = 'active';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->item->get_data(null, array('icondition' => 'good'), $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . '/item/index/', $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function inactive() {
        $page = $this->uri->rsegment(3, 0);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data ['curr_poss'] = 'inactive';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Stored';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->item->get_data(null, "icondition IN('incomplete','broken','lost')", $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . '/item/stored/', $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function add() {
        $this->load->library('Ciqrcode');
        $this->data ['curr_poss'] = 'new';
        $this->load->model('area_model', 'area');
        $this->data['list_area'] = $this->area->get_data();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('cmb_area', 'Area', 'trim|xss_clean');
            $this->form_validation->set_rules('cmb_condition', 'Condition', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_size', 'Size', 'trim|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'qrcode' => 'ITM' . date('ymdHis'),
                    'size' => $this->input->post('txt_size'),
                    'icondition' => $this->input->post('cmb_condition'),
                    'area_id' => $this->input->post('cmb_area'),
                    'insert_user' => $this->session->userdata('sess-id'),
                    'insert_date' => date("Y-m-d H:i:s")
                );
                $config = array(
                    'upload_path' => UPLOAD_PATH_ITEM,
                    'allowed_types' => 'jpg|jpeg|png',
                    'overwrite' => true,
                    'remove_spaces' => true
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_item')) {
                    $uploaddata = $this->upload->data();
                    $info = pathinfo($_FILES ['img_item'] ['name']);
                    $rawname = 'ITM' . date('ymdHis');
                    $this->data['filename'] = $rawname . '.' . $info ['extension'];
                    rename($uploaddata ['full_path'], $uploaddata ['file_path'] . $this->data['filename']);
                    $data['filename'] = $this->data['filename'];
                }
                if ($this->item->add_data($data)) {
                    $params['data'] = $data['qrcode'];
                    $params['level'] = 'H';
                    $params['size'] = 20;
                    $params['savename'] = QR_PATH . DIRECTORY_SEPARATOR . $data['qrcode'] . '.png';
                    $this->ciqrcode->generate($params);
                    $this->session->set_flashdata('info_messages', 'Inventory  successfully registered ');
                    redirect(site_url('item'));
                } else {
                    $this->session->set_flashdata('err_messages', 'Failed to Add Inventory. Please Try again, or contact system administrator');
                    redirect(site_url('item/add/'));
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'add Item';
        $this->data ['page'] = $this->load->view($this->get_page('add'), $this->data, true);
        $this->render();
    }

    function detail() {
        $this->data['id'] = $this->uri->segment(3);
        $this->data ['rec_data'] = $this->item->get_data(null, array('id' => $this->data['id']), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Detail PO';
        $this->data ['page'] = $this->load->view($this->get_page('detail'), $this->data, true);
        $this->render();
    }

    function update() {
        $this->data['id'] = $this->uri->segment(3);
        $this->load->model('area_model', 'area');
        $this->data['list_area'] = $this->area->get_data();
        $this->data ['rec_data'] = $this->item->get_data(null, array('id' => $this->data['id']), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('cmb_area', 'Area', 'trim|xss_clean');
            $this->form_validation->set_rules('cmb_condition', 'Condition', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_size', 'Size', 'trim|xss_clean');
            $data = array(
                'name' => $this->input->post('txt_name'),
                'size' => $this->input->post('txt_size'),
                'icondition' => $this->input->post('cmb_condition'),
                'area_id' => $this->input->post('cmb_area'),
                'update_user' => $this->session->userdata('sess-id'),
                'update_date' => date("Y-m-d H:i:s")
            );
            $config = array(
                'upload_path' => UPLOAD_PATH_ITEM,
                'allowed_types' => 'jpg|jpeg|png',
                'overwrite' => true,
                'remove_spaces' => true
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('img_item')) {
                $uploaddata = $this->upload->data();
                $info = pathinfo($_FILES ['img_item'] ['name']);
                $rawname = 'ITM' . date('ymdHis');
                $this->data['filename'] = $rawname . '.' . $info ['extension'];
                rename($uploaddata ['full_path'], $uploaddata ['file_path'] . $this->data['filename']);
                $data['filename'] = $this->data['filename'];
            }
            if ($this->item->edit_data($data, array('id' => $this->data['id']))) {
                $this->session->set_flashdata('info_messages', 'Inventory  successfully updated ');
                redirect(site_url('item/detail/' . $this->data['id']));
            } else {
                $this->session->set_flashdata('err_messages', 'Failed to Update Inventory. Please Try again, or contact system administrator');
                redirect(site_url('item/update/' . $this->data['id']));
            }
        } else {
            $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Update Item';
        $this->data ['page'] = $this->load->view($this->get_page('update'), $this->data, true);
        $this->render();
    }

    function print() {
        $this->data ['enable_search'] = true;
        $this->data ['action_search'] = site_url('item/index/');
        if ($this->input->post('submit')) {
            $id = $this->input->post('chk_item');
            $list_id = implode(',', $id);
            $data['list_data'] = $this->item->get_by_id($list_id);
            $this->load->view($this->get_page('printqr'), $data);
        } else {
            $this->data ['curr_poss'] = 'active';
            $this->data ['page_icon'] = 'icomoon-icon-list';
            $this->data ['page_title'] = 'Item - Index';
            $this->data ['page_icon'] = 'icomoon-icon-list';
            $this->data ['page_title'] = 'Daftar Inventory';
            $this->data ['list_data'] = $this->item->get_data(null, array('icondition' => 'good'));
            $this->data ['page'] = $this->load->view($this->get_page('print'), $this->data, true);
            $this->render();
        }
    }

}

/**
     * End of file item.php
     * Location : ./application/controllers/item.php
     */
    