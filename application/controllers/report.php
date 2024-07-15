<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Category
 *
 *  @author Hunter Ninggolan
 *  @date March 16th, 2015
 */
class Report extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged();
        $this->layout_dir = 'layout/';
        $this->page_dir = 'report/';
        $this->load->model('Report_model', 'report');
        $this->data['active_menu'] = 'report';
    }

    function index() {
        $this->data ['page_title'] = 'Reports';
        $this->data ['page_icon'] = 'icomoon-icon-list';
        $this->data ['report_data'] = $this->report->get_data();
        $this->data ['page'] = $this->load->view($this->get_page(), $this->data, true);
        $this->render();
    }

    function detail() {
        $rent_id = $this->uri->segment(3);
        $this->data ['report_data'] = $this->report->get_data(null, array('rent_id' => $rent_id), null, null, null, null, 'row');
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page'] = $this->load->view($this->get_page('detail'), $this->data, true);
        $this->render();
    }

}

/**
 * End of file modules.php
 * Location : ./application/controllers/modules.php
 */