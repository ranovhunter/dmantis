<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Area_model
 * created by : Hunter Nainggolan <hunter.nainggolan@gmail.com>
 * date : Dec 5th, 2023
 */
class Area_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->set_table('areas');
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
     * get_all_cat
     * to get all area data from area table
     * @author hunter.nainggolan
     * @date July 10, 2024
     * @access public
     * 
     * @return $list_category
     */
    function get_all_cat() {
        $parent_category = $this->get_data(null, array('parent_id' => 0));
        $list_category = array();
        foreach ($parent_category as $row) {
            $list_category[$row->id]['id'] = $row->id;
            $list_category[$row->id]['name'] = $row->name;
            $list_category[$row->id]['detail'] = $row->detail;
            $list_category[$row->id]['child'] = $this->get_data(null, array('parent_id' => $row->id));
        }
        return $list_category;
    }
}

/**
 * End of file area_model.php
 * Location: ./application/models/area_model.php
 */