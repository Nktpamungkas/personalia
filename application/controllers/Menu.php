<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Menu Management';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('menu/index');
        $this->load->view('template/footer');
    }
}
