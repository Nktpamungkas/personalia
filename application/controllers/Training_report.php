<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Training report';
        $this->load->view('template/header', $data);
        $this->load->view('training_report/index');
        $this->load->view('template/footer');
    }

    public function data_training(){
        // $data = $this->db->query("SELECT
        //                                 tbl_training.id,
        //                                 tbl_training.no_scan,
        //                                 tbl_makar.nama,
        //                                 tbl_makar.dept,
        //                                 materi_training.kode,
        //                                 materi_training.materi_training,
        //                                 materi_training.penyelenggara
        //                                 FROM
        //                                 tbl_training
        //                                 INNER JOIN tbl_makar ON tbl_makar.no_scan = tbl_training.no_scan
        //                                 INNER JOIN materi_training ON materi_training.kode = tbl_training.kode_training
        //                                 ORDER BY
        //                                 tbl_makar.nama ASC")->result_array();
        $data = $this->db->query("SELECT
                                        tbl_training.id,
                                        tbl_training.no_scan,
                                        tbl_makar.nama,
                                        tbl_makar.dept,
                                        materi_training.kode,
                                        materi_training.materi_training,
                                        materi_training.penyelenggara 
                                    FROM
                                        tbl_training, tbl_makar, materi_training
                                        WHERE tbl_makar.no_scan = tbl_training.no_scan AND materi_training.kode = tbl_training.kode_training 
                                    ORDER BY
                                        tbl_makar.nama ASC")->result_array();
        echo json_encode($data);
    }

    // START ADD NEW TRAINING
        public function addTraining()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['title'] = 'Add Training report';
            $this->load->view('template/header', $data);
            $this->load->view('training_report/add');
            $this->load->view('template/footer');
        }

        public function add($username)
        {
            $data = array(
                "no_scan"           => $this->input->post('no_scan', true),
                "kode_training"     => $this->input->post('kode_training', true),
                "tgl_training"      => $this->input->post('tgl_training', true)
            );
            $this->db->insert('tbl_training', $data);

            // Script log add new training
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_new_training', $log);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Employee training has been created.</b></center>');
            redirect('training_report');
        }
    // END ADD NEW TRAINING

    // START EDIT TRAINING
        public function tampil($id)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['training'] = $this->db->query("SELECT a.id, a.no_scan, b.nama, b.dept, c.materi_training, c.penyelenggara, a.tgl_training, c.tempat, c.sertifikat
                                                    FROM tbl_training a
                                            LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                            LEFT JOIN ( SELECT * FROM materi_training c ) c ON c.kode = a.kode_training WHERE a.id = '$id'
                                                ORDER BY b.nama ASC")->row();
            $data['title'] = 'Add Training report';
            $this->load->view('template/header', $data);
            $this->load->view('training_report/tampil', $data);
            $this->load->view('template/footer');
        }

        public function edit($username)
        {
            $data = array(
                'no_scan'           => $this->input->post('no_scan', true),
                'kode_training'     => $this->input->post('kode_training', true),
                'tgl_training'      => $this->input->post('tgl_training', true)
            );
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('tbl_training', $data);

            // Script log edit training
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_update_training', $log);

            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Editing Success.</b></center>');
            redirect('training_report');
        }
    // END EDIT TRAINING

    // START DELETE TRAINING
        public function delete($username)
        {
            // Script log delete
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'id_training'   => $this->input->post('kode', true),
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_delete_training', $log);

            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('tbl_training');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your Training has been deleted.</b></center>');
            redirect('training_report');
        }
    // END DELETE TRAINING
}
