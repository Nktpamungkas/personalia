<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data_atasan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load base_url
		$this->load->helper('url');
	}

	public function index_atasan()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'
		// echo 'selemat datang ' . $data['user']['name'];
		$data['title'] = 'Dashboard Karyawan Baru';
		$this->load->view('template/header', $data);
		$this->load->view('home/index_atasan');
		$this->load->view('template/footer');
	}

	public function detail_data_dept()
	{
		$data = $this->db->query("SELECT id,
                                        code,
                                        dept_name
                                    FROM
                                        dept ORDER BY dept_name ASC")->result_array();
		echo json_encode($data);
	}
}
