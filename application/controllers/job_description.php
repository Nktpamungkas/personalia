<?php
defined('BASEPATH') or exit('No direct script access allowed');

class job_description extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'Job Description';
        $this->load->view('template/header', $data);
        $this->load->view('job_description/index');
        $this->load->view('template/footer');
    }

    public function tambahdata()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'Job Description';
        $this->load->view('template/header', $data);
        $this->load->view('job_description/tambahdata');
        $this->load->view('template/footer');
    }

    public function proses_tambahdata()
    {
        // lakukan upload file
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = '5240'; // 10 MB
        $config['remove_space']         = TRUE;
    
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->do_upload('lampiran');
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        $nama_lampiran = $return['file']['file_name'];
        $ukuran_file   = $return['file']['file_size'];
        $type_file     = $return['file']['file_type'];

        $data = array(
            'jabatan'                   => $this->input->post('jabatan', true),
            'no_scan'                   => $this->input->post('no_scan', true),
            'struktur_organisasi'       => $return['file']['file_name'],
            'fungsi_utama_jabatan'      => $this->input->post('fungsi_utama_jabatan', true),
            'pendidikan'                => $this->input->post('pendidikan', true),
            'pengalaman'                => $this->input->post('pengalaman', true)
        );
        $insert_jobdesc = $this->db->insert('job_description', $data);
        $id_jobdesc = $this->db->insert_id();

        // edit jabatan dan bagian di employee information
        // $data_emp = array(
        //     'jabatan'                   => $this->input->post('jabatan', true),
        //     'bagian'                    => $this->input->post('bagian', true)
        // );
        // $this->db->where('no_scan', $this->input->post('no_scan', true));
        // $this->db->update('tbl_makar', $data_emp);
        
        // TANGGUNG JAWAB
        $this->db->trans_start();
        $job_responsibilities   = $this->input->post('job_responsibilities', true); 
        $output                 = $this->input->post('output', true); 
        $value_tj               = array();
        $index_tj               = 0;
        foreach ($job_responsibilities AS $job_res) {
            array_push($value_tj, array(
                'id_jobdesc'            => $id_jobdesc,
                'job_responsibilities'  => $job_res,
                'output'                => $output[$index_tj]
            ));
            $index_tj++;
        }
        $insert_tj  = $this->db->insert_batch('tanggung_jawab', $value_tj);
        $this->db->trans_complete();

        // WEWENANG 
        $this->db->trans_start();
        $wewenang       = $this->input->post('wewenang[]', true);
        $value_wewenang = array();
        foreach ($wewenang as $key_wewenang) {
            array_push($value_wewenang, array(
                'id_jobdesc'            => $id_jobdesc,
                'wewenang'              => $key_wewenang
            ));
        }
        $insert_wewenang  = $this->db->insert_batch('wewenang', $value_wewenang);
        $this->db->trans_complete();

        // TANTANGAN PEKERJAAN 
        $this->db->trans_start();
        $tantanganpekerjaan     = $this->input->post('tantanganpekerjaan[]', true);
        $value_tp         = array();
        foreach ($tantanganpekerjaan as $key_tp) {
            array_push($value_tp, array(
                'id_jobdesc'            => $id_jobdesc,
                'tantangan_pekerjaan'    => $key_tp
            ));
        }
        $insert_tp  = $this->db->insert_batch('tantangan_pekerjaan ', $value_tp);
        $this->db->trans_complete();

        // INTERAKSI INTERNAL 
        $this->db->trans_start();
        $interaksi_internal     = $this->input->post('interaksi_internal[]', true);
        $value_in         = array();
        foreach ($interaksi_internal as $key_in) {
            array_push($value_in, array(
                'id_jobdesc'            => $id_jobdesc,
                'interaksi_internal'    => $key_in
            ));
        }
        $insert_in  = $this->db->insert_batch('interaksi_internal', $value_in);
        $this->db->trans_complete();
       
        // INTERAKSI EKSTERNAL 
        $this->db->trans_start();
        $interaksi_external     = $this->input->post('interaksi_external[]', true);
        $value_ex               = array();
        foreach ($interaksi_external as $key_ex) {
            array_push($value_ex, array(
                'id_jobdesc'            => $id_jobdesc,
                'interaksi_external'    => $key_ex
            ));
        }
        $insert_eks  = $this->db->insert_batch('interaksi_external ', $value_ex);
        $this->db->trans_complete();

        if($return['file']['file_name']){
            if($return['result'] == "success"){ // Jika proses upload sukses
                if ($insert_jobdesc && $insert_tj && $insert_wewenang && $insert_tp && $insert_in && $insert_eks) {
                    $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Job Description berhasil dibuat.</b></center>');
                    redirect('job_description');
                }
            }else{ //Jika proses upload gagal
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>'.$return['error'].'</b></center>');
                redirect($this->agent->referrer()); 
            }
        }else{
            if ($insert_jobdesc && $insert_tj && $insert_wewenang && $insert_tp && $insert_in && $insert_eks) {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Job Description berhasil dibuat.</b></center>');
                redirect('job_description');
            }
        }
    }

    public function editdata($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['job_description'] = $this->db->query("SELECT * FROM job_description WHERE id = $id")->row_array();
        $data['id_jobdesc'] = $this->db->query("SELECT * FROM job_description WHERE id = $id")->row();

        $data['title'] = 'Job Description';
        $this->load->view('template/header', $data);
        $this->load->view('job_description/editdata');
        $this->load->view('template/footer');
    }

    public function proses_editdata_jobdesc()
    {
        // lakukan upload file
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = '5240'; // 5 MB
        $config['remove_space']         = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->do_upload('lampiran');
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        $nama_lampiran = $return['file']['file_name'];
        $ukuran_file   = $return['file']['file_size'];
        $type_file     = $return['file']['file_type'];
        
        if ($return['file']['file_name']) { //jika file upload tersedia
            $_id = $this->db->get_where('job_description',array('id' => $this->input->post('id', true)))->row();
            unlink("gambar/".$_id->struktur_organisasi);
            $data = array(
                'jabatan'                   => $this->input->post('jabatan', true),
                'no_scan'                   => $this->input->post('no_scan', true),
                'struktur_organisasi'       => $return['file']['file_name'],
                'fungsi_utama_jabatan'      => $this->input->post('fungsi_utama_jabatan', true),
                'pendidikan'                => $this->input->post('pendidikan', true),
                'pengalaman'                => $this->input->post('pengalaman', true)
            );
        } else { //jika file upload tidak tersedia
            $data = array(
                'jabatan'                   => $this->input->post('jabatan', true),
                'no_scan'                   => $this->input->post('no_scan', true),
                'fungsi_utama_jabatan'      => $this->input->post('fungsi_utama_jabatan', true),
                'pendidikan'                => $this->input->post('pendidikan', true),
                'pengalaman'                => $this->input->post('pengalaman', true)
            );
        }
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('job_description', $data);

        // edit jabatan dan bagian di employee information
        // $data_emp = array(
        //     'jabatan'                   => $this->input->post('jabatan', true),
        //     'bagian'                    => $this->input->post('bagian', true)
        // );
        // $this->db->where('no_scan', $this->input->post('no_scan', true));
        // $this->db->update('tbl_makar', $data_emp);

        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Job Description berhasil dibuat.</b></center>');
        redirect($this->agent->referrer());
    }

    public function proses_editdata_tanggungjawab($id_jobdesc)
    {
        // EDIT TANGGUNG JAWAB
        $this->db->trans_start();
        $id                          = $this->input->post('id', true);
        $job_responsibilities_edit   = $this->input->post('job_responsibilities_edit', true); 
        $output_edit                 = $this->input->post('output_edit', true); 
        
        $value_tj_edit               = array();
        $index_tj_edit               = 0;
        if (is_array($job_responsibilities_edit)) {
            foreach ($job_responsibilities_edit AS $job_res_edit) {
                array_push($value_tj_edit, array(
                    'id'                    => $id[$index_tj_edit],
                    'job_responsibilities'  => $job_res_edit,
                    'output'                => $output_edit[$index_tj_edit]
                ));
                $index_tj_edit++;
            }
        }
        $update_tj  = $this->db->update_batch('tanggung_jawab', $value_tj_edit, 'id');
        $this->db->trans_complete();
        
        if ($this->input->post('job_responsibilities', true)) {
            // TAMBAH TANGGUNG JAWAB
            $this->db->trans_start();
            $id_jobdesc             = $id_jobdesc;
            $job_responsibilities   = $this->input->post('job_responsibilities', true); 
            $output                 = $this->input->post('output', true); 
            $value_tj               = array();
            $index_tj               = 0;
            if (is_array($job_responsibilities)) {
                foreach ($job_responsibilities AS $key_js) {
                    array_push($value_tj, array(
                        'id_jobdesc'            => $id_jobdesc,
                        'job_responsibilities'  => $key_js,
                        'output'                => $output[$index_tj]
                    ));
                    $index_tj++;
                }
            }
            $insert_tj  = $this->db->insert_batch('tanggung_jawab', $value_tj);
            $this->db->trans_complete();
        }

        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Terimpan.</b></center>');
        redirect($this->agent->referrer());
    }

    public function proses_editdata_wewenang($id_jobdesc)
    {
        // EDIT WEWENANG 
        $this->db->trans_start();
        $id                  = $this->input->post('id[]', true);
        $wewenang_edit       = $this->input->post('wewenang_edit[]', true);
        $value_wewenang_edit = array();
        $index_wewenang_edit = 0;
        if (is_array($wewenang_edit)) {
            foreach ($wewenang_edit as $key_wewenang_edit) {
                array_push($value_wewenang_edit, array(
                    'id'        => $id[$index_wewenang_edit],
                    'wewenang'  => $key_wewenang_edit
                ));
                $index_wewenang_edit++;
            }
        }
        $this->db->update_batch('wewenang', $value_wewenang_edit, 'id');
        $this->db->trans_complete();

        if ($this->input->post('wewenang[]')) {
            // TAMBAH WEWENANG 
            $this->db->trans_start();
            $wewenang       = $this->input->post('wewenang[]', true);
            $value_wewenang = array();
            if (is_array($wewenang)) {
                foreach ($wewenang as $key_wewenang) {
                    array_push($value_wewenang, array(
                        'id_jobdesc'            => $id_jobdesc,
                        'wewenang'              => $key_wewenang
                    ));
                }
            }
            $this->db->insert_batch('wewenang', $value_wewenang);
            $this->db->trans_complete();
        }
         
        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Terimpan.</b></center>');
        redirect($this->agent->referrer());
    }

    public function proses_editdata_tantanganpekerjaan($id_jobdesc)
    {
        // EDIT TANTANGAN PEKERJAAN 
        $this->db->trans_start();
        $id                             = $this->input->post('id[]', true);
        $tantanganpekerjaan_edit        = $this->input->post('tantanganpekerjaan_edit[]', true);
        $value_tp_edit                  = array();
        $index_tantanganpekerjaan_edit  = 0;
        if (is_array($tantanganpekerjaan_edit)) {
            foreach ($tantanganpekerjaan_edit as $key_tp_edit) {
                array_push($value_tp_edit, array(
                    'id'                     => $id[$index_tantanganpekerjaan_edit],
                    'tantangan_pekerjaan'    => $key_tp_edit
                ));
                $index_tantanganpekerjaan_edit++;
            }
        $this->db->update_batch('tantangan_pekerjaan ', $value_tp_edit, 'id');
        }
        $this->db->trans_complete();

        if ($this->input->post('tantanganpekerjaan[]')) {
            // TAMBAH TANTANGAN PEKERJAAN 
            $this->db->trans_start();
            $tantanganpekerjaan     = $this->input->post('tantanganpekerjaan[]', true);
            $value_tp               = array();
            if (is_array($tantanganpekerjaan)) {
                foreach ($tantanganpekerjaan as $key_tp) {
                    array_push($value_tp, array(
                        'id_jobdesc'            => $id_jobdesc,
                        'tantangan_pekerjaan'   => $key_tp
                    ));
                }
            }
            $this->db->insert_batch('tantangan_pekerjaan ', $value_tp);
            $this->db->trans_complete();
        }

        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Terimpan.</b></center>');
        redirect($this->agent->referrer());
    }

    public function proses_editdata_internal($id_jobdesc)
    {
        // EDIT INTERAKSI INTERNAL 
        $this->db->trans_start();
        $id                          = $this->input->post('id[]', true);
        $interaksi_internal_edit     = $this->input->post('interaksi_internal_edit[]', true);
        $value_in_edit               = array();
        $index_internal_edit         = 0;
        if (is_array($interaksi_internal_edit)) {
            foreach ($interaksi_internal_edit as $key_in_edit) {
                array_push($value_in_edit, array(
                    'id'                    => $id[$index_internal_edit],
                    'interaksi_internal'    => $key_in_edit
                ));
                $index_internal_edit++;
            }
        } 
        $this->db->update_batch('interaksi_internal', $value_in_edit, 'id');
        $this->db->trans_complete();

        if ($this->input->post('tantanganpekerjaan[]')) {
            // TAMBAH INTERAKSI INTERNAL 
            $this->db->trans_start();
            $interaksi_internal     = $this->input->post('interaksi_internal[]', true);
            $value_in         = array();
            if (is_array($interaksi_internal)) {
                foreach ($interaksi_internal as $key_in) {
                    array_push($value_in, array(
                        'id_jobdesc'            => $id_jobdesc,
                        'interaksi_internal'    => $key_in
                    ));
                }
            }
            $this->db->insert_batch('interaksi_internal', $value_in);
            $this->db->trans_complete();
        }
        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Terimpan.</b></center>');
        redirect($this->agent->referrer());
    }

    public function proses_editdata_external($id_jobdesc)
    {
        // EDIT INTERAKSI EKSTERNAL 
        $this->db->trans_start();
        $id                          = $this->input->post('id[]', true);
        $interaksi_external_edit     = $this->input->post('interaksi_external_edit[]', true);
        $value_ex_edit               = array();
        $index_external_edit         = 0;
        if (is_array($interaksi_external_edit)) {
            foreach ($interaksi_external_edit as $key_ex_edit) {
                array_push($value_ex_edit, array(
                    'id'                    => $id[$index_external_edit],
                    'interaksi_external'    => $key_ex_edit
                ));
                $index_external_edit++;
            }
        }
        $insert_eks  = $this->db->update_batch('interaksi_external', $value_ex_edit, 'id');
        $this->db->trans_complete();
        
        if ($this->input->post('tantanganpekerjaan[]')) {
            // TAMBAH INTERAKSI EKSTERNAL 
            $this->db->trans_start();
            $interaksi_external     = $this->input->post('interaksi_external[]', true);
            $value_ex               = array();
            if (is_array($interaksi_external)) {
                foreach ($interaksi_external as $key_ex) {
                    array_push($value_ex, array(
                        'id_jobdesc'            => $id_jobdesc,
                        'interaksi_external'    => $key_ex
                    ));
                }
            }
            $insert_eks  = $this->db->insert_batch('interaksi_external', $value_ex);
            $this->db->trans_complete();
        }
        
        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Tersimpan.</b></center>');
        redirect($this->agent->referrer());
    }

    public function delete_tanggungjawab($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tanggung_jawab');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Tanggung Jawab berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }
    
    public function delete_wewenang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('wewenang');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Wewenang berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }
    
    public function delete_tp($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tantangan_pekerjaan');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Tantangan Pekerjaan berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }
    
    public function delete_internal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('interaksi_internal');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Interaksi Internal berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }
    
    public function delete_external($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('interaksi_external');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Interaksi External berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }

    public function delete_jobdesc($no_scan,$id_jobdesc)
    {
        if($no_scan){
            $this->db->where('no_scan', $no_scan);
            $this->db->delete('job_description');
            $this->db->where('id_jobdesc', $id_jobdesc);
            $this->db->delete('tanggung_jawab');
            $this->db->where('id_jobdesc', $id_jobdesc);
            $this->db->delete('wewenang');
            $this->db->where('id_jobdesc', $id_jobdesc);
            $this->db->delete('tantangan_pekerjaan');
            $this->db->where('id_jobdesc', $id_jobdesc);
            $this->db->delete('interaksi_internal');
            $this->db->where('id_jobdesc', $id_jobdesc);
            $this->db->delete('interaksi_external');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Job Description berhasil dihapus.</b></center>');
            redirect($this->agent->referrer());
        }else{
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"  style="font-size: 14px"><b>Silahkan isi jabatan dan nama pemangku jabatan terlebih dahulu untuk menghapus data ini.</b></center>');
            redirect($this->agent->referrer());
        }
    }

    public function print_jobdesc($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['job_description'] = $this->db->query("SELECT * FROM job_description WHERE id = $id")->row_array();
        $data['id_jobdesc'] = $this->db->query("SELECT * FROM job_description WHERE id = $id")->row();

        $data['title'] = 'Job Description';
        $this->load->view('job_description/print', $data);
    }

    public function duplicate_data($id_jobdesc)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $job_description = $this->db->query("SELECT * FROM job_description WHERE id = $id_jobdesc")->row();

        $data_job_description = array(
            'struktur_organisasi'       => $job_description->struktur_organisasi,
            'fungsi_utama_jabatan'      => $job_description->fungsi_utama_jabatan,
            'pendidikan'                => $job_description->pendidikan,
            'pengalaman'                => $job_description->pengalaman
        );
        $insert_jobdesc = $this->db->insert('job_description', $data_job_description);
        $idlast_jobdesc = $this->db->insert_id();

        $tanggung_jawab = $this->db->query("SELECT * FROM tanggung_jawab WHERE id_jobdesc = $id_jobdesc")->result_array();
        foreach ($tanggung_jawab as $key_tanggung_jawab) {
            $data_tanggung_jawab = array(
                'id_jobdesc'                => $idlast_jobdesc,
                'job_responsibilities'      => $key_tanggung_jawab['job_responsibilities'],
                'output'                    => $key_tanggung_jawab['output']
            );
            $insert_tanggung_jawab = $this->db->insert('tanggung_jawab', $data_tanggung_jawab);
        }        
        
        $wewenang = $this->db->query("SELECT * FROM wewenang WHERE id_jobdesc = $id_jobdesc")->result_array();
        foreach ($wewenang as $key_wewenang) {
            $data_wewenang = array(
                'id_jobdesc'         => $idlast_jobdesc,
                'wewenang'           => $key_wewenang['wewenang'],
            );
            $insert_wewenang = $this->db->insert('wewenang', $data_wewenang);
        }        
        
        $tantangan_pekerjaan = $this->db->query("SELECT * FROM tantangan_pekerjaan WHERE id_jobdesc = $id_jobdesc")->result_array();
        foreach ($tantangan_pekerjaan as $key_tantangan_pekerjaan) {
            $data_tantangan_pekerjaan = array(
                'id_jobdesc'            => $idlast_jobdesc,
                'tantangan_pekerjaan'   => $key_tantangan_pekerjaan['tantangan_pekerjaan'],
            );
            $insert_tantangan_pekerjaan = $this->db->insert('tantangan_pekerjaan', $data_tantangan_pekerjaan);
        }        
        
        $interaksi_internal = $this->db->query("SELECT * FROM interaksi_internal WHERE id_jobdesc = $id_jobdesc")->result_array();
        foreach ($interaksi_internal as $key_interaksi_internal) {
            $data_interaksi_internal = array(
                'id_jobdesc'           => $idlast_jobdesc,
                'interaksi_internal'   => $key_interaksi_internal['interaksi_internal'],
            );
            $insert_interaksi_internal = $this->db->insert('interaksi_internal', $data_interaksi_internal);
        }        
        
        $interaksi_external = $this->db->query("SELECT * FROM interaksi_external WHERE id_jobdesc = $id_jobdesc")->result_array();
        foreach ($interaksi_external as $key_interaksi_external) {
            $data_interaksi_external = array(
                'id_jobdesc'           => $idlast_jobdesc,
                'interaksi_external'   => $key_interaksi_external['interaksi_external'],
            );
            $insert_interaksi_external = $this->db->insert('interaksi_external', $data_interaksi_external);
        }   
        
        if ($insert_jobdesc && $insert_tanggung_jawab && $insert_wewenang && $insert_tantangan_pekerjaan && $insert_interaksi_internal && $insert_interaksi_external) {
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Job Description berhasil di duplicate.</b></center>');
            redirect('job_description');
        } else {
            redirect($this->agent->referrer());
        }
    }
}