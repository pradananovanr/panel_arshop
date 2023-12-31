<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct()
    {
         parent::__construct();
    }

    // start datatables
    var $column_order = array('id_user', 'username', 'fullname', 'email', 'token', 'level'); //set column field database for datatable orderable
    var $column_search = array('username', 'fullname', 'email'); //set column field database for datatable searchable
    var $order = array('id_user' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from('user');
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
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('user');
        return $this->db->count_all_results();
    }
    // end datatables

    public function login($post) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null) {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getToken($id = null) {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('token', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getbyToken($id = null) {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('token', md5($id));
        }
        $query = $this->db->get();
        return $query;
    }

    public function totalUserforAdmin() {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totalMonitoringforAdmin() {
        $this->db->select('*');
        $this->db->from('monitoring');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totalLisensiforAdmin() {
        $this->db->select('*');
        $this->db->from('code');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function addUser($post) {
        $params['username'] = $post['username'];
        $params['fullname'] = $post['fullname'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['level'] = $post['level'];
        $params['token'] = md5($post['username']);

        $this->db->insert('user', $params);
    }

    public function editUser($post) {
        if(!empty($post['username'])) {
            $params['username'] = $post['username'];
            $params['token'] = md5($post['username']);
        }

        if(!empty($post['fullname'])) {
            $params['fullname'] = $post['fullname'];
        } 

        if(!empty($post['email'])) {
            $params['email'] = $post['email'];
        }

        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }

        if(!empty($post['level'])) {
            $params['level'] = $post['level'];
        }

        $this->db->where('token', $post['token']);
        $this->db->update('user', $params);
    }

    public function deleteUser($post) {
        $this->db->where('token', $post);
        $this->db->delete('user');
    }

    public function updateApply($post) {

        $params['token'] = $post['token'];
        $params['apply_public'] = $post['apply_public'];

        $this->db->where('token', $post['token']);
        $this->db->update('user', $params);
    }
}
