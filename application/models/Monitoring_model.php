<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    // start datatables
    var $column_order = array('id_monitoring', 'account_number', 'ea_name', 'ea_symbols', 'account_balance', 'account_equity', 'total_order', 'floating', 'drawdown', 'drawdown_percent', 'today_profit', 'total_profit', 'daily_profit', 'daily_percentage', 'daily_romad', 'account_location'); //set column field database for datatable orderable
    var $column_search = array('id_monitoring', 'account_number', 'ea_name', 'ea_symbols', 'account_balance', 'account_equity', 'total_order', 'floating', 'drawdown', 'drawdown_percent', 'today_profit', 'total_profit', 'daily_profit', 'daily_percentage', 'daily_romad', 'account_location'); //set column field database for datatable searchable
    var $order = array('account_number' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $token = $this->fungsi->user_login()->token;
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->where('token', $token);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from('monitoring');
        return $this->db->count_all_results();
    }
    // end datatables

    public function getMonitoringbyToken($token = null)
    {
        $this->db->from('monitoring');
        if ($token != null) {
            $this->db->where('token', $token);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMonitoringbyUser($token = null)
    {
        $this->db->from('monitoring');
        if ($token != null) {
            $this->db->where('token', md5($token));
        }
        $query = $this->db->get();
        return $query;
    }

    public function getMonitoringbyID($post = null)
    {
        $this->db->from('monitoring');
        if ($post != null) {
            $this->db->where('id_monitoring', $post);
        }
        $query = $this->db->get();
        return $query;
    }
}
