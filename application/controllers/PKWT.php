<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PKWT extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'PKWT';
        $this->load->view('template/header', $data);
        $this->load->view('PKWT/index');
        $this->load->view('template/footer');
    }

    public function history($no_scan)
    {
        $data = $this->db->query("SELECT b.id,
                                        b.no_scan,
                                        b.durasi,
                                        a.nama,
                                        a.dept,
                                        DATE_FORMAT( b.kontrak_awal, '%d %M %Y' ) AS kontrak_awal,
                                        DATE_FORMAT( b.kontrak_akhir, '%d %M %Y' ) AS kontrak_akhir,
                                        b.kontrak_awal AS f_kontrak_awal,
                                        b.kontrak_akhir AS f_kontrak_akhir,
                                        b.keterangan,
                                        b.gaji,
                                        b.status,                                       
                                        b.libur
                                    FROM
                                        tbl_makar a
                                        INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE b.no_scan = '$no_scan' ORDER BY b.id DESC")->result_array();
                                        $no = 1;
        echo json_encode($data);
    }

    public function PrintKaryawanPKWT($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array(); 
        $data['makar'] = $this->db->query("SELECT *, date_format(tk.kontrak_awal, '%d') AS tgl_masuk_hari, date_format(tk.kontrak_awal, '%M') AS tgl_masuk_bulan, date_format(tk.kontrak_awal, '%y') AS tgl_masuk_tahun,SUBSTR(makar.alamat_domisili, 1, LOCATE('RT', makar.alamat_domisili)-1) as Domisili,SUBSTR(SUBSTR(makar.alamat_domisili, LOCATE('/', makar.alamat_domisili)+ 1), LOCATE('/', SUBSTR(makar.alamat_domisili, LOCATE('/', makar.alamat_domisili)+ 1))+ 13) AS  kelurahan
                                            FROM tbl_makar makar  
                                            left join tbl_kontrak tk on
                                            tk.no_scan = makar.no_scan 
                                            WHERE makar.no_scan = '$no_scan'
                                            order by 
                                            date_format(tk.kontrak_awal, '%y')desc , date_format(tk.kontrak_awal, '%m') desc")->row();
        $data['no_scan'] = $no_scan;
        
        $data['title'] = 'Print Data Karyawan';
        $this->load->view('PKWT/PrintKaryawanPKWT', $data);
    }

    public function ExportToExcell()
    {
        $this->load->view('pkwt/export_excel');
    }
    
    public function ExportToExcell_perpanjang()
    {
        $this->load->view('pkwt/export_excel_perpanjang');
    }

 //tampil username
 public function tampil_username()
 { $user_data = array(
    'id' => $id->id,
    'name' =>$id->name,
    'name' =>$username,
    'logged_in' => true
    );
 }
    // START INTERNAL MEMO
        public function verifikasi($id)
        {
            $data = array(
                'verifikasi'       => 1
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_kontrak', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Verifikasi berhasil.</b></center>');
            redirect($this->agent->referrer());
        }

        public function add_memo()
        {
            $this->form_validation->set_rules('nomor_memo', 'nomor_memo', 'required|is_unique[memo_pkwt.nomor_memo]');

            if ($this->form_validation->run() == true) {
                $data2 = array(
                    'nomor_memo'        => $this->input->post('nomor_memo', true),
                    'periode_awal'      => $this->input->post('tgl_mulai', true),
                    'periode_akhir'     => $this->input->post('tgl_akhir', true),
                    'dibuat_oleh'       => $this->input->post('dibuat_oleh', true),
                    'mengetahui'        => $this->input->post('mengetahui', true), 
                    'menyetujui'        => $this->input->post('menyetujui', true),
                    'jabatan'           => $this->input->post('jabatan', true)
                );
                $input_memo = $this->db->insert('memo_pkwt', $data2);
                $id = $this->db->insert_id();
                if ($input_memo) {
                    $this->print_memo($id);
                }
            } 
        }

        public function edit_memo($id)
        {
            $data = array(
                'nomor_memo'        => $this->input->post('nomor_memo', true),
                'periode_awal'      => $this->input->post('tgl_mulai', true),
                'periode_akhir'     => $this->input->post('tgl_akhir', true),
                'dibuat_oleh'       => $this->input->post('dibuat_oleh', true),
                'mengetahui'        => $this->input->post('mengetahui', true), 
                'menyetujui'        => $this->input->post('menyetujui', true),
                'jabatan'           => $this->input->post('jabatan', true)
            );
            $this->db->where('id', $id);
            $this->db->update('memo_pkwt', $data);

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Edit memo success.</b></center>');
            redirect($this->agent->referrer());
        }

        public function print_memo($id)
        {
            $data['user']       = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
            $data['data_memo']  = $this->db->get_where('memo_pkwt', array('id' => $id))->row();
            
            $this->load->view('pkwt/print_memo', $data);
        }
    // END INTERNAL MEMO

    // START ADD PKWT
        public function index_pkwt($no_scan)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
            
            $data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row(); //Select * from tbl_makar where no_scan = '$no_scan'
            $data['title'] = 'PERJANJIAN KERJA WAKTU TERTENTU';
            $this->load->view('template/header', $data);
            $this->load->view('pkwt/index_pkwt');
            $this->load->view('template/footer');
            
        }

        public function index_pkwt_history($no_scan)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
            
            $data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row(); //Select * from tbl_makar where no_scan = '$no_scan'
            $data['title'] = 'PKWT';
            $data['no_scan'] = $no_scan;
            $this->load->view('template/header', $data);
            $this->load->view('pkwt/index_pkwt_kontrak');
            $this->load->view('template/footer');
        }

        public function add_pkwt($_noscan)
        {
            $cek_status = $this->db->query("SELECT b.no_scan, a.nama, a.dept, DATE_FORMAT( b.kontrak_akhir, '%d %M %Y' ) AS kontrak_akhir, b.keterangan, b.`status` FROM tbl_makar a INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan WHERE b.no_scan = '$_noscan' ORDER BY b.kontrak_akhir DESC LIMIT 1 ")->row();

            if ($cek_status->keterangan != $this->input->post('status_karyawan')) { // jika keterangan di pkwt tidaksamadengan status_karyawan di makar
                // -----------------------------PROSES UPDATE KONTRAK----------------------------------
                $statusUpdate = $this->db->query("UPDATE tbl_kontrak SET `status` = 'diperpanjang' WHERE no_scan = '$_noscan' ORDER BY kontrak_akhir DESC LIMIT 1"); 

                // -----------------------------PROSES SIMPAN KONTRAK----------------------------------
                $kontrakakhir = $this->input->post('kontrak_akhir', true);
                $sampleDate = "$kontrakakhir";
                $convertDate = date("Y-m-d", strtotime($sampleDate));

                $data2 = array(
                    'no_scan'           => $_noscan,
                    'kontrak_awal'      => $this->input->post('kontrak_awal', true),
                    'kontrak_akhir'     => $convertDate,
                    'keterangan'        => $this->input->post('status_karyawan', true),
                    'durasi'            => $this->input->post('durasi', true), 
                    'gaji'              => $this->input->post('upah', true),
                    'libur'             => $this->input->post('libur', true)
                );
                $inputHistory = $this->db->insert('tbl_kontrak', $data2);

                $data = array(
                    'status_karyawan'       => $this->input->post('status_karyawan', true),
                    'status_email_kontrak' => ''
                );
                $this->db->where('no_scan', $_noscan);
                $updateMakar = $this->db->update('tbl_makar', $data);

                // Script log ADD kontrak employee 
            
             $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
             $log = array(
                 'username'      => $this->input->post('username', true),
                 'no_scan'       => $_noscan,
                 'tgl'           => DATE('Y-m-d H:i:s'),
                 'ket_tambah'    => gethostbyaddr($ipaddress)
             );
             $this->db->insert('log_pkwt_tambah', $log);


                if ($inputHistory && $updateMakar && $statusUpdate) {
                    $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>History kontrak berhasil ditambah, status master karyawan berhasil diubah dan kontrak berhasil diperpanjang. SILAHKAN PRINT! </b></center>');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Add PKWT Success.</b></center>');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Status Karyawan tidak boleh sama dengan history terakhir karyawan.</b></center>');
                redirect($this->agent->referrer());
            }
            
        }

        public function edit_history()
        {
            $data = array(
                'kontrak_awal'      => $this->input->post('kontrak_awal', true),
                'durasi'            => $this->input->post('durasi', true),
                'kontrak_akhir'     => $this->input->post('kontrak_akhir', true),
                'gaji'              => $this->input->post('gaji', true),
                'keterangan'        => $this->input->post('status_karyawan', true),
                'libur'             => $this->input->post('libur', true)
            );
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('tbl_kontrak', $data);
            
            // Script log edit kontrak employee 
                    
            $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
            $log = array(
                'username'      => $username,
                'no_scan'       => $this->input->post('no_scan', true),
                'tgl'           => DATE('Y-m-d H:i:s'),
                'ket_ubah'      => gethostbyaddr($ipaddress)
            );
            $this->db->insert('log_pkwt_ubah', $log);

            redirect($this->agent->referrer());
        }

        public function printPKWT($no_scan)
        {
            $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

            $data['kontrak'] = $this->db->query("SELECT b.id,
                                                        b.no_scan,
                                                        a.nama,
                                                        a.tempat_lahir,
                                                        DATE_FORMAT( a.tgl_lahir, '%d %M %Y' ) AS tgl_lahir,
                                                        a.alamat_domisili,
                                                        a.jenis_kelamin,
                                                        a.no_ktp,
                                                        a.status_kel,
                                                        a.agama,
                                                        a.pendidikan,
                                                        a.dept,
                                                        a.jabatan,
                                                        DATE_FORMAT( b.kontrak_awal, '%d %M %Y' ) AS kontrak_awal,
                                                        DATE_FORMAT( b.kontrak_akhir, '%d %M %Y' ) AS kontrak_akhir,
                                                        b.durasi,
                                                        DATE_FORMAT( ( b.kontrak_awal - INTERVAL '1' DAY) , '%d %M %Y' ) AS ttd_kontrak_awal,
                                                        b.gaji
                                                    FROM
                                                        tbl_makar a
                                                        LEFT JOIN ( SELECT * FROM tbl_kontrak b ) b ON b.no_scan = a.no_scan 
                                                    WHERE
                                                        b.no_scan = '$no_scan' 
                                                    ORDER BY
                                                        b.kontrak_akhir DESC LIMIT 1")->row();
            $this->load->view('PKWT/printPKWT', $data);
        }

        public function hapus_history($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('tbl_kontrak');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Berhasil menhapus history kontrak karyawan.</b></center>');
            
            
            // Script log ADD kontrak employee 
          $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
           $log = array(
               'username'      => $this->input->post('username', true),
               'no_scan'       => $this->input->post('no_scan', true),
               'tgl'           => DATE('Y-m-d H:i:s'),
               'ket_hapus'    => gethostbyaddr($ipaddress)
           );
           $this->db->insert('log_pkwt_hapus', $log);
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Berhasil menhapus history kontrak karyawan.</b></center>');
            
            redirect($this->agent->referrer());
        }

        public function hapus_kontrak($no_scan)
        {
            $this->db->where('no_scan', $no_scan);
            $this->db->delete('tbl_kontrak');
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Berhasil menhapus history kontrak karyawan.</b></center>');
            
            // Script log ADD kontrak employee 

           $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
           $log = array(
               'username'      => $this->input->post('username', true),
               'no_scan'       => $no_scan,
               'tgl'           => DATE('Y-m-d H:i:s'),
               'ket_hapus'    => gethostbyaddr($ipaddress)
           );
           $this->db->insert('log_history_pkwt', $log);

          $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Delete PKWT Success.</b></center>');
          
            redirect($this->agent->referrer());
        }

    // END ADD PKWT

    // START KARYAWAN KONTRAK BARU
        public function add_karyawan_kontrak()
        {
            $data2 = array(
                'no_scan'           => $this->input->post('no_scan', true),
                'kontrak_awal'      => $this->input->post('kontrak_awal', true),
                'kontrak_akhir'     => $this->input->post('kontrak_akhir', true),
                'durasi'            => $this->input->post('durasi', true), 
                'keterangan'        => $this->input->post('status_karyawan', true),
                'gaji'              => $this->input->post('upah', true)
            );
            $inputHistory = $this->db->insert('tbl_kontrak', $data2);
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Add PKWT Success.</b></center>');
            
             // Script log ADD kontrak employee 
             $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
             $log = array(
                 'username'      => $this->input->post('username', true),
                 'no_scan'       => $this->input->post('no_scan', true),
                 'tgl'           => DATE('Y-m-d H:i:s'),
                 'ket_tambah'    => gethostbyaddr($ipaddress)
             );
             $this->db->insert('log_history_pkwt', $log);
                redirect($this->agent->referrer());
        
        }

    // END KARYAWAN KONTRAK BARU
}