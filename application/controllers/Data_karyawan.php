<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Karyawan extends CI_Controller
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

        $data['title'] = 'Employee data';
        $this->load->view('template/header', $data);
        $this->load->view('data_karyawan/index');
        $this->load->view('template/footer');
    }

    public function data_employee(){
        $data = $this->db->query("SELECT * FROM tbl_makar ORDER BY nama ASC")->result_array();
        echo json_encode($data);
    } 

    // START ADD NEW EMPLOYEE
        public function addNewEmployee()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Add New Employee';
            $this->load->view('template/header', $data);
            $this->load->view('data_karyawan/add');
            $this->load->view('template/footer');
        }

        public function add($username)
        {
            $this->form_validation->set_rules('email_pribadi', 'Email Pribadi', 'trim|valid_email');
            $this->form_validation->set_rules('kabupaten_domisili', 'Kabupaten', 'required|trim');
            $this->form_validation->set_rules('kecamatan_domisili', 'Kecamatan', 'required|trim');
            $this->form_validation->set_rules('no_scan', 'Nomor Scan', 'required|trim|is_unique[tbl_makar.no_scan]', array(
                'is_unique' => 'This nomor scan has already used!'
            ));
            $this->form_validation->set_rules('no_ktp', 'Nomor Scan', 'required|trim|is_unique[tbl_makar.no_ktp]', array(
                'is_unique' => 'This nomor KTP has already used!'
            ));

            if ($this->form_validation->run() == false) {
                $this->addNewEmployee();
            } else {
                $data = array(
                    'no_ktp'                => $this->input->post('no_ktp', true),
                    'no_scan'               => $this->input->post('no_scan', true),
                    'nama'                  => $this->input->post('nama', true),
                    'tempat_lahir'          => $this->input->post('tempat_lahir', true),
                    'tgl_lahir'             => $this->input->post('tgl_lahir', true),
                    'alamat_ktp'            => $this->input->post('alamat_ktp', true),
                    'alamat_domisili'       => $this->input->post('alamat_domisili', true),
                    'kabupaten_domisili'    => $this->input->post('kabupaten_domisili', true),
                    'kecamatan_domisili'    => $this->input->post('kecamatan_domisili', true),
                    'agama'                 => $this->input->post('agama', true),
                    'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
                    'status_kel'            => $this->input->post('status_kel', true),
                    'pendidikan'            => $this->input->post('pendidikan', true),
                    'jurusan'               => $this->input->post('jurusan', true),
                    'ipk'                   => $this->input->post('ipk', true),
                    'gol_darah'             => $this->input->post('gol_darah', true),
                    'email_pribadi'         => $this->input->post('email_pribadi', true),
                    'no_hp'                 => $this->input->post('no_hp', true),
                    'pengalaman_kerja'      => $this->input->post('pengalaman_kerja', true),
                    'keterampilan_khusus'   => $this->input->post('keterampilan_khusus', true)
                );
                $this->db->insert('tbl_makar', $data);

                // Script log new employee 1
                $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
                $log = array(
                    'username'      => $username,
                    'no_scan'       => $this->input->post('no_scan', true),
                    'tgl'           => time(),
                    'keterangan'    => gethostbyaddr($ipaddress)
                );
                $this->db->insert('log_new_employee_1', $log);

                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Employee has been created.</b></center>');
                redirect('data_karyawan');
            }
        }
    // END ADD NEW EMPLOYEE

    // START EDIT NEW EMPLOYEE
        public function tampil($no_scan)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'

            $data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row(); //Select * from tbl_makar where no_scan = '$no_scan'
            $data['title'] = 'Edit Employed';
            $this->load->view('template/header', $data);
            $this->load->view('data_karyawan/tampil', $data);
            $this->load->view('template/footer');
        }

        public function edit($username)
        {
            $data = array(
                'no_ktp'                => $this->input->post('no_ktp', true),
                'nama'                  => $this->input->post('nama', true),
                'tempat_lahir'          => $this->input->post('tempat_lahir', true),
                'tgl_lahir'             => $this->input->post('tgl_lahir', true),
                'alamat_ktp'            => $this->input->post('alamat_ktp', true),
                'alamat_domisili'       => $this->input->post('alamat_domisili', true),
                'kabupaten_domisili'    => $this->input->post('kabupaten_domisili', true),
                'kecamatan_domisili'    => $this->input->post('kecamatan_domisili', true),
                'agama'                 => $this->input->post('agama', true),
                'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
                'status_kel'            => $this->input->post('status_kel', true),
                'pendidikan'            => $this->input->post('pendidikan', true),
                'jurusan'               => $this->input->post('jurusan', true),
                'ipk'                   => $this->input->post('ipk', true),
                'gol_darah'             => $this->input->post('gol_darah', true),
                'email_pribadi'         => $this->input->post('email_pribadi', true),
                'no_hp'                 => $this->input->post('no_hp', true),
                'pengalaman_kerja'      => $this->input->post('pengalaman_kerja', true),
                'keterampilan_khusus'   => $this->input->post('keterampilan_khusus', true)
            );
            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->update('tbl_makar', $data);

            // Script log edit employee 1
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_update_employee_1', $log);

            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Editing Success.</b></center>');
            redirect('data_karyawan');
        }
    // END EDIT NEW EMPLOYEE

    // START ADD EMPLOYEE
        public function edit_employee($no_scan)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'

            $data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row(); 
            $data['historiKontrak'] = $this->db->query("SELECT count(id) as id, no_scan, kontrak1, kontrak2, durasi FROM `histori_kontrak` WHERE no_scan = '$no_scan' ORDER BY id DESC LIMIT 1")->row(); 

            $data['title'] = 'Edit Employed';
            $this->load->view('template/header', $data);
            $this->load->view('data_karyawan/edit', $data);
            $this->load->view('template/footer');
        }

        public function addEmployed($username)
        {
            $this->form_validation->set_rules('email_pribadi', 'Email Pribadi', 'trim|valid_email');
            
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Employed Failed.</b></center>');
                redirect('data_karyawan/edit_employee/'. $this->input->post('no_scan', true));
            } else {
                $data = array(
                    'no_ktp'                => $this->input->post('no_ktp', true),
                    'nama'                  => $this->input->post('nama', true),
                    'tempat_lahir'          => $this->input->post('tempat_lahir', true),
                    'tgl_lahir'             => $this->input->post('tgl_lahir', true),
                    'alamat_ktp'            => $this->input->post('alamat_ktp', true),
                    'alamat_domisili'       => $this->input->post('alamat_domisili', true),
                    'kabupaten_domisili'    => $this->input->post('kabupaten_domisili', true),
                    'kecamatan_domisili'    => $this->input->post('kecamatan_domisili', true),
                    'agama'                 => $this->input->post('agama', true),
                    'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
                    'status_kel'            => $this->input->post('status_kel', true),
                    'pendidikan'            => $this->input->post('pendidikan', true),
                    'jurusan'               => $this->input->post('jurusan', true),
                    'ipk'                   => $this->input->post('ipk', true),
                    'gol_darah'             => $this->input->post('gol_darah', true),
                    'email_pribadi'         => $this->input->post('email_pribadi', true),
                    'no_hp'                 => $this->input->post('no_hp', true),
                    'pengalaman_kerja'      => $this->input->post('pengalaman_kerja', true),
                    'keterampilan_khusus'   => $this->input->post('keterampilan_khusus', true),
                    'tgl_masuk'             => $this->input->post('tgl_masuk', true),
                    'status_karyawan'       => $this->input->post('status_karyawan', true),
                    'tgl_tetap'             => $this->input->post('tgl_tetap', true),
                    'golongan'              => $this->input->post('golongan', true),
                    'jabatan'               => $this->input->post('jabatan', true),
                    'dept'                  => $this->input->post('dept', true),
                    'bagian'                => $this->input->post('bagian', true),
                    'atasan1'               => $this->input->post('atasan1', true),
                    'atasan2'               => $this->input->post('atasan2', true),
                    'no_bpjs_tk'            => $this->input->post('no_bpjs_tk', true),
                    'no_bpjs_kes'           => $this->input->post('no_bpjs_kes', true),
                    'kode_jabatan'          => $this->input->post('kode_jabatan', true),
                    'status_aktif'          => $this->input->post('status_aktif', true),
                    'kode_jabatan'          => $this->input->post('kode_jabatan', true)
                );
                $this->db->where('no_scan', $this->input->post('no_scan', true));
                $this->db->update('tbl_makar', $data);

                $data2 = array(
                    'no_scan'           => $this->input->post('no_scan', true),
                    'kontrak1'          => $this->input->post('tgl_kontrak1', true),
                    'kontrak2'          => $this->input->post('tgl_kontrak2', true),
                    'durasi'            => $this->input->post('durasi', true)
                );
                $this->db->insert('histori_kontrak', $data2);

                // Script log new employee 2
                $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
                $log = array(
                    'username'      => $username,
                    'no_scan'       => $this->input->post('no_scan', true),
                    'tgl'           => time(),
                    'keterangan'    => gethostbyaddr($ipaddress)
                );
                $this->db->insert('log_new_employee_2', $log);

                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Employed Success.</b></center>');
                redirect('data_karyawan');
            }
        }
    // END EMPLOYEE

    // START RESIGN EMPLOYEE
        public function resign($username)
        {
            $data = array(
                'tgl_resign'        => time($this->input->post('tgl_resign', true)),
                'status_karyawan'   => 'Resigned'
            );
            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->update('tbl_makar', $data);

            // Script log resign
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_resign', $log);

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your Employee has been resigned.</b></center>');
            redirect('data_karyawan');
        }
    // END RESIGN EMPLOYEE

    // START DELETE EMPLOYEE
        public function delete($username)
        {
            // Script log delete
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_delete_employee', $log);

            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->delete('tbl_makar');

            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->delete('tbl_training');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your Employee has been deleted in data employee and data training.</b></center>');
            redirect('data_karyawan');
        }
    // END DELETE EMPLOYEE

    // public function search_sk()
    // {
    //     $dataSearch = $this->Sheetlaboratory_model->ambildata_search($nomorkk, $warna_ke);
    //     echo json_encode($dataSearch);
    // }
}
