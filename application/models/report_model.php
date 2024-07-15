<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Report_model
 * created by : Hunter Nainggolan <hunter.nainggolan@gmail.com>
 * date : Dec 5th, 2019
 */
class Report_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->set_table('report');
    }

    /**
     * function add_data
     * to add data to site table
     * @author hunter.nainggolan
     * @date April 4, 2015
     * @access public
     * 
     * @param array $data  
     * @return boolean
     */
    public function add_data($data) {
        $this->trans_begin();
        $this->insert($data);
        $this->insert_id = $this->get_insert_id();
        if ($this->trans_status()) {
            $this->trans_commit();
            return true;
        } else {
            $this->trans_rollback();
            return false;
        }
    }

    /**
     * edit_data
     * to change data in site table
     * @author hunter.nainggolan
     * @date April 4, 2015
     * @access public
     * 
     * @param array $data
     * @param array $where 
     * @return boolean
     */
    public function edit_data($data, $where = null) {
        $this->trans_begin();
        $this->update($data, $where);
        if ($this->trans_status()) {
            $this->trans_commit();
            return true;
        } else {
            $this->trans_rollback();
            return false;
        }
    }

    /**
     * delete_data
     * to delete data from site table
     * @author hunter.nainggolan
     * @date April 4, 2015
     * @access public
     * 
     * @param array $where
     * @return boolean
     */
    public function delete_data($where = null) {
        $this->trans_begin();
        $this->delete($where);
        if ($this->trans_status()) {
            $this->trans_commit();
            return true;
        } else {
            $this->trans_rollback();
            return false;
        }
    }

    public function get_total_report() {
        $result = $this->get_data('count(id) AS total_report', null, null, null, null, null, 'row');
        return $result->total_report;
    }

}

/**
 * End of file report_model.php
 * Location: ./application/models/report_model.php
 */