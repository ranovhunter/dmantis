<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Info_model
 * created by : Hunter Nainggolan <hunter.nainggolan@gmail.com>
 * date : April 04th, 2015
 */
class User_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->set_table('users');
    }

    /**
     * function add_data
     * to add data to company table
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
     * to change data in company table
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
     * to delete data from company table
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

    /**
     * get_total
     * @author hunter.nainggolan
     * @date June 14th, 2019
     * @access public
     * 
     * @return array
     */
    public function get_total($utype = 'all') {
        switch ($utype) {
            case 'all':
                $data = $this->get_data(array('id'));
                break;
            case 'user':
                $data = $this->get_data(array('id'), array('role' => 2));
                break;
            case 'admin':
                $data = $this->get_data(array('id'), array('role' => 1));
                break;
        }
        return $this->num_rows;
        ;
    }

}

/**
 * End of file info_model.php
 * Location: ./application/models/info_model.php
 */