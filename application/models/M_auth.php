<?php

class M_auth extends CI_Model
{
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function ceklogin($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function cekdata($where = null)
    {
        return $this->db->get_where('users', $where);
    }
}
