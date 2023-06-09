<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pkl extends CI_Controller
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
        $data['title'] = 'Time Attendance | Lembur';
        $this->load->view('template/header', $data);
        $this->load->view('pkl/index');
        $this->load->view('template/footer');
    }

    public function index_all()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Time Attendance | Lembur';
        $this->load->view('template/header', $data);
        $this->load->view('pkl/index_all');
        $this->load->view('template/footer');
    }

    public function show_verifikasi()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 
        $data['title'] = 'Time Attendance | Lembur';

        $bulan['Belum_ver'] = 'Verifikasi';

        $this->load->view('template/header', $data);
        $this->load->view('pkl/index_all_verifikasi', $bulan);
        $this->load->view('template/footer');
    }

    public function data_employee($dept)
    {
        $data = $this->db->query("SELECT no_scan, nama FROM `tbl_makar` WHERE dept = '$dept'")->result_array();
        echo json_encode($data);
    }

    public function data_index_all()
    {
        $tahun = date('Y');

        $data = $this->db->query("SELECT a.id, a.kode_lembur,
                                        a.dept,
                                        b.tanggal_permohonan,
                                        a.shift,
                                        DATE_FORMAT(  b.tanggal_permohonan, '%d %b %Y' ) AS tgl_format,
                                        SUBSTRING( a.tujuan_lembur, 1, 60 ) AS tujuan_lembur,
                                        a.target_lembur,
                                        SUBSTRING( a.penyebab_lembur, 1, 60 ) AS penyebab_lembur,
                                        a.dibuat_oleh_nama,
                                        b.`status` 
                                    FROM
                                        permohonan_kerja_lembur a
                                        LEFT JOIN ( SELECT b.id_pkl, b.`status`, b.tanggal_permohonan FROM daftar_lembur b ) b ON b.id_pkl = a.id
                                    WHERE
                                        b.`status` = 'Printed' 
                                        AND b.tanggal_permohonan BETWEEN DATE_ADD( now( ), INTERVAL -2 MONTH ) AND DATE_ADD( now( ), INTERVAL 5 MONTH )
                                        -- menampilkan range tanggal 2 bulan sebelumnya sampai dengan 3 bulan kedepan
                                    GROUP BY
                                        a.kode_lembur 
                                    ORDER BY
                                        b.tanggal_permohonan asc")->result_array();
        echo json_encode($data);
    }
    
    public function data_index_all_verifikasi()
    {
        $tahun = date('Y');

        $data = $this->db->query("SELECT a.id, a.kode_lembur,
                                        a.dept,
                                        b.tanggal_permohonan,
                                        a.shift,
                                        DATE_FORMAT(  b.tanggal_permohonan, '%d %b %Y' ) AS tgl_format,
                                        SUBSTRING( a.tujuan_lembur, 1, 60 ) AS tujuan_lembur,
                                        a.target_lembur,
                                        SUBSTRING( a.penyebab_lembur, 1, 60 ) AS penyebab_lembur,
                                        a.dibuat_oleh_nama,
                                        b.`status` 
                                    FROM
                                        permohonan_kerja_lembur a
                                        LEFT JOIN ( SELECT b.id_pkl, b.`status`, b.tanggal_permohonan FROM daftar_lembur b ) b ON b.id_pkl = a.id
                                    WHERE
                                        b.`status` IN ( 'Verifikasi' )
                                        AND  b.tanggal_permohonan BETWEEN DATE_ADD( now( ), INTERVAL -2 MONTH ) AND DATE_ADD( now( ), INTERVAL 5 MONTH )
                                        -- menampilkan range tanggal 2 bulan sebelumnya sampai dengan 3 bulan kedepan
                                    GROUP BY
                                        a.kode_lembur 
                                    ORDER BY
                                        b.tanggal_permohonan DESC")->result_array();
        echo json_encode($data);
    }

    public function search_nama($no_scan)
    {
        $dataSearch = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$no_scan' ")->result();
        echo json_encode($dataSearch);
    }
    
    public function hapus_permohonan_lembur($kodelembur)
    {
        $this->db->where('kode_lembur', $kodelembur);
        $this->db->delete('permohonan_kerja_lembur');

        $this->db->where('kode_lembur', $kodelembur);
        $this->db->delete('daftar_lembur');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Permohonan kerja lembur berhasil dihapus.</b></center>');
        redirect($this->agent->referrer());
    }

    public function hapus_daftar_lembur($kodelembur)
    {
        $cari_data_daftarlembur =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur' ")->row();
        $cari_data_permohonan =  $this->db->query("SELECT COUNT(*) AS count FROM permohonan_kerja_lembur WHERE kode_lembur = '$kodelembur' ")->row();

        if ($cari_data_daftarlembur->count || $cari_data_permohonan->count) {
            $this->db->where('kode_lembur', $kodelembur);
            $this->db->delete('daftar_lembur');
            $this->db->where('kode_lembur', $kodelembur);
            $this->db->delete('permohonan_kerja_lembur');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Surat perintah lembur berhasil dihapus.</b></center>');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"  style="font-size: 14px"><b>Data yang dihapus tidak tersedia. </b></center>');
            redirect($this->agent->referrer());
        }
        
    }

    public function export_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('pkl/exportToExcel', $data);
    }

    // START NEW REQUEST FOR OVERTIME WORK                             
        public function add_Request()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
            $data['title'] = 'Time Attendance | Lembur';
            $this->load->view('template/header', $data);
            $this->load->view('pkl/add');
            $this->load->view('template/footer');
        }

        public function add($username)
        {
            $this->db->trans_start();
            $data_name = $this->input->post('no_scan[]', true);
            $value = array();
            $id_terakhir = $this->db->query("SELECT (id + 1) AS last_id FROM permohonan_kerja_lembur ORDER BY id DESC LIMIT 1")->row();
            foreach ($data_name as $key) {
                array_push($value, array(
                    'kode_lembur'               => "FL-".date('Ym')."-".sprintf('%07s', $id_terakhir->last_id),
                    'dept'                      =>  $this->input->post('dept', true),
                    'no_scan'                   =>  $key,
                    // 'tujuan_lembur'             =>  $this->input->post('tujuan_lembur', true),
                    // 'target_lembur'             =>  $this->input->post('target_lembur', true),
                    // 'tipe_lembur'               =>  $this->input->post('tipe_lembur', true),
                    // 'jam'                       =>  $this->input->post('jam', true),
                    // 'penyebab_lembur'           =>  $this->input->post('penyebab_lembur', true),
                    // 'dibuat_oleh_nama'          =>  $this->input->post('dibuat_oleh_nama', true),
                    // 'dibuat_oleh_jabatan'       =>  $this->input->post('dibuat_oleh_jabatan', true),
                    // 'diperiksa_oleh_nama'       =>  $this->input->post('diperiksa_oleh_nama', true),
                    // 'diperiksa_oleh_jabatan'    =>  $this->input->post('diperiksa_oleh_jabatan', true),
                    // 'ddpl_diketahui_nama'       =>  $this->input->post('diketahui_oleh_nama', true),
                    // 'ddpl_diketahui_jabatan'    =>  $this->input->post('diketahui_oleh_jabatan', true),
                    // 'dt_disetujui_nama'         =>  $this->input->post('disetujui_oleh_nama', true),
                    // 'dt_disetujui_jabatan'      =>  $this->input->post('disetujui_oleh_jabatan', true),
                    // 'tanggal'                   =>  $this->input->post('tanggal', true),
                    'shift'                     =>  $this->input->post('shift', true)
                ));
            }
            $this->db->insert_batch('permohonan_kerja_lembur', $value);
            $this->db->trans_complete();

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Your Request for Overtime Work has been created.</b></center>');
            redirect('pkl');
        }

        public function tambah($kodelembur)
        {   
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 

            $cari_data_tambah   =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur'")->row();

            if ($cari_data_tambah->count) {                 // Jika Data lembur sudah dibuat
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Maaf, tidak bisa mengubah data.</b></center>');
                redirect('pkl');
            } else {                                        // Jika Data lembur belum dibuat
                $data['title'] = 'Time Attendance | Edit Lembur';
                $data['dpkl'] = $this->db->query("SELECT * FROM permohonan_kerja_lembur WHERE kode_lembur = '$kodelembur'")->row();
                $this->load->view('template/header', $data);
                $this->load->view('pkl/tambah', $data);
                $this->load->view('template/footer');
            }
        }

        public function tambah_proses($username)
        {
            if ($this->input->post('no_scan[]', true)) {
                
                $data_name = $this->input->post('no_scan[]', true);
                $value = array();
                foreach ($data_name as $key) {
                    array_push($value, array(
                        'kode_lembur'               =>  $this->input->post('kode_lembur', true),
                        'dept'                      =>  $this->input->post('dept', true),
                        'shift'                     =>  $this->input->post('shift', true),
                        'no_scan'                   =>  $key
                    ));
                }
                $execute_insert = $this->db->insert_batch('permohonan_kerja_lembur', $value);

                if ($execute_insert) {
                    $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Your Request for Overtime Work has been updated.</b></center>');
                    redirect('pkl');
                } else {
                    $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Your Request for Overtime Work NOT ADDED.</b></center>');
                    redirect('pkl');
                }
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-info" role="alert" style="font-size: 14px"><b>Your Request for overtime Work is empty.</b></center>');
                redirect('pkl');
            }
        }

        public function edit_request($kodelembur)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 

            $cari_data_tambah   =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur'")->row();
            if ($cari_data_tambah->count) {                 // Jika Data lembur sudah dibuat
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Maaf, tidak dapat mengubah data</b></center>');
                redirect('pkl');
            } else { 
                $data['title'] = 'Time Attendance | Edit Lembur';
                $data['dpkl'] = $this->db->query("SELECT * FROM permohonan_kerja_lembur WHERE kode_lembur = '$kodelembur'")->row();
                $this->load->view('template/header', $data);
                $this->load->view('pkl/edit', $data);
                $this->load->view('template/footer');
            }
        }

        public function edit($username)
        {   
            $data_name  = $this->input->post('no_scan', true);
            $data_id    = $this->input->post('id', true);
            $value      = array();
            $index      = 0; 
            foreach ($data_id as $key) {
                array_push($value, array(
                    'id'                        =>  $key,
                    'dept'                      =>  $this->input->post('dept', true),
                    'shift'                     =>  $this->input->post('shift', true),
                    'no_scan'                   =>  $data_name[$index],
                    // 'tujuan_lembur'             =>  $this->input->post('tujuan_lembur', true),
                    // 'target_lembur'             =>  $this->input->post('target_lembur', true),
                    // 'tipe_lembur'               =>  $this->input->post('tipe_lembur', true),
                    // 'jam'                       =>  $this->input->post('jam', true),
                    // 'penyebab_lembur'           =>  $this->input->post('penyebab_lembur', true),
                    // 'dibuat_oleh_nama'          =>  $this->input->post('dibuat_oleh_nama', true),
                    // 'dibuat_oleh_jabatan'       =>  $this->input->post('dibuat_oleh_jabatan', true),
                    // 'diperiksa_oleh_nama'       =>  $this->input->post('diperiksa_oleh_nama', true),
                    // 'diperiksa_oleh_jabatan'    =>  $this->input->post('diperiksa_oleh_jabatan', true),
                    // 'ddpl_diketahui_nama'       =>  $this->input->post('diketahui_oleh_nama', true),
                    // 'ddpl_diketahui_jabatan'    =>  $this->input->post('diketahui_oleh_jabatan', true),
                    // 'dt_disetujui_nama'         =>  $this->input->post('disetujui_oleh_nama', true),
                    // 'dt_disetujui_jabatan'      =>  $this->input->post('disetujui_oleh_jabatan', true),
                    // 'tanggal'                   =>  $this->input->post('tanggal', true)
                ));
                $index++;
            }
            $execute_insert = $this->db->update_batch('permohonan_kerja_lembur', $value, 'id');
            
            if ($execute_insert) {
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Your request for overtime work has been updated.</b></center>');
                redirect('pkl');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Your request for overtime work <i>not updated</i>.</b></center>');
                redirect('pkl');
            }
        }

        public function print_permohonan($kodelembur)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 

            $data['pkl'] = $this->db->query("SELECT * FROM permohonan_kerja_lembur WHERE kode_lembur = '$kodelembur'")->row();
            $this->load->view('pkl/print_permohonan', $data);
            
        }
    // END NEW REQUEST FOR OVERTIME WORK

    // START OVERTIME LIST
        public function add_overtime_list($kodelembur)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $cari_data =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur' ")->row();

            if ($cari_data->count) { // Jika data ada. EDIT Surat perintah lembur ATAU UNTUK VERIFIKASI
                $data['dl'] = $this->db->query("SELECT * FROM daftar_lembur WHERE kode_lembur = '$kodelembur' ")->row();
                $data['title'] = 'Time Attendance | Edit Lembur';
                $this->load->view('template/header', $data);
                $this->load->view('pkl/edit_ol', $data);
                $this->load->view('template/footer');
            } else { // Jika data tidak ada. NEW Surat perintah lembur
                $data['dl'] = $this->db->query("SELECT * FROM permohonan_kerja_lembur WHERE kode_lembur = '$kodelembur' ")->row();
                $data['title'] = 'Time Attendance | Lembur';
                $this->load->view('template/header', $data);
                $this->load->view('pkl/add_ol', $data);
                $this->load->view('template/footer');
            }
        }
         // START OVERTIME LIST
         public function add_overtime_list2($kodelembur)
         {
             $data['user'] = $this->db->get_where('user', array('name' =>
             $this->session->userdata('name')))->row_array();
 
             $cari_data =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur' ")->row();
 
             if ($cari_data->count) { // Jika data ada. EDIT Surat perintah lembur ATAU UNTUK VERIFIKASI
                 $data['dl'] = $this->db->query("SELECT * FROM daftar_lembur WHERE kode_lembur = '$kodelembur' ")->row();
                 $data['title'] = 'Time Attendance | Edit Lembur';
                 $this->load->view('template/header', $data);
                 $this->load->view('pkl/edit_ol2', $data);
                 $this->load->view('template/footer');
             } 
         }

        public function add_ol($username)
        {
            $this->db->trans_start();
            $nama                   = $this->input->post('nama', true);                     // Array
            $id                     = $this->input->post('id', true);                       // Array
            $no_absen               = $this->input->post('no_absen', true);                 // Array
            $waktu_lembur_start     = $this->input->post('wl_1', true);                     // Array
            $waktu_lembur_stop      = $this->input->post('wl_2', true);                     // Array
            $istirahat              = $this->input->post('istirahat', true);                // Array
            $total_jam_lembur       = $this->input->post('total_jam_lembur', true);         // Array
            $keterangan             = $this->input->post('keterangan', true);               // Array
            $value                  = array();
            $index                  = 0;                                                    // Set Index Awal 0
            foreach ($nama as $key) {                                                       // Buat Perulangan berdasarkan nama sampai akhir
                array_push($value, array(
                    'kode_lembur'               => $this->input->post('kode_lembur', true),
                    'dept'                      => $this->input->post('dept', true),
                    'shift'                     => $this->input->post('shift', true),
                    'tanggal'                   => $this->input->post('tanggal', true),
                    'nama'                      => $key,
                    'id_pkl'                    => $id[$index],
                    'no_absen'                  => $no_absen[$index],
                    'waktu_lembur_start'        => $waktu_lembur_start[$index],
                    'waktu_lembur_stop'         => $waktu_lembur_stop[$index],
                    'istirahat'                 => $istirahat[$index],
                    'total_jam_lembur'          => $total_jam_lembur[$index],
                    'keterangan'                => $keterangan[$index],
                    'dibuat_oleh_nama'          => $this->input->post('dibuat_oleh_nama', true),
                    'dibuat_oleh_jabatan'       => $this->input->post('dibuat_oleh_jabatan', true),
                    'diperiksa_oleh_nama'       => $this->input->post('diperiksa_oleh_nama', true),
                    'diperiksa_oleh_jabatan'    => $this->input->post('diperiksa_oleh_jabatan', true),
                    'disetujui_oleh_nama'       => $this->input->post('disetujui_oleh_nama', true),
                    'disetujui_oleh_jabatan'    => $this->input->post('disetujui_oleh_jabatan', true),
                    'tanggal_ttd'               => $this->input->post('tanggal_ttd', true),
                    'tanggal_permohonan'        => $this->input->post('tanggal', true)
                ));
                $index++;
            }
                $this->db->insert_batch('daftar_lembur', $value);
                $this->db->trans_complete();

                $_value = array();
                $_index = 0;
                foreach ($nama as $DataKey) {
                    array_push($_value, array(
                        'nama'                      =>  $DataKey,
                        'id'                        =>  $id[$_index]
                    ));
                    $_index++;
                }
                $this->db->update_batch('permohonan_kerja_lembur', $_value, 'id');

                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Your Overtime List has been created.</b></center>');
                redirect('pkl');
        }

        public function edit_ol($dept) 
        {
            $checked = $this->input->post('verifikasi', true);
            // JIKA DATANYA TERCEKLIS ATAU TERVERIFIKASI KHUSUS special_user 1
            if (isset($checked) == 1) {
                $id                     = $this->input->post('id', true);                       // Array
                $id_pkl                 = $this->input->post('id_pkl', true);                   // Array
                $nama                   = $this->input->post('nama', true);                     // Array
                $no_absen               = $this->input->post('no_absen', true);                 // Array
                $waktu_lembur_start     = $this->input->post('wl_1', true);                     // Array
                $waktu_lembur_stop      = $this->input->post('wl_2', true);                     // Array
                $istirahat              = $this->input->post('istirahat', true);                // Array
                $total_jam_lembur       = $this->input->post('total_jam_lembur', true);         // Array
                $keterangan             = $this->input->post('keterangan', true);               // Array
                $value                  = array();
                $index                  = 0;                                                    // Set Index Awal 0
                foreach ($nama as $key) {                                                       // Buat Perulangan berdasarkan nama sampai akhir
                    array_push($value, array(
                        'kode_lembur'               => $this->input->post('kode_lembur', true),
                        'dept'                      => $this->input->post('dept', true),
                        'shift'                     => $this->input->post('shift', true),
                        'tanggal'                   => $this->input->post('tanggal', true),
                        'nama'                      => $key,
                        'no_absen'                  => $no_absen[$index],
                        'id'                        => $id[$index],
                        'waktu_lembur_start'        => $waktu_lembur_start[$index],
                        'waktu_lembur_stop'         => $waktu_lembur_stop[$index],
                        'istirahat'                 => $istirahat[$index],
                        'total_jam_lembur'          => $total_jam_lembur[$index],
                        'keterangan'                => $keterangan[$index],
                        'dibuat_oleh_nama'          => $this->input->post('dibuat_oleh_nama', true),
                        'dibuat_oleh_jabatan'       => $this->input->post('dibuat_oleh_jabatan', true),
                        'diperiksa_oleh_nama'       => $this->input->post('diperiksa_oleh_nama', true),
                        'diperiksa_oleh_jabatan'    => $this->input->post('diperiksa_oleh_jabatan', true),
                        'disetujui_oleh_nama'       => $this->input->post('disetujui_oleh_nama', true),
                        'disetujui_oleh_jabatan'    => $this->input->post('disetujui_oleh_jabatan', true),
                        'tanggal_ttd'               => $this->input->post('tanggal_ttd', true),
                        'status'                    => 'Verifikasi'
                    ));
                    $index++;
                }
                $this->db->update_batch('daftar_lembur', $value , 'id');

                $_value = array();
                $_index = 0;
                foreach ($nama as $DataKey) {
                    array_push($_value, array(
                        'nama'                      => $DataKey,
                        'no_scan'                   => $no_absen[$_index],
                        'id'                        => $id_pkl[$_index],
                        'status'                    => 'Verifikasi'
                    ));
                    $_index++;
                }
                $this->db->update_batch('permohonan_kerja_lembur', $_value, 'id');
    
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Your Overtime list has been verified.</b></center>');
                redirect('pkl/index_all');
            // JIKA DATANYA TIDAK TERCEKLIS ATAU TERVERIFIKASI
            } else {
                $id                     = $this->input->post('id', true);                       // Array
                $id_pkl                 = $this->input->post('id_pkl', true);                   // Array
                $nama                   = $this->input->post('nama', true);                     // Array
                $no_absen               = $this->input->post('no_absen', true);                 // Array
                $waktu_lembur_start     = $this->input->post('wl_1', true);                     // Array
                $waktu_lembur_stop      = $this->input->post('wl_2', true);                     // Array
                $istirahat              = $this->input->post('istirahat', true);                // Array
                $total_jam_lembur       = $this->input->post('total_jam_lembur', true);         // Array
                $keterangan             = $this->input->post('keterangan', true);               // Array
                $value                  = array();
                $index                  = 0;                                                    // Set Index Awal 0
                foreach ($nama as $key) {                                                       // Buat Perulangan berdasarkan nama sampai akhir
                    array_push($value, array(
                        'kode_lembur'               => $this->input->post('kode_lembur', true),
                        'dept'                      => $this->input->post('dept', true),
                        'shift'                     => $this->input->post('shift', true),
                        'tanggal'                   => $this->input->post('tanggal', true),
                        'nama'                      => $key,
                        'no_absen'                  => $no_absen[$index],
                        'id'                        => $id[$index],
                        'waktu_lembur_start'        => $waktu_lembur_start[$index],
                        'waktu_lembur_stop'         => $waktu_lembur_stop[$index],
                        'istirahat'                 => $istirahat[$index],
                        'total_jam_lembur'          => $total_jam_lembur[$index],
                        'keterangan'                => $keterangan[$index],
                        'dibuat_oleh_nama'          => $this->input->post('dibuat_oleh_nama', true),
                        'dibuat_oleh_jabatan'       => $this->input->post('dibuat_oleh_jabatan', true),
                        'diperiksa_oleh_nama'       => $this->input->post('diperiksa_oleh_nama', true),
                        'diperiksa_oleh_jabatan'    => $this->input->post('diperiksa_oleh_jabatan', true),
                        'disetujui_oleh_nama'       => $this->input->post('disetujui_oleh_nama', true),
                        'disetujui_oleh_jabatan'    => $this->input->post('disetujui_oleh_jabatan', true),
                        'tanggal_ttd'               => $this->input->post('tanggal_ttd', true)
                    ));
                    $index++;
                }
                $this->db->update_batch('daftar_lembur', $value, 'id');
                
                $_value = array();
                $_index = 0;
                foreach ($nama as $DataKey) {
                    array_push($_value, array(
                        'nama'                      => $DataKey,
                        'no_scan'                   => $no_absen[$_index],
                        'id'                        => $id_pkl[$_index]
                    ));
                    $_index++;
                }
                $this->db->update_batch('permohonan_kerja_lembur', $_value, 'id');
    
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Your Overtime list has been updated.</b></center>');
                redirect('pkl');
            }
        }

        public function print_daftar_lembur($kodelembur)
        {
            $cari_data =  $this->db->query("SELECT COUNT(*) AS count FROM daftar_lembur WHERE kode_lembur = '$kodelembur'")->row();
            if ($cari_data->count) {
                $data['user'] = $this->db->get_where('user', array('name' =>
                $this->session->userdata('name')))->row_array();

                $data['dl'] = $this->db->query("SELECT  id,
                                                        kode_lembur,
                                                        id_pkl,
                                                        dept, 
                                                        tanggal_ttd, 
                                                        shift, 
                                                        tanggal, 
                                                        dibuat_oleh_nama, 
                                                        dibuat_oleh_jabatan, 
                                                        diperiksa_oleh_nama, 
                                                        diperiksa_oleh_jabatan,
                                                        disetujui_oleh_nama, 
                                                        disetujui_oleh_jabatan 
                                                    FROM 
                                                        daftar_lembur 
                                                    WHERE 
                                                    kode_lembur = '$kodelembur'")->row();

                $select_id = $this->db->query("SELECT  id,
                                                        kode_lembur,
                                                        id_pkl,
                                                        dept, 
                                                        tanggal_ttd, 
                                                        shift, 
                                                        tanggal, 
                                                        dibuat_oleh_nama, 
                                                        dibuat_oleh_jabatan, 
                                                        diperiksa_oleh_nama, 
                                                        diperiksa_oleh_jabatan,
                                                        disetujui_oleh_nama, 
                                                        disetujui_oleh_jabatan 
                                                    FROM 
                                                        daftar_lembur 
                                                    WHERE 
                                                        kode_lembur = '$kodelembur'")->result_array();
                foreach ($select_id as $value) {
                    $update_printed = $this->db->query("UPDATE daftar_lembur SET `status` = 'Printed' WHERE id = '$value[id]' "); 
                }

                foreach ($select_id as $value) {
                    $update_printed = $this->db->query("UPDATE permohonan_kerja_lembur SET `status` = 'Printed' WHERE id = '$value[id_pkl]' "); 
                }
                
                $this->load->view('pkl/print_daftar_lembur', $data);
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"  style="font-size: 14px"><b>Tidak bisa `Print Surat Perintah Lembur`, data masih kosong! Silahkan `Buat Surat Perintah Lembur`.</b></center>');
                redirect($this->agent->referrer());
            }
            
        }

        public function delete_overtime_list($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('permohonan_kerja_lembur');
            
            $this->db->where('id_pkl', $id);
            $this->db->delete('daftar_lembur');

            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"  style="font-size: 14px"><b>Surat perintah lembur berhasil di hapus.</b></center>');
            redirect($this->agent->referrer());
        }
    // END OVERTIME LIST
}
