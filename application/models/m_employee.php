<?php
class m_employee extends CI_Model{
 
    public function employee_list()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_makar ORDER BY nama ASC")->result_array();
        return $hasil->result_array();
    }
     
}