<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_website extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function website()
    {
        $website = $this->db->query("SELECT * FROM website WHERE id = '1'")->result();


        return $website[0];
    }
}
