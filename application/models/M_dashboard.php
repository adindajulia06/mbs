<?php


class M_dashboard extends CI_Model
{

    public function input($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function month()
    {
        $month = $this->db->query("SELECT SUM(price) AS total FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' ");
        return $month->row()->total;
    }

    public function today()
    {
        $today = $this->db->query("SELECT SUM(price) AS total FROM report WHERE date(date) = CURRENT_DATE()");
        return $today->row()->total;
    }

    public function yesterday()
    {
        $today = $this->db->query("SELECT SUM(price) AS total FROM report WHERE date(date) = CURRENT_DATE() - INTERVAL 1 DAY");
        return $today->row()->total;
    }

    public function vcrtoday()
    {
        $vcrtoday = $this->db->query("SELECT * FROM report WHERE date(date) = CURRENT_DATE()");
        return $vcrtoday->num_rows();
    }

    public function vcrystrdy()
    {
        $vcrystrdy = $this->db->query("SELECT * FROM report WHERE date(date) = CURRENT_DATE() - INTERVAL 1 DAY");
        return $vcrystrdy->num_rows();
    }

    public function vcrmonth()
    {
        $vcrmonth = $this->db->query("SELECT * FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' ");
        return $vcrmonth->num_rows();
    }

    public function datavcrmonth()
    {
        $vcrmonth = $this->db->query("SELECT * FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' ");
        return $vcrmonth;
    }

    public function totalhotspotuser()
    {
        $query = $this->db->get('orders')->num_rows();

        return $query;
    }

    public function hotspotuser()
    {
        $query = $this->db->get('orders')->result_array();

        return $query;
    }

    public function gettahunmasuk()
    {
        $query = $this->db->query("SELECT YEAR(date) AS tahun FROM report GROUP BY YEAR(date) ORDER BY YEAR(date) ASC");

        return $query->result();
    }

    public function comment()
    {

        $query = $this->db->where('user', 'Admin')->order_by('comment', 'desc')->get('orders');

        return $query;
    }
    public function get($table)
    {
        // Menghasilkan banyak row berupa objek
        return $this->db->get($table);
    }
    public function where($column, $condition)
    {
        $this->db->where($column, $condition);
        return $this;
    }

    public function deleteby($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('orders');
    }

    public function num_rows()
    {
        return $this->db->num_rows();
    }

    public function credit()
    {
        $credit = $this->db->query("SELECT SUM(price) AS total FROM report WHERE MONTH(report.date) = '" . date('m') . "' AND YEAR(report.date) = '" . date('Y') . "' ");
        return $credit->row()->total;
    }

    public function filter($bulan, $tahun)
    {
        $query = $this->db->query("SELECT * FROM report WHERE MONTH(date) = '$bulan' AND YEAR(date) = '$tahun' ORDER BY date ASC");

        return $query;
    }
    public function creditfilter($bulan, $tahun)
    {
        $credit = $this->db->query("SELECT SUM(price) AS total FROM report WHERE MONTH(date) = '$bulan' AND YEAR(date) = '$tahun'");
        return $credit->row()->total;
    }

    public function update($where, $wherenya, $tablenya, $data)
    {
        $this->db->where($where, $wherenya);

        return $this->db->update($tablenya, $data);
    }

    public function account($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like("username", $username);
        $query = $this->db->get();

        return $query;
    }
}
