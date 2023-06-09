<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // start Index
        public function index()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/index', $data);
            $this->load->view('template/footer');
        }
    // end Index

    // start additional_info
        public function additional_info()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Additional Info';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/additional_info', $data);
            $this->load->view('template/footer');
        }

        public function data_additional_info(){
            $data = $this->db->query("SELECT kode,jabatan FROM additional_info ORDER BY kode ASC")->result_array();
            echo json_encode($data);
        }

        public function add($username)
        {
            $this->form_validation->set_rules('kode', 'Kode', 'required|trim|is_unique[additional_info.kode]', array(
                'is_unique' => 'This kode has already used!'
            ));

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your kode has already used! please add again.</b></center>');
                $this->index();
            } else {
                // Script log_setting_add
                $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
                $log = array(
                    'username'      => $username,
                    'kode'          => $this->input->post('kode', true),
                    'tgl'           => time(),
                    'keterangan'    => gethostbyaddr($ipaddress)
                );
                $this->db->insert('log_setting_add', $log);

                // add
                $data = array(
                    'kode'      => $this->input->post('kode', true),
                    'jabatan'   => $this->input->post('jabatan', true)
                );
                $this->db->insert('additional_info', $data);

                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your additional info has been created.</b></center>');
                redirect($this->agent->referrer());
            }
        }

        public function add_edit($username)
        {
            // Script log_setting_add_edit
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'kode'          => $this->input->post('kode', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_setting_add_edit', $log);

            // add
            $data = array(
                'jabatan'   => $this->input->post('jabatan', true)
            );
            $this->db->where('kode', $this->input->post('kode', true));
            $this->db->update('additional_info', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your additional info has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function add_delete($username)
        {
            // Script log_setting_add_delete
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'kode'       => $this->input->post('kode', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_setting_add_delete', $log);

            $this->db->where('kode', $this->input->post('kode', true));
            $this->db->delete('additional_info');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your additional info has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end additional_info
    
    // start divisi
        public function divisi()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Divisi';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/divisi');
            $this->load->view('template/footer');
        }

        public function divisi_add($username)
        {
            // Script log_setting_divisi_add
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'divisi'          => $this->input->post('divisi', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_setting_divisi_add', $log);

            $data = array (
                'divisi' => $this->input->post('divisi', true)
            );
            $this->db->insert('divisi', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your divisi has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function divisi_edit($username)
        {
            // Script log_setting_divisi_add
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'divisi'        => $this->input->post('divisi', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_setting_divisi_edit', $log);

            $data = array (
                'divisi' => $this->input->post('divisi', true)
            );
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('divisi', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your divisi has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function divisi_delete($username)
        {
            // Script log_setting_add_delete
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'divisi'        => $this->input->post('divisi', true),
                'tgl'           => time(),
                'keterangan'    => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_setting_divisi_delete', $log);

            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('divisi');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your divisi has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end divisi
    
    // start gol_darah
        public function gol_darah()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Golongan Darah';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/gol_darah');
            $this->load->view('template/footer');
        }
        
        public function gol_darah_add()
        {
            $data = array(
                'gol_darah' => $this->input->post('gol_darah', true)
            );

            $this->db->insert('gol_darah', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your golongan darah has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function gol_darah_edit()
        {
            $data = array(
                'gol_darah' => $this->input->post('gol_darah', true)
            );
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('gol_darah', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your golongan darah has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function gol_darah_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('gol_darah');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your golongan darah has been de;eted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end gol_darah

    // start golongan
        public function golongan()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Golongan';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/golongan');
            $this->load->view('template/footer');
        }

        public function golongan_add()
        {
            $data = array(
                'golongan' => $this->input->post('golongan', true)
            );

            $this->db->insert('golongan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your golongan has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function golongan_edit()
        {
            $data = array(
                'golongan' => $this->input->post('golongan', true)
            );
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('golongan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your golongan has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function golongan_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('golongan');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your golongan has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end golongan

    // start alamat
        public function alamat()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Alamat';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/alamat');
            $this->load->view('template/footer');
        }

        public function alamat_add()
        {
            $data = array(
                'kecamatan' => $this->input->post('kecamatan', true),
                'kabupaten' => $this->input->post('kabupaten', true),
                'provinsi'  => $this->input->post('provinsi', true),
                'kode_pos'  => $this->input->post('kode_pos', true)
            );

            $this->db->insert('kec_kab_pro', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your alamat has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function alamat_edit()
        {
            $data = array(
                'kecamatan' => $this->input->post('kecamatan', true),
                'kabupaten' => $this->input->post('kabupaten', true),
                'provinsi'  => $this->input->post('provinsi', true),
                'kode_pos'  => $this->input->post('kode_pos', true)
            );
            $this->db->where('kode', $this->input->post('kode', true));
            $this->db->update('kec_kab_pro', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your alamat has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function alamat_delete()
        {
            $this->db->where('kode', $this->input->post('kode', true));
            $this->db->delete('kec_kab_pro');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your alamat has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end alamat

    // start jabatan
        public function jabatan()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Jabatan';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/jabatan');
            $this->load->view('template/footer');
        }

        public function jabatan_add()
        {
            $data = array(
                'jabatan' => $this->input->post('jabatan', true)
            );

            $this->db->insert('jabatan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your jabatan has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function jabatan_edit()
        {
            $data = array(
                'jabatan' => $this->input->post('jabatan', true)
            );

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('jabatan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your jabatan has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function jabatan_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('jabatan');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your jabatan has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end jabatan

    // start meteri training
        public function materi_training()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Materi Training';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/materi_training');
            $this->load->view('template/footer');
        }

        // public function data_training()
        // {
        //     $data = $this->db->query("SELECT id, kode, materi_training, jenis_training, penyelenggara, tempat, sertifikat FROM materi_training ORDER by materi_training ASC")->result_array();
        //     echo json_encode($data);
        // } 

        public function materi_training_add($dept)
        {
            $data = array(
                'nama_training'   => $this->input->post('nama_training', true),
                'dept'            => $dept
            );
            $this->db->insert('training', $data);
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your materi training has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function materi_training_edit($dept)
        {
            $data = array(
                'nama_training'   => $this->input->post('nama_training', true),
                'dept'            => $dept
            );

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('training', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your materi training has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function materi_training_delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('training');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your materi training has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end materi training 

    // start pendidikan
        public function pendidikan()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Pendidikan';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/pendidikan');
            $this->load->view('template/footer');
        }

        public function pendidikan_add()
        {
            $data = array(
                'pendidikan'    => $this->input->post('pendidikan', true)
            );

            $this->db->insert('pendidikan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your pendidikan has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function pendidikan_edit()
        {
            $data = array(
                'pendidikan'    => $this->input->post('pendidikan', true)
            );

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('pendidikan', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your pendidikan has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function pendidikan_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('pendidikan');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your pendidikan has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end pendidikan
    
    // start religion
        public function religion()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Religion';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/religion');
            $this->load->view('template/footer');
        }

        public function religion_add()
        {
            $data = array(
                'religion'    => $this->input->post('religion', true)
            );

            $this->db->insert('religion', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your religion has been created.</b></center>');
            redirect($this->agent->referrer());
        }

        public function religion_edit()
        {
            $data = array(
                'religion'    => $this->input->post('religion', true)
            );

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('religion', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your religion has been updated.</b></center>');
            redirect($this->agent->referrer());
        }

        public function religion_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('religion');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your religion has been deleted.</b></center>');
            redirect($this->agent->referrer());
        }
    // end religion

    // start cuti
        public function cuti()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
            // echo 'selemat datang ' . $data['user']['name'];
            $data['title'] = 'Setting | Cuti';
            $this->load->view('template/header', $data);
            $this->load->view('setting/menuSetting', $data);
            $this->load->view('setting/cuti');
            $this->load->view('template/footer');
        }

        public function cuti_add()
        {
            $data = array(
                'kode_cuti'    => str_replace(" ", "", $this->input->post('kode_cuti', true)),
                'cuti'         => $this->input->post('nama_cuti', true),
                'lama_cuti'    => $this->input->post('lama_cuti', true)
            );

            $this->db->insert('cuti', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Keterangan cuti berhasil dibuat.</b></center>');
            redirect($this->agent->referrer());
        }

        public function cuti_edit()
        {
            $data = array(
                'kode_cuti'    => str_replace(" ", "", $this->input->post('kode_cuti', true)),
                'cuti'         => $this->input->post('nama_cuti', true),
                'lama_cuti'    => $this->input->post('lama_cuti', true)
            );

            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('cuti', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Keterangan cuti berhasil diubah.</b></center>');
            redirect($this->agent->referrer());
        }

        public function cuti_delete()
        {
            $this->db->where('id', $this->input->post('id', true));
            $this->db->delete('cuti');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Keterangan cuti berhasil di hapus.</b></center>');
            redirect($this->agent->referrer());
        }
    // end cuti
}