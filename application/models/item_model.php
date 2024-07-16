<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Item_model
 * created by : Hunter Nainggolan <hunter.nainggolan@gmail.com>
 * date : Dec 18th, 2023
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
     * @date April 4, 2023
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
     * @date April 4, 2023
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
     * @date April 4, 2023
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

    /**
     * get_search
     * to search data from site table
     * @author hunter.nainggolan
     * @date April 4, 2023
     * @access public
     * 
     * @param array $keyword, $limit, $offset
     * @return result_array
     */
    public function get_search($keyword, $limit, $offset) {
        $sql = "Select * from v_item where id like '%" . $keyword . "%' or name like '%" . $keyword . "%' or asset_number like '%" . $keyword . "%' or serial_number like '%" . $keyword . "%' LIMIT $limit OFFSET $offset";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * get_tools_by_condition
     * to retrieve tools by condition from site table
     * @author hunter.nainggolan
     * @date April 4, 2023
     * @access public
     * 
     * @param array $condition
     * @return total_tools
     */
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

    /**
     * get_by_id
     * to retrieve tools by id from site table
     * @author hunter.nainggolan
     * @date April 4, 2023
     * @access public
     * 
     * @param array $id
     * @return result_array
     */
    public function get_by_id($id) {
        $sql = "Select * from item where id IN (" . $id . ")";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

/**
 * End of file item_model.php
 * Location: ./application/models/item_model.php
 */