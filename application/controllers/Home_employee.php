<?php

class Home_employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Home Employee';
        $this->load->view('template/header', $data);
        $this->load->view('home/index_employee');
        $this->load->view('template/footer');
    }
}
