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

        $data['tahun'] = 'tahunsekarang';

        $data['title'] = 'Training Record';
        $this->load->view('template/header', $data);
        $this->load->view('training_report/index');
        $this->load->view('template/footer');
    }

    public function data_training_report()
    {
        $data = $this->db->query("SELECT
                                        a.id,
                                        a.kode_training,
                                        b.nama_training,
                                        DATE_FORMAT( a.tgl_training, '%d %b %Y' ) AS Ftgl_training,
                                        a.tgl_training 
                                    FROM
                                        tbl_training a
                                        LEFT JOIN ( SELECT b.id, b.nama_training FROM training b ) b ON b.id = a.kode_training 
                                    GROUP BY
                                        a.tgl_training,
                                        a.kode_training")->result_array();
        echo json_encode($data);
    }

    public function data_detail_training_report($kode, $tgltraining)
    {
        $data_detail = $this->db->query("SELECT
                                        a.no_scan,
                                        b.nama,
                                        b.dept,
                                        a.kode_training,
                                        DATE_FORMAT(a.tgl_training, '%d %M %Y') as Ftgl_training,
                                        a.durasi_jam
                                    FROM
                                        tbl_training a
                                        LEFT JOIN( SELECT b.no_scan, b.dept, b.nama FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                    WHERE
                                        a.kode_training = '$kode' 
                                        AND a.tgl_training = '$tgltraining'")->result_array();
        echo json_encode($data_detail);
        var_dump($data_detail);
        die();
    }

    public function export_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('training_report/export_excel', $data);
    }

    // START ADD NEW TRAINING
    public function addTraining()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Add Training Record';
        $this->load->view('template/header', $data);
        $this->load->view('training_report/add');
        $this->load->view('template/footer');
    }

    public function addEdit()
    {
        $data_name = $this->input->post('no_scanpeserta[]', true);
        $data_kode_trainig = $this->input->post('kode_trainingModal', true);
        $data_tgl = $this->input->post('tgl_trainingModal', true);
        $data_trainer = $this->input->post('trainerModal', true);

        $value = array();
        foreach ($data_name as $key) {
            array_push($value, array(
                'no_scan'           => $key,
                'kode_training'     => $data_kode_trainig,
                'tgl_training'      =>  $data_tgl,
                'trainer'           =>  $data_trainer
            ));
        }
        // print_r($value); // atau var_dump($value);
        $proses = $this->db->insert_batch('tbl_training', $value);

        redirect($this->agent->referrer());
    }

    public function add($username)
    {
        $data_name = $this->input->post('no_scan[]', true);
        $value = array();
        foreach ($data_name as $key) {
            array_push($value, array(
                'no_scan'           => $key,
                'kode_training'     => $this->input->post('kode_training', true),
                'tgl_training'      => $this->input->post('tgl_training', true),
                'trainer'      => $this->input->post('trainer', true)
            ));
        }
        $proses = $this->db->insert_batch('tbl_training', $value);

        if ($proses) {
            // Script log add new training
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_new_training', $log);
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Employee training has been created.</b></center>');
            redirect($this->agent->referrer());

            //     $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Employee training has been created.</b></center>');
            //     redirect('training_report');
            // } else {
            //     $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Employee training has been created.</b></center>');
            //     redirect('training_report');
        }
    }
    // END ADD NEW TRAINING

    // START EDIT TRAINING
    public function tampil($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['training'] = $this->db->query("SELECT a.id as id_training,
                                                         a.no_scan, 
                                                         c.id as kode_training, 
                                                         c.nama_training, 
                                                         a.tgl_training,
                                                         a.trainer as nip_trainer,
                                                         b.nama as nama_trainer
                                                    FROM tbl_training a
                                                        LEFT JOIN ( SELECT * FROM training c ) c ON c.id = a.kode_training 
                                                        LEFT JOIN ( SELECT b.no_scan,b.nama FROM tbl_makar b ) b ON b.no_scan = a.trainer
                                                    WHERE a.id = '$id'")->row();
        $data['title'] = 'Add Training Record';
        $this->load->view('template/header', $data);
        $this->load->view('training_report/tampil', $data);
        $this->load->view('template/footer');
    }

    public function edit($username)
    {
        $id             = $this->input->post('id', true);
        $no_scan        = $this->input->post('no_scan', true);               // Array
        $value                  = array();
        $index                  = 0;                                         // Set Index Awal 0
        foreach ($no_scan as $key) {                                         // Buat Perulangan berdasarkan nama sampai akhir
            array_push($value, array(
                'no_scan'           => $key,
                'id'                => $id[$index],
                'kode_training'     => $this->input->post('kode_training', true),
                'tgl_training'      => $this->input->post('tgl_training', true),
                'trainer'           => $this->input->post('trainer', true)
            ));
            $index++;
        }
        $this->db->update_batch('tbl_training', $value, 'id');

        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Editing Success.</b></center>');
        redirect($this->agent->referrer());
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

    public function hapus_training_report($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_training');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Karyawan Training telah dihapus.</b></center>');
        redirect($this->agent->referrer());
    }
    // END DELETE TRAINING
}
