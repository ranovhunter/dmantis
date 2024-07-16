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
        $id = $this->uri->segment(3);
        $this->data ['report_data'] = $this->report->get_data(null, array('id' => $id), null, null, null, null, 'row');
        $this->data ['page_icon'] = 'icomoon-icon-plus';
        $this->data ['page'] = $this->load->view($this->get_page('detail'), $this->data, true);
        $this->render();
    }

    function print() {
        $this->load->model('report_model', 'report');
        $data['rec_data']['report_id'] = $this->uri->segment(3);
        $report_detail = $this->report->get_data(null, array('id' => $data['rec_data']['report_id']), null, null, null, null, 'row');
        if ($report_detail != array()) {
            $data['rec_data']['report_number'] = $report_detail->id;
            $data['rec_data']['date'] = extract_date($report_detail->report_date);
            $data['rec_data']['name'] = $report_detail->rent_user_name;
            $data['rec_data']['position'] = $report_detail->jobposition;
            $data['rec_data']['location'] = $report_detail->location;
            $data['rec_data']['detail'] = $report_detail->detail;
            $data['rec_data']['filename'] = $report_detail->filename;
            $data['rec_data']['determined'] = $report_detail->determined;
            $data['rec_data']['dposition'] = $report_detail->dposition;
            $data['rec_data']['acknowledge'] = $report_detail->acknowledge;
            $data['rec_data']['aposition'] = $report_detail->aposition;
            $data['rec_data']['condition'] = $report_detail->reason;
            $data['rec_data']['charged'] = explode(";", $report_detail->charged);
            $this->load->view('report/print', $data);
        } else {
            redirect(site_url('report'));
        }
    }

}

/**
 * End of file modules.php
 * Location : ./application/controllers/modules.php
 */