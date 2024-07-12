<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Item_model
 * created by : Hunter Nainggolan <hunter.nainggolan@gmail.com>
 * date : Dec 18th, 2019
 */
class Item_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->set_table('item');
        $this->set_view('view_item');
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

    public function get_search($keyword, $limit, $offset) {
        $sql = "Select * from v_item where id like '%" . $keyword . "%' or name like '%" . $keyword . "%' or asset_number like '%" . $keyword . "%' or serial_number like '%" . $keyword . "%' LIMIT $limit OFFSET $offset";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_tools_by_condition($condition = 'all') {
        $where = null;
        switch ($condition) {
            case 'good' :
                $where = array('icondition' => 'good');
                break;
            case 'incomplete':
                $where = array('icondition' => 'incomplete');
                break;
            case 'broken':
                $where = array('icondition' => 'broken');
                break;
            case 'lost':
                $where = array('icondition' => 'lost');
                break;
            default :
                $where = null;
        }
        $result = $this->get_data('count(id) AS total_tools', $where, null, null, null, null, 'row');
        return $result->total_tools;
    }

}

/**
 * End of file purchaseorder_model.php
 * Location: ./application/models/purchaseorder_model.php
 */