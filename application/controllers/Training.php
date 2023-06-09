<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training extends CI_Controller
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

        $data['title'] = 'Training';
        $this->load->view('template/header', $data);
        $this->load->view('training/index');
        $this->load->view('template/footer');
    }

    public function index_all()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['tahun'] = 'tahunsekarang';

        $data['title'] = 'Training';
        $this->load->view('template/header', $data);
        $this->load->view('training/index_all');
        $this->load->view('template/footer');
    }

    public function TambahTraining($dept)
    {
        $data = array (
            'nama_training'         => $this->input->post('nama_training', true),
            'dept'                  => $dept
        );

        $save = $this->db->insert('training', $data);

        if ($save) {
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Berhasil input data training.</b></center>');
            redirect('training');
        } else {
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Silahkan ulangi kembali.</b></center>');
            redirect('training');
        }
    }

    public function EditTraining()
    {
        $data = array (
            'nama_training' => $this->input->post('nama_training', true)
        );

        $this->db->where('id', $this->input->post('id', true));
        $update = $this->db->update('training', $data);

        if ($update) {
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Berhasil Nama Training.</b></center>');
            redirect('training');
        } else {
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Silahkan ulangi kembali.</b></center>');
            redirect('training');
        }
    }

    public function pelatihan()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Training';
        $this->load->view('template/header', $data); 
        $this->load->view('training/add_pelatihan');
        $this->load->view('template/footer');
    }
    // 3066

    // FORMULIR ANALISIS KEBUTUHAN PELATIHAN
        public function TambahTNA($dept)
        {
            $this->db->trans_start();
            $id_training            = $this->input->post('id_training[]', true);
            $level                  = $this->input->post('level[]', true);
            $bulan                  = $this->input->post('bulan[]', true);
            $mingguke               = $this->input->post('mingguke[]', true);
            $no_scan                = $this->input->post('no_scan[]', true);
            $diajukan_oleh_nama     = $this->input->post('diajukan_oleh_nama', true);
            $diajukan_oleh_jabatan  = $this->input->post('diajukan_oleh_jabatan', true);
            $diajukan_oleh_tanggal  = $this->input->post('diajukan_oleh_tanggal', true);
            $diketahui_oleh_nama    = $this->input->post('diketahui_oleh_nama', true);
            $diketahui_oleh_jabatan = $this->input->post('diketahui_oleh_jabatan', true);
            $diketahui_oleh_tanggal = $this->input->post('diketahui_oleh_tanggal', true);
            $disetujui_oleh_nama    = $this->input->post('disetujui_oleh_nama', true);
            $disetujui_oleh_jabatan = $this->input->post('disetujui_oleh_jabatan', true);
            $disetujui_oleh_tanggal = $this->input->post('disetujui_oleh_tanggal', true);
            
            $value                  = array();
            $index                  = 0;
            foreach ($id_training as $key) {
                array_push($value, array(
                    'id_training'               => $key,
                    'dept'                      => $dept,
                    'level'                     => $level[$index],
                    'bulan'                     => $bulan[$index],
                    'mingguke'                  => $mingguke[$index],
                    'no_scan'                   => $no_scan[$index],
                    'diajukan_oleh_nama'        => $diajukan_oleh_nama,
                    'diajukan_oleh_jabatan'     => $diajukan_oleh_jabatan,
                    'diajukan_oleh_tanggal'     => $diajukan_oleh_tanggal,
                    'diketahui_oleh_nama'       => $diketahui_oleh_nama,
                    'diketahui_oleh_jabatan'    => $diketahui_oleh_jabatan,
                    'diketahui_oleh_tanggal'    => $diketahui_oleh_tanggal,
                    'disetujui_oleh_nama'       => $disetujui_oleh_nama,
                    'disetujui_oleh_jabatan'    => $disetujui_oleh_jabatan,
                    'disetujui_oleh_tanggal'    => $disetujui_oleh_tanggal
                ));
                $index++;
            }
            $this->db->insert_batch('training_needs_analiysis', $value);
            $this->db->trans_complete();

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Berhasil mmebuat Training Needs Analysis.</b></center>');
            redirect('Training');
        }

        public function UbahTNA()
        {
            $id_training            = $this->input->post('id_training', true);
            $level                  = $this->input->post('level[]', true);
            $bulan                  = $this->input->post('bulan', true);
            $mingguke               = $this->input->post('mingguke[]', true);
            $no_scan                = $this->input->post('no_scan', true);
            $diajukan_oleh_nama     = $this->input->post('diajukan_oleh_nama', true);
            $diajukan_oleh_jabatan  = $this->input->post('diajukan_oleh_jabatan', true);
            $diketahui_oleh_nama    = $this->input->post('diketahui_oleh_nama', true);
            $diketahui_oleh_jabatan = $this->input->post('diketahui_oleh_jabatan', true);
            $disetujui_oleh_nama    = $this->input->post('disetujui_oleh_nama', true);
            $disetujui_oleh_jabatan = $this->input->post('disetujui_oleh_jabatan', true);
            $id                     = $this->input->post('id', true);
            
            $value                  = array();
            $index                  = 0;
            foreach ($id as $key) {
                array_push($value, array(
                    'id'                        => $key,
                    'id_training'               => $id_training[$index],
                    'level'                     => $level[$index],
                    'bulan'                     => $bulan[$index],
                    'mingguke'                  => $mingguke[$index],
                    'no_scan'                   => $no_scan[$index],
                    'diajukan_oleh_nama'        => $diajukan_oleh_nama,
                    'diajukan_oleh_jabatan'     => $diajukan_oleh_jabatan,
                    'diketahui_oleh_nama'       => $diketahui_oleh_nama,
                    'diketahui_oleh_jabatan'    => $diketahui_oleh_jabatan,
                    'disetujui_oleh_nama'       => $disetujui_oleh_nama,
                    'disetujui_oleh_jabatan'    => $disetujui_oleh_jabatan
                ));
                $index++;
            }
            $execute_insert = $this->db->update_batch('training_needs_analiysis', $value, 'id');

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Perubahan disimpan.</b></center>');
            redirect('Training');
        }

        public function viewEdit($tgl, $dept, $indexall = '')
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['TNA'] =  $this->db->query("SELECT a.id,
                                                    a.id_training,
                                                    a.level,
                                                    a.bulan,
                                                    a.mingguke,
                                                    b.no_scan,
                                                    a.dept,
                                                    a.diajukan_oleh_nama, a.diajukan_oleh_jabatan, a.diajukan_oleh_tanggal,
                                                    a.diketahui_oleh_nama, a.diketahui_oleh_jabatan, a.diketahui_oleh_tanggal,
                                                    a.disetujui_oleh_nama, a.disetujui_oleh_jabatan, a.disetujui_oleh_tanggal
                                                    FROM
                                                        training_needs_analiysis a
                                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                        JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                        WHERE a.diajukan_oleh_tanggal = '$tgl'
                                                        AND a.dept ='$dept'")->result_array();

            $data['title'] = 'Training';
            $data['indexAll'] = $indexall;
            $this->load->view('template/header', $data);
            $this->load->view('training/view', $data);
            $this->load->view('template/footer');
        }

        public function hapus($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('training_needs_analiysis');
    
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Berhasil dihapus.</b></center>');
            redirect($this->agent->referrer());
        }

        public function deleteTNA($tgl, $dept)
        {
            $this->db->where('diajukan_oleh_tanggal', $tgl);
            $this->db->delete('training_needs_analiysis');
    
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Berhasil dihapus.</b></center>');
            redirect($this->agent->referrer());
        }

        public function print_fakp($tgl, $dept)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['TNA'] =  $this->db->query("SELECT a.id,
                                                    c.nama_training,
                                                    a.level,
                                                    a.bulan,
                                                    a.mingguke,
                                                    b.no_scan,
                                                    a.diajukan_oleh_nama, a.diajukan_oleh_jabatan, a.diajukan_oleh_tanggal,
                                                    a.diketahui_oleh_nama, a.diketahui_oleh_jabatan, a.diketahui_oleh_tanggal,
                                                    a.disetujui_oleh_nama, a.disetujui_oleh_jabatan, a.disetujui_oleh_tanggal
                                                    FROM
                                                        training_needs_analiysis a
                                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                        JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                        WHERE a.diajukan_oleh_tanggal = '$tgl' AND a.dept='$dept'")->result_array();
            $data['TNA_II'] =  $this->db->query("SELECT a.id,
                                                    c.nama_training,
                                                    a.level,
                                                    a.bulan,
                                                    a.mingguke,
                                                    b.no_scan,
                                                    a.diajukan_oleh_nama, a.diajukan_oleh_jabatan, a.diajukan_oleh_tanggal,
                                                    a.diketahui_oleh_nama, a.diketahui_oleh_jabatan, a.diketahui_oleh_tanggal,
                                                    a.disetujui_oleh_nama, a.disetujui_oleh_jabatan, a.disetujui_oleh_tanggal
                                                    FROM
                                                        training_needs_analiysis a
                                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                        JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                        WHERE a.diajukan_oleh_tanggal = '$tgl' AND a.dept='$dept'")->row();

            $data['title'] = 'Print Training';
            $this->load->view('training/print_fakp', $data);
        }

        public function print_pelatih($tgl, $dept)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['TNA'] =  $this->db->query("SELECT a.id,
                                                    c.nama_training,
                                                    b.no_scan,
                                                    b.nama,
                                                    b.dept,
                                                    b.jabatan,
                                                    a.diajukan_oleh_nama, a.diajukan_oleh_jabatan, a.diajukan_oleh_tanggal,
                                                    a.diketahui_oleh_nama, a.diketahui_oleh_jabatan, a.diketahui_oleh_tanggal
                                                    FROM
                                                        training_needs_analiysis a
                                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                        JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                        WHERE a.diajukan_oleh_tanggal = '$tgl' AND a.dept='$dept'")->result_array();
            $data['TNA_II'] =  $this->db->query("SELECT a.id,
                                                    c.nama_training,
                                                    b.no_scan,
                                                    b.nama,
                                                    b.dept,
                                                    b.jabatan,
                                                    a.diajukan_oleh_nama, a.diajukan_oleh_jabatan, a.diajukan_oleh_tanggal,
                                                    a.diketahui_oleh_nama, a.diketahui_oleh_jabatan, a.diketahui_oleh_tanggal
                                                    FROM
                                                        training_needs_analiysis a
                                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                                        JOIN (SELECT * FROM training c) c ON c.id = a.id_training
                                                        WHERE a.diajukan_oleh_tanggal = '$tgl' AND a.dept='$dept'")->row();

            $data['title'] = 'Print Formulir Daftar Usulan Pelatih';
            $this->load->view('training/print_pelatih', $data);
        }

    
        // TRAINING PROGRAM
        public function index_training_program()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['tahun'] = 'tahunsekarang';

            $data['title'] = 'Training Program';
            $this->load->view('template/header', $data);
            $this->load->view('training/training-program');
            $this->load->view('template/footer');
        }

        public function index_training_program_all()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['tahun'] = 'tahunsekarang';

            $data['title'] = 'Training Program';
            $this->load->view('template/header', $data);
            $this->load->view('training/training-program-all');
            $this->load->view('template/footer');
        }

        public function training_program()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['dept']    = $this->input->post('dept', true);

            $data['title'] = 'Training Program';
            $this->load->view('template/header', $data);
            $this->load->view('training/add_training_program');
            $this->load->view('template/footer');
        }

        public function TambahTP()
        {
            $this->db->trans_start();
            $id_training            = $this->input->post('id_training[]', true);
            $tanggal_training       = $this->input->post('tanggal_training[]', true);
            $dept                   = $this->input->post('dept', true);
            $value                  = array();
            $index                  = 0;
            foreach ($id_training as $key) {
                array_push($value, array(
                    'kode_training'             => $key,
                    'tanggal_training'          => $tanggal_training[$index],
                    'dept'                      => $dept
                ));
                $index++;
            }
            $this->db->insert_batch('training_program', $value);
            $this->db->trans_complete();

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Berhasil mmebuat Training Program.</b></center>');
            redirect($this->agent->referrer());
        }

        public function edit_training_program()
        {
            $data = array (
                'tanggal_training' => $this->input->post('tanggal_training', true)
            );
    
            $this->db->where('id', $this->input->post('id', true));
            $update = $this->db->update('training_program', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Berhasil mmebuat Training Program.</b></center>');
            redirect($this->agent->referrer());
        }
}