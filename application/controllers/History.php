<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/index');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Login';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/login');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Logout';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/logout');
        $this->load->view('template/footer');
    }

    public function new_employee1()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History New Employee 1';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/new_employee1');
        $this->load->view('template/footer');
    }

    public function new_employee2()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History New Employee 2';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/new_employee2');
        $this->load->view('template/footer');
    }

    public function update_employee()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Update Employee';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/update_employee');
        $this->load->view('template/footer');
    }

    public function delete_employee()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Delete Employee';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/delete_employee');
        $this->load->view('template/footer');
    }

    public function resign()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Resign';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/resign');
        $this->load->view('template/footer');
    }

    public function new_training()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History New Training';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/new_training');
        $this->load->view('template/footer');
    }

    public function update_training()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Update Training';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/update_training');
        $this->load->view('template/footer');
    }
    public function delete_training()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'History Delete Training';
        $this->load->view('template/header', $data);
        $this->load->view('setting/menuSetting', $data);
        $this->load->view('history/delete_training');
        $this->load->view('template/footer');
    }
}
