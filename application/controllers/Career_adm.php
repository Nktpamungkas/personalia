<?php

class Career_adm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    // DISCIPLINE
    public function discipline()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Career Administration | Discipline';
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/discipline');
        $this->load->view('template/footer');
    }

    public function add_new_discipline()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $data['title'] = 'Career Administration | Discipline';
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/add_discipline');
        $this->load->view('template/footer');
    }

    public function c_career_adm()
    {
        $data = array(
            'tgl_sp'  => $this->input->post('tgl_sp', true),
            'no_scan' => $this->input->post('no_scan', true),
            'sp'      => $this->input->post('sp', true),
            'alasan'  => $this->input->post('alasan', true)
        );
        $save = $this->db->insert('dicipline', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Berhasil.</b></center>');
        redirect('Career_adm/discipline');
    }

    public function edit_new_discipline($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $data['title'] = 'Career Administration | Discipline';
        $data['dicipline'] = $this->db->query("SELECT * FROM dicipline WHERE id='$id'")->row();
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/edit_discipline');
        $this->load->view('template/footer');
    }

    public function u_career_adm()
    {
        $data = array(
            'tgl_sp'  => $this->input->post('tgl_sp', true),
            'no_scan' => $this->input->post('no_scan', true),
            'sp'      => $this->input->post('sp', true),
            'alasan'  => $this->input->post('alasan', true)
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('dicipline', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"  style="font-size: 14px"><b>Berhasil.</b></center>');
        redirect('Career_adm/discipline');
    }

    public function delete_new_discipline($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dicipline');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Surat Peringatan berhasil di hapus.</b></center>');
        redirect($this->agent->referrer());
    }
    // DISCIPLINE

    public function transision()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Career Administration | Transision';
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/transision');
        $this->load->view('template/footer');
    }

    public function AddCareerTransition($no_scan)
    {
        $no_scan_decrypt = $this->encryption->decrypt($no_scan);

        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Career Administration | Add Transision';
        $data['no_scan'] = $no_scan_decrypt;
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/add_CareerTransition', $no_scan);
        $this->load->view('template/footer');
    }

    public function proses_AddCareerTransition()
    {
        // SIMPAN DI DATA CAREER TRANSITION
        $data = array(
            'no_scan'       => $this->input->post('no_scan', true),
            'proses'        => $this->input->post('proses', true),
            'tgl_efektif'   => $this->input->post('tgl_efektif', true),
            'dept_lama'     => $this->input->post('dept_lama', true),
            'dept_baru'     => $this->input->post('dept_baru', true),
            'bagian_lama'   => $this->input->post('bagian_lama', true),
            'bagian_baru'   => $this->input->post('bagian_baru', true),
            'golongan_lama' => $this->input->post('golongan_lama', true),
            'golongan_baru' => $this->input->post('golongan_baru', true),
            'jabatan_lama'  => $this->input->post('jabatan_lama', true),
            'jabatan_baru'  => $this->input->post('jabatan_baru', true),
        );

        // UPDATE DI DATA EMPLOYEE INFORMATION
        // $dataEmployee = array(
        //     'dept'     => $this->input->post('dept_baru', true),
        //     'bagian'   => $this->input->post('bagian_baru', true),
        //     'golongan' => $this->input->post('golongan_baru', true),
        //     'jabatan'  => $this->input->post('jabatan_baru', true)
        // );
        // $this->db->where('no_scan', $this->input->post('no_scan', true));
        // $this->db->update('tbl_makar', $dataEmployee);

        $save   = $this->db->insert('career_transition', $data);

        if ($save) {
            redirect('career_adm/transision');
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Career Transition berhasil dibuat.</b></center>');
        } else {
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">Input gagal. Silahkan coba kembali</center>');
            redirect($this->agent->referrer());
        }
    }

    public function EditCareerTransition($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Career Administration | Add Transision';
        $data['no_scan'] = $no_scan;
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/edit_CareerTransition', $no_scan);
        $this->load->view('template/footer');
    }

    public function proses_EditCareerTransition()
    {
        // SIMPAN DI DATA CAREER TRANSITION
        $data = array(
            'proses'        => $this->input->post('proses', true),
            'tgl_efektif'   => $this->input->post('tgl_efektif', true),
            'dept_lama'     => $this->input->post('dept_lama', true),
            'dept_baru'     => $this->input->post('dept_baru', true),
            'bagian_lama'   => $this->input->post('bagian_lama', true),
            'bagian_baru'   => $this->input->post('bagian_baru', true),
            'golongan_lama' => $this->input->post('golongan_lama', true),
            'golongan_baru' => $this->input->post('golongan_baru', true),
            'jabatan_lama'  => $this->input->post('jabatan_lama', true),
            'jabatan_baru'  => $this->input->post('jabatan_baru', true),
        );

        // UPDATE DI DATA EMPLOYEE INFORMATION
        $dataEmployee = array(
            'dept'     => $this->input->post('dept_baru', true),
            'bagian'   => $this->input->post('bagian_baru', true),
            'golongan' => $this->input->post('golongan_baru', true),
            'jabatan'  => $this->input->post('jabatan_baru', true)
        );
        $this->db->where('no_scan', $this->input->post('no_scan', true));
        $save = $this->db->update('tbl_makar', $dataEmployee);

        $this->db->where('id', $this->input->post('id', true));
        $save = $this->db->update('career_transition', $data);

        if ($save) {
            redirect('career_adm/transision');
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Career Transition berhasil diubah.</b></center>');
        } else {
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">Input gagal. Silahkan coba kembali</center>');
            redirect($this->agent->referrer());
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('career_transition');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Career Transition berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }

    public function ExportTransition()
    {
        $this->load->view('career_adm/export_excel_career_transition');
    }

    public function report()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Career Administration | Report';
        $this->load->view('template/header', $data);
        $this->load->view('career_adm/report');
        $this->load->view('template/footer');
    }

    public function export_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('career_adm/export_excel_discipline', $data);
    }
}
