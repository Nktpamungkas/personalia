<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hr_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function karyawanbaru()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'HR Admin';
        $this->load->view('template/header', $data);
        $this->load->view('hr_admin/karyawanbaru');
        $this->load->view('template/footer');
    }   

    public function tambahdata()
    {
        $data = array (
            'tgl'           => $this->input->post('tgl_im', true),
            'memo'          => $this->input->post('memo', true),
            'dept'          => $this->input->post('dept', true),
            'dibuat_oleh'   => $this->input->post('dibuat_oleh', true)
        );
        $save = $this->db->insert('im_karyawanbaru', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Berhasil.</b></center>');
        redirect('hr_admin/karyawanbaru');
    }

    public function ubahdata($id)
    {
        $data = array (
            'tgl'           => $this->input->post('tgl_im', true),
            'memo'          => $this->input->post('memo', true),
            'dept'          => $this->input->post('dept', true),
            'dibuat_oleh'   => $this->input->post('dibuat_oleh', true)
        );
        $this->db->where('id', $id);
        $this->db->update('im_karyawanbaru', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"  style="font-size: 14px"><b>Berhasil diubah.</b></center>');
        redirect('hr_admin/karyawanbaru');
    }

    public function hapusmemo_kabar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('im_karyawanbaru');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>DATA TERHAPUS.</b></center>');
        redirect($this->agent->referrer());
    }

    public function printmemo_karyawanbaru($id)
    {
        $data['user']       = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
        $data['data_memo']  = $this->db->get_where('im_karyawanbaru', array('id' => $id))->row();
        
        $this->load->view('hr_admin/print_karyawanbaru', $data);
    }
}