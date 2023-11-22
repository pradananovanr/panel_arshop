<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {
   
    function __construct()
    {
         parent::__construct();
    }

    var $column_order = array('account_number','account_balance','account_equity','total_order','floating','today_profit','all_profit','start_update','last_update','expert_name'); //set column field database for datatable orderable
    var $column_search = array('account_number','account_balance','account_equity','total_order','floating','today_profit','all_profit','start_update','last_update','expert_name'); //set column field database for datatable searchable
    var $order = array('account_number' => 'asc'); // default order 
 
    private function _get_datatables_query($id = null) {
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->where('token', md5($id));
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($id = null) {
        $this->_get_datatables_query($id);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id = null) {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $this->db->from('monitoring');
        return $this->db->count_all_results();
    }
    // end datatables
}
