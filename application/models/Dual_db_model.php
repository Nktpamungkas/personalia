<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dual_db_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default',true); // Database pertama
        $this->second_db = $this->load->database('second_db', TRUE); // Database kedua
    }
	public function get_employee_by_no_scan($no_scan) {
        $this->db->where('no_scan', $no_scan);
        $query = $this->db->get('tbl_makar'); 
        return $query->row_array();
    }

    public function save_data_to_both_databases($data2)
    {
        $jenis_kelamin_input = $this->input->post('jenis_kelamin', true);
        $data2['jk'] = (!empty($jenis_kelamin_input) && $jenis_kelamin_input === 'Wanita') ? 'N' : 'L';
        
        // Simpan data ke database kedua
        $this->second_db->insert('tblkrynhrd', $data2);
    }

    public function update_data_in_second_database($data2)
{
    // Sesuaikan dengan koneksi database kedua
    $this->load->database('second_db', TRUE);

 
    // Melakukan update data di database kedua
    $this->second_db->where('idk', $this->input->post('no_scan', true));
    $this->second_db->update('tblkrynhrd', $data2);

    // Kembalikan koneksi ke database pertama
    $this->load->database('default', TRUE);
}

}
