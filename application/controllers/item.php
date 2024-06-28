<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Purchasing
 *
 *  @author Hunter Ninggolan
 *  @date March 16th, 2015
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
        $this->data ['list_data'] = $this->item->get_data(null, "icondition IN('good','incomplete')", $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . '/item/index/', $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function stored() {
        $this->data ['enable_search'] = true;
        $this->data ['action_search'] = site_url('item/index/');
        if ($this->input->post('search')) {
            redirect(site_url('item/search/' . str_rot13($this->input->post('tx_search'))));
        }
        $page = $this->uri->rsegment(3, 0);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data ['curr_poss'] = 'stored';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Item - Stored';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Inventory';
        $this->data ['list_data'] = $this->item->get_data(null, "icondition IN('broken','lost')", $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . '/item/stored/', $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function add() {
        $this->load->library('Ciqrcode');
        $this->data ['curr_poss'] = 'new';
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Detail', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_sn', 'Serial Number', 'trim|xss_clean|required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'qrcode' => 'ITM' . date('ymdHis'),
                    'serial_number' => $this->input->post('txt_sn'),
                    'details' => $this->input->post('txt_detail'),
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
        $this->data ['rec_data'] = $this->item->get_data(null, array('id' => $this->data['id']), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_name', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Detail', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_sn', 'Serial Number', 'trim|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('txt_name'),
                    'serial_number' => $this->input->post('txt_sn'),
                    'details' => $this->input->post('txt_detail'),
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
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Update Item';
        $this->data ['page'] = $this->load->view($this->get_page('update'), $this->data, true);
        $this->render();
    }

    function decommissioned() {
        $page = $this->uri->rsegment(3, 0);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data ['curr_poss'] = 'decommissioned';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Decommissioned Item';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'List Decommissioned Item';
        $this->data ['list_po'] = $this->item->get_data(null, array('status' => 0), $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . 'item/decommissioned/', $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function search() {
        $this->data ['enable_search'] = true;
        $this->data ['action_search'] = site_url('purchasing/index/');
        $this->data['keyword'] = str_rot13($this->uri->rsegment(3, 0));
        $page = $this->uri->rsegment(4, 0);
        $this->data['offset'] = get_offset($page, $this->data['max_rows']);
        $this->data ['curr_poss'] = 'new';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Purchasing - Index';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['page_title'] = 'Daftar Users';
        $this->data ['list_data'] = $this->item->get_search($this->data['keyword'], $this->data['max_rows'], $this->data['offset']);
        //$this->data ['list_po'] = $this->purchaseorder->get_search($this->data['keyword'], $this->data['max_rows'], $this->data['offset']);
        $this->data['pagination'] = $this->build_pagination(site_url() . '/item/search/' . str_rot13($this->data['keyword']), $this->uri->total_segments(), $this->item->total_rows, $this->data['max_rows'], $this->data['numlinks']);
        $this->data ['page'] = $this->load->view($this->get_page('search'), $this->data, true);
        $this->render();
    }

    function assign() {
        $this->data['id'] = $this->uri->segment(3);
        $this->load->model('user_model', 'user');
        $this->data['list_user'] = $this->user->get_data(array('id', 'name'), array('status' => 1), null, null, 'name asc');
        $this->data ['rec_data'] = $this->item->get_data(null, array('id' => $this->data['id'], 'status' => 1), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cmb_user', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Detail', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_received_date', 'Receive Date', 'trim|xss_clean|required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'item_id' => $this->data['id'],
                    'user_id' => $this->input->post('cmb_user'),
                    'detail' => $this->input->post('txt_detail'),
                    'received_date' => $this->input->post('txt_received_date'),
                    'insert_user' => $this->session->userdata('sess-id'),
                    'insert_date' => date("Y-m-d H:i:s")
                );
                $config = array(
                    'upload_path' => UPLOAD_PATH_LOCATION,
                    'allowed_types' => 'jpg|jpeg|png',
                    'overwrite' => true,
                    'remove_spaces' => true
                );
                $config_doc = array(
                    'upload_path' => UPLOAD_PATH_DOC,
                    'allowed_types' => 'pdf',
                    'overwrite' => true,
                    'remove_spaces' => true
                );
                $this->load->library('upload');
                $err_msg = '';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('img_loc')) {
                    $location = $uploaddata = $this->upload->data();
                    $info = pathinfo($_FILES ['img_loc'] ['name']);
                    $rawname = 'LOC' . date('ymdHis');
                    $this->data['filename'] = $rawname . '.' . $info ['extension'];
                    rename($uploaddata ['full_path'], $uploaddata ['file_path'] . $this->data['filename']);
                    $data['location'] = $this->data['filename'];
                } else {
                    $err_msg = 'Image Location : ' . $this->upload->display_errors() . '<br/><br/>';
                }
                /* $this->upload->initialize($config_doc, true);
                  if ($this->upload->do_upload('r_doc')) {
                  $duploaddata = $this->upload->data();
                  $info = pathinfo($_FILES ['r_doc'] ['name']);
                  $rawname = 'Receive' . date('ymdHis');
                  $this->data['docname'] = $rawname . '.' . $info ['extension'];
                  rename($duploaddata ['full_path'], $duploaddata ['file_path'] . $this->data['docname']);
                  $data['receive_doc'] = $this->data['docname'];
                  } else {
                  $err_msg .= 'Form BAST : ' . $this->upload->display_errors();
                  } */
                if ($err_msg == '') {
                    $username = null;
                    foreach ($this->data['list_user'] as $row) {
                        if ($data['user_id'] == $row->id) {
                            $username = $row->name;
                            break;
                        }
                    }
                    if ($this->user_item->add_data($data)) {
                        $this->item->edit_data(array('status' => 2), array('id' => $this->data['id']));
                        $this->session->set_flashdata('info_messages', 'Inventory  successfully assign to ' . $username);
                        redirect(site_url('item/detail/' . $this->data['id']));
                    } else {
                        $this->session->set_flashdata('err_messages', 'Failed to Assign Inventory. Please Try again, or contact system administrator');
                        redirect(site_url('item/assign/' . $this->data['id']));
                    }
                } else {
                    $this->data ['error_messages'] = get_messages($err_msg);
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Assign Item';
        $this->data ['page'] = $this->load->view($this->get_page('assign'), $this->data, true);
        $this->render();
    }

    function aupdate() {
        $this->data['id'] = $this->uri->segment(3);
        $this->load->model('user_model', 'user');
        $this->data['list_user'] = $this->user->get_data(array('id', 'name'), array('status' => 1), null, null, 'name asc');
        $this->data ['rec_data'] = $this->user_item->get_data(null, 'return_date IS NULL and id=' . $this->data['id'], null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('cmb_user', 'Name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('txt_detail', 'Detail', 'trim|xss_clean');
            $this->form_validation->set_rules('txt_received_date', 'Received Date', 'trim|xss_clean|required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'user_id' => $this->input->post('cmb_user'),
                    'detail' => $this->input->post('txt_detail'),
                    'received_date' => $this->input->post('txt_received_date'),
                    'update_user' => $this->session->userdata('sess-id'),
                    'update_date' => date("Y-m-d H:i:s")
                );
                $config = array(
                    'upload_path' => UPLOAD_PATH_LOCATION,
                    'allowed_types' => 'jpg|jpeg|png',
                    'overwrite' => true,
                    'remove_spaces' => true
                );
                $config_doc = array(
                    'upload_path' => UPLOAD_PATH_DOC,
                    'allowed_types' => 'pdf',
                    'overwrite' => true,
                    'remove_spaces' => true
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                $err_msg = '';
                if ($_FILES['img_loc']['error'] == 0) {
                    if ($this->upload->do_upload('img_loc')) {
                        $location = $uploaddata = $this->upload->data();
                        $info = pathinfo($_FILES ['img_loc'] ['name']);
                        $rawname = 'LOC' . date('ymdHis');
                        $this->data['filename'] = $rawname . '.' . $info ['extension'];
                        rename($uploaddata ['full_path'], $uploaddata ['file_path'] . $this->data['filename']);
                        $data['location'] = $this->data['filename'];
                    } else {
                        $err_msg = 'Image Location : ' . $this->upload->display_errors() . '<br/><br/>';
                    }
                }
                if ($_FILES['r_doc']['error'] == 0) {
                    $this->upload->initialize($config_doc, true);
                    if ($this->upload->do_upload('r_doc')) {
                        $duploaddata = $this->upload->data();
                        $info = pathinfo($_FILES ['r_doc'] ['name']);
                        $rawname = 'Receive' . date('ymdHis');
                        $this->data['docname'] = $rawname . '.' . $info ['extension'];
                        rename($duploaddata ['full_path'], $duploaddata ['file_path'] . $this->data['docname']);
                        $data['receive_doc'] = $this->data['docname'];
                    } else {
                        $err_msg .= ' Form BAST : ' . $this->upload->display_errors();
                    }
                }
                if ($err_msg == '') {
                    $username = null;
                    foreach ($this->data['list_user'] as $row) {
                        if ($data['user_id'] == $row->id) {
                            $username = $row->name;
                            break;
                        }
                    }
                    if ($this->user_item->edit_data($data, array('id' => $this->data['id']))) {
                        $this->session->set_flashdata('info_messages', 'Inventory  assign successfully updated to ' . $username);
                        redirect(site_url('item/detail/' . $this->data ['rec_data']->item_id));
                    } else {
                        $this->session->set_flashdata('err_messages', 'Failed to Assign Inventory. Please Try again, or contact system administrator');
                        redirect(site_url('item/assign/' . $this->data ['rec_data']->item_id));
                    }
                } else {
                    $this->data ['error_messages'] = get_messages($err_msg);
                }
            } else {
                $this->data ['error_messages'] = validation_errors() ? get_messages(validation_errors()) : '';
            }
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Assign Item';
        $this->data ['page'] = $this->load->view($this->get_page('aupdate'), $this->data, true);
        $this->render();
    }

    function ireturn() {
        $this->data['id'] = $this->uri->segment(3);
        $this->data ['rec_data'] = $this->user_item->get_data(null, array('id' => $this->data['id']), null, null, null, null, 'row');
        if ($this->data ['rec_data'] == array())
            redirect(site_url('item'));
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('txt_return_date', 'Return Date', 'trim|xss_clean|required');
            $data = array(
                'return_date' => $this->input->post('txt_return_date'),
                'update_user' => $this->session->userdata('sess-id'),
                'update_date' => date("Y-m-d H:i:s")
            );
            if ($this->user_item->edit_data($data, array('id' => $this->data['id']))) {
                $this->item->edit_data(array('status' => 1), array('id' => $this->data['id']));
                $this->session->set_flashdata('info_messages', 'Inventory  successfully Return');
                redirect(site_url('item/detail/' . $this->data['id']));
            } else {
                $this->session->set_flashdata('err_messages', 'Failed to Return Inventory. Please Try again, or contact system administrator');
                redirect(site_url('item/assign/' . $this->data['id']));
            }
        }
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page_title'] = 'Assign Item';
        $this->data ['page'] = $this->load->view($this->get_page('ireturn'), $this->data, true);
        $this->render();
    }

}

/**
     * End of file purchaseorder.php
     * Location : ./application/controllers/purchaseorder.php
     */
    