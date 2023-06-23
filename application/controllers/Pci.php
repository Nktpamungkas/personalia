<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pci extends CI_Controller
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

        $data['title'] = 'Time Attendance | Izin Cuti';
        $this->load->view('template/header', $data);
        $this->load->view('pci/index');
        $this->load->view('template/footer');
    }

    public function index_all()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 
        $data['title'] = 'Time Attendance | Izin Cuti';

        $bulan['Belum_ver'] = '';
        $this->load->view('template/header', $data);
        $this->load->view('pci/indexAll', $bulan);
        $this->load->view('template/footer');
    }

    public function show_verifikasi()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 
        $data['title'] = 'Time Attendance | Izin Cuti';

        $bulan['Belum_ver'] = 'Verifikasi';

        $this->load->view('template/header', $data);
        $this->load->view('pci/indexAll', $bulan);
        $this->load->view('template/footer');
    }

    public function data_pci($dept)
    {
        $data = $this->db->query("SELECT a.id,
                                        DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
                                        a.nip,
                                        b.nama,
                                        DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                        a.lama_izin,
                                        DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                        a.alasan,
                                        a.status
                                    FROM
                                        permohonan_izin_cuti a
                                        LEFT JOIN (SELECT * FROM tbl_makar) b ON a.nip = b.no_scan
                                    WHERE
                                        a.dept = '$dept' 
                                    ORDER BY
                                        a.id DESC")->result_array();
        echo json_encode($data);
    }   

    public function export_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('pci/exportToExcel', $data);
    }

    public function export_excel_cuti($tgl1  = "", $tgl2  = "", $noscan = "", $dept  = "")
    {   
        if ($noscan && $tgl1 && $tgl2) {
            $data['noscan'] = $noscan;
            $data['tgl1']   = $tgl1;
            $data['tgl2']   = $tgl2;
            $data['dept']   = $dept;
            $this->load->view('pci/exportToExcelCuti', $data);
        } else{
            $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px">Silahkan isi <b>nama karyawan, tanggal, dan sampai dengan tanggal.</b></center>');
            redirect($this->agent->referrer());
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('permohonan_izin_cuti');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>DATA TERHAPUS.</b></center>');
        redirect($this->agent->referrer());
    }

    public function print_izin_cuti($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data = array (
            'status'  => 'Printed'
        );
        $this->db->where('id', $id);
        $this->db->update('permohonan_izin_cuti', $data);

        $data['title'] = 'Time Attendance | Print Izin Cuti';
        $data['dpci'] = $this->db->query("SELECT a.id,
                                                a.kode_cuti,
                                                a.tgl_surat_pemohon,
                                                a.nip,
                                                b.nama,
                                                b.dept,
                                                a.ket,
                                                d.cuti,
                                                b.jabatan,
                                                c.nama AS pengganti_kerja,
                                                DATE_FORMAT(a.tgl_mulai, '%d %M %Y') as tgl_mulai,
                                                a.lama_izin,
                                                a.days_or_month,
                                                DATE_FORMAT(a.tgl_selesai, '%d %M %Y') as tgl_selesai,
                                                a.alasan,
                                                DATE_FORMAT(a.tgl_diset_mengetehui, '%d %M %Y') as tgl_diset_mengetehui,
                                                a.pemohon_nama,
                                                a.pemohon_jabatan,
                                                a.disetujui_nama_1,
                                                a.disetujui_jabatan_1,
                                                a.disetujui_nama_2,
                                                a.disetujui_jabatan_2,
                                                a.mengetahui_nama,
                                                a.mengetahui_jabatan,
                                                DATE_FORMAT(a.tgl_surat_pemohon, '%d %M %Y') as tgl_surat_pemohon
                                            FROM 
                                                permohonan_izin_cuti a
                                                LEFT JOIN (SELECT * FROM tbl_makar) b ON a.nip = b.no_scan
                                                LEFT JOIN (SELECT * FROM tbl_makar) c ON a.pengganti_kerja = c.no_scan
                                                LEFT JOIN cuti d ON d.kode_cuti = a.ket
                                         WHERE 
                                                a.id = '$id'")->row();
        $this->load->view('pci/print', $data);
    }

    public function search_noscan($no_scan,$thn)
    {
        $dataSearch = $this->db->query("SELECT *,
                                                MONTHNAME( a.tgl_tetap ) AS awal,
                                                MONTH( a.tgl_tetap ) AS awal_number,
                                                MONTHNAME( ( a.tgl_tetap + INTERVAL '12' MONTH ) ) AS akhir,
                                                MONTH( ( a.tgl_tetap + INTERVAL '12' MONTH ) ) AS akhir_number,
                                                a.tgl_generate_cuti AS periode_awal,
                                                ( a.tgl_generate_cuti + INTERVAL '12' MONTH - INTERVAL '1' DAY) AS periode_akhir,
                                                YEAR(a.tgl_tetap) AS tahun_tetap,
                                                year(a.tgl_generate_cuti) as thn_generate,
                                                a.gaji,
                                                b.kode_cuti AS generate
                                            FROM tbl_makar a
                                            LEFT JOIN permohonan_izin_cuti b ON b.nip = a.no_scan AND SUBSTR(b.ket, 4) = '$thn'
                                            WHERE a.no_scan = '$no_scan'")->result();
        echo json_encode($dataSearch);
    }
    
    public function search_cuti($ket)
    {
        $searchCuti = $this->db->query("SELECT * FROM cuti WHERE kode_cuti = '$ket' ")->result();
        echo json_encode($searchCuti);
    }

    // START NEW IZIN CUTI
        public function add_Request()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 

            $data['title'] = 'Time Attendance | Izin Cuti';
            $this->load->view('template/header', $data);
            $this->load->view('pci/add');
            $this->load->view('template/footer');
        }

        public function add()
        {
            $data = array (
                'kode_cuti'             => "FIC-".date('Ym'),
                'nip'                   => $this->input->post('no_scan', true),
                'dept'                  => $this->input->post('dept', true),
                'pengganti_kerja'       => $this->input->post('pengganti_kerja', true),
                'lama_izin'             => $this->input->post('lama_izin', true),
                'days_or_month'         => $this->input->post('days_or_month', true),
                'tgl_mulai'             => $this->input->post('tgl_mulai', true),
                'tgl_selesai'           => $this->input->post('tgl_selesai', true),
                'ket'                   => $this->input->post('ket', true),
                'dll'                   => $this->input->post('dll', true),
                'alasan'                => $this->input->post('alasan', true),
                'pemohon_nama'          => $this->input->post('pemohon_nama', true),
                'pemohon_jabatan'       => $this->input->post('pemohon_jabatan', true),
                'disetujui_nama_1'      => $this->input->post('disetujui_nama_1', true),
                'disetujui_jabatan_1'   => $this->input->post('disetujui_jabatan_1', true),
                'disetujui_nama_2'      => $this->input->post('disetujui_nama_2', true),
                'disetujui_jabatan_2'   => $this->input->post('disetujui_jabatan_2', true),
                'mengetahui_nama'       => $this->input->post('mengetahui_nama', true),
                'mengetahui_jabatan'    => $this->input->post('mengetahui_jabatan', true),
                'tgl_surat_pemohon'     => $this->input->post('tgl_surat_pemohon', true),
                'tgl_diset_mengetehui'  => $this->input->post('tgl_diset_mengetehui', true)
            );
            $save = $this->db->insert('permohonan_izin_cuti', $data);

            if ($save) {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Success.</b></center>');
                redirect('pci');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Please Try Again.</b></center>');
                redirect('pci/add_Request');
            }
        }
    // END NEW IZIN CUTI

    // START EDIT IZIN CUTI
        public function edit_Request($id)
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 

            $data['title'] = 'Time Attendance | Edit Izin Cuti';
            // $data['dpci'] = $this->db->query("SELECT * FROM permohonan_izin_cuti WHERE id = '$id'")->row();
            $this->db->where('id', $id);
            $data['dpci'] = $this->db->get('permohonan_izin_cuti')->row();
            $this->load->view('template/header', $data);
            $this->load->view('pci/edit');
            $this->load->view('template/footer');
        }

        public function edit($dept)
        {
            $checked = $this->input->post('verifikasi', true);
            if (isset($checked) == 1) {
                $data = array (
                    'nip'                   => $this->input->post('no_scan', true),
                    'pengganti_kerja'       => $this->input->post('pengganti_kerja', true),
                    'lama_izin'             => $this->input->post('lama_izin', true),
                    'days_or_month'         => $this->input->post('days_or_month', true),
                    'tgl_mulai'             => $this->input->post('tgl_mulai', true),
                    'tgl_selesai'           => $this->input->post('tgl_selesai', true),
                    'ket'                   => $this->input->post('ket', true),
                    'dll'                   => $this->input->post('dll', true),
                    'alasan'                => $this->input->post('alasan', true),
                    'pemohon_nama'          => $this->input->post('pemohon_nama', true),
                    'pemohon_jabatan'       => $this->input->post('pemohon_jabatan', true),
                    'disetujui_nama_1'      => $this->input->post('disetujui_nama_1', true),
                    'disetujui_jabatan_1'   => $this->input->post('disetujui_jabatan_1', true),
                    'disetujui_nama_2'      => $this->input->post('disetujui_nama_2', true),
                    'disetujui_jabatan_2'   => $this->input->post('disetujui_jabatan_2', true),
                    'mengetahui_nama'       => $this->input->post('mengetahui_nama', true),
                    'mengetahui_jabatan'    => $this->input->post('mengetahui_jabatan', true),
                    'tgl_surat_pemohon'     => $this->input->post('tgl_surat_pemohon', true),
                    'tgl_diset_mengetehui'  => $this->input->post('tgl_diset_mengetehui', true),
                    'status'                => 'Verifikasi'
                );
                if ($this->input->post('ket', true) == "A01") {
                    $no_scan    = $this->input->post('no_scan', true);
                    $sisacuti   = $this->db->query("SELECT sisa_cuti FROM tbl_makar WHERE no_scan = '$no_scan'")->row();
                    $data_cuti = array(
                        'sisa_cuti'     => $sisacuti->sisa_cuti - $this->input->post('lama_izin', true)
                    );
                    $this->db->where('no_scan', $no_scan);
                    $this->db->update('tbl_makar', $data_cuti);
                }
            } else {
                $data = array (
                    'nip'                   => $this->input->post('no_scan', true),
                    'pengganti_kerja'       => $this->input->post('pengganti_kerja', true),
                    'lama_izin'             => $this->input->post('lama_izin', true),
                    'days_or_month'         => $this->input->post('days_or_month', true),
                    'tgl_mulai'             => $this->input->post('tgl_mulai', true),
                    'tgl_selesai'           => $this->input->post('tgl_selesai', true),
                    'ket'                   => $this->input->post('ket', true),
                    'dll'                   => $this->input->post('dll', true),
                    'alasan'                => $this->input->post('alasan', true),
                    'pemohon_nama'          => $this->input->post('pemohon_nama', true),
                    'pemohon_jabatan'       => $this->input->post('pemohon_jabatan', true),
                    'disetujui_nama_1'      => $this->input->post('disetujui_nama_1', true),
                    'disetujui_jabatan_1'   => $this->input->post('disetujui_jabatan_1', true),
                    'disetujui_nama_2'      => $this->input->post('disetujui_nama_2', true),
                    'disetujui_jabatan_2'   => $this->input->post('disetujui_jabatan_2', true),
                    'mengetahui_nama'       => $this->input->post('mengetahui_nama', true),
                    'mengetahui_jabatan'    => $this->input->post('mengetahui_jabatan', true),
                    'tgl_surat_pemohon'     => $this->input->post('tgl_surat_pemohon', true),
                    'tgl_diset_mengetehui'  => $this->input->post('tgl_diset_mengetehui', true)
                );
            }
            
            $this->db->where('id', $this->input->post('id', true));
            $this->db->update('permohonan_izin_cuti', $data);

            if ($dept == "HRD") {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Update and Verification Success.</b></center>');
                redirect('pci/index_all');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Update Success.</b></center>');
                redirect('pci');
            }
        }
    // END EDIT IZIN CUTI

    // START LAPORAN ABSEN
        public function laporan_absen()
        {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array();

            $data['noscan'] = $this->input->post('no_scan', true);
            $data['tgl1']   = $this->input->post('date1', true);
            $data['tgl2']   = $this->input->post('date2', true);

            $data['title'] = 'Time Attendance | Laporan Absen';
            $this->load->view('template/header', $data);
            $this->load->view('pci/laporan_absen', $data);
            $this->load->view('template/footer');
        }
    // END LAPORAN ABSEN

    public function generate_cuti()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['title'] = 'Time Attendance | Generate Cuti';
        $this->load->view('template/header', $data);
        $this->load->view('pci/generate_cuti/index');
        $this->load->view('template/footer');
    }
    
    public function histori_cuti($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $data['no_scan'] = $no_scan;

        $data['title'] = 'Time Attendance | Generate Cuti';
        $this->load->view('template/header', $data);
        $this->load->view('pci/generate_cuti/histori');
        $this->load->view('template/footer');
    }

    public function import_excell_cuti()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('pci/generate_cuti');
        } else {
            $data_upload    = $this->upload->data();

            $excelreader    = new PHPExcel_Reader_Excel2007();
            $loadexcel      = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet          = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
                if($numrow > 1){
                    array_push($data, array(
                        'no_scan'   => $row['C'],
                        'sisa_cuti' => $row['AH']
                    ));
                }
                $numrow++;

                // input histori izin cuti 
                $data_histori = array (
                    'kode_cuti'             => "HIC-".date('Ym'), //HISTORI IMPORT CUTI
                    'nip'                   => $row['C'], //Row C adalah letak no scan
                    'dept'                  => $row['B'],
                    'saldo_cuti'            => $row['AH'],
                    'days_or_month'         => "Hari",
                    'ket'                   => "th.".date('Y'),
                    'alasan'                => "Import data cuti oleh personalia"
                );
                $this->db->insert('permohonan_izin_cuti', $data_histori);
            }
            $this->db->update_batch('tbl_makar', $data, 'no_scan');

            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));
 
            //upload success
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('pci/generate_cuti');
        }
    }

    public function generate_proses()
    {
        // $data['periode'] = $this->input->post('periode', true);
        // $this->load->view('pci/generate_cuti/export_cuti', $data);
        $periode = $this->input->post('periode', true);
        if ($periode == "gaji_atas") {
            $sheet = $this->db->query("SELECT *, MONTHNAME( tgl_tetap ) AS awal, 
                                                MONTHNAME( ( tgl_tetap + INTERVAL '12' MONTH ) ) AS akhir 
                                        FROM tbl_makar 
                                        WHERE status_karyawan = 'Tetap' 
                                        AND gaji = 'atas' 
                                        AND status_aktif = 1 
                                        ORDER BY ( tgl_tetap + INTERVAL '12' MONTH ) DESC")->result_array(); 
            foreach ($sheet AS $value){
                $data = array (
                    'no_scan'   => $value['no_scan'],
                    'sisa_cuti' => 12
                );
                $this->db->where('no_scan', $value['no_scan']);
                $this->db->update('tbl_makar', $data);

                // input histori izin cuti 
                $data_histori = array (
                    'kode_cuti'             => "GEN-".date('Ym'), //HISTORI IMPORT CUTI
                    'nip'                   => $value['no_scan'], 
                    'dept'                  => $value['dept'],
                    'saldo_cuti'            => 12,
                    'days_or_month'         => "Hari",
                    'ket'                   => "th.".date('Y'),
                    'alasan'                => "Saldo cuti telah digenerate kembali"
               );
                $this->db->insert('permohonan_izin_cuti', $data_histori);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES GENERATE BERHASIL!</b> Data berhasil digenerate!</div>');
            redirect('pci/generate_cuti');
        } else {
            $sql_sheet  = "SELECT *,
                                DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
                                YEAR(CURDATE()) as thn_awal,
                                DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
                                YEAR(CURDATE()+interval '1'year) as thn_akhir,
                                CONCAT(DATE_FORMAT( tgl_tetap, '%d %M'),' ', YEAR(CURDATE())
                                ,' - ' ,DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ),' ',
                                YEAR(CURDATE()+interval '1'year)) as pgenerate
                            FROM
                                    tbl_makar 
                                WHERE
                                    status_karyawan = 'Tetap' 
                                    AND gaji IS NULL 
                                    AND status_aktif = 1 
                                    AND DATE_FORMAT( tgl_tetap, '%d %M' ) = '$periode' 
                                ORDER BY
                                    ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY ) DESC";
            $sheet_gen  = $this->db->query($sql_sheet." LIMIT 1 ")->row(); 
            $sheet      = $this->db->query($sql_sheet)->result_array(); 
            foreach ($sheet AS $value){
                if ($value['sisa_cuti'] <= 0) {
                    $saldosisacuti = 12 + $value['sisa_cuti'];
                } else {
                    $saldosisacuti = 12;
                }
                
                $data = array (
                    'no_scan'   => $value['no_scan'],
                    'sisa_cuti' => $saldosisacuti
               );
                $this->db->where('no_scan', $value['no_scan']);
                $this->db->update('tbl_makar', $data);

                if($value['sisa_cuti']){
                    $alasan = "Sisa cuti ".$value['sisa_cuti']." telah dibayarkan.";
                } else {
                    $alasan = "Tidak ada sisa cuti yang dibayarkan. Sisa cuti habis.";
                }

                // input histori izin cuti 
                $data_histori = array (
                    'kode_cuti'             => "GEN-".date('Ym'), //HISTORI IMPORT CUTI
                    'nip'                   => $value['no_scan'], 
                    'dept'                  => $value['dept'],
                    'saldo_cuti'            => $saldosisacuti,
                    'days_or_month'         => "Hari",
                    'ket'                   => "th.".date('Y'),
                    'alasan'                => $alasan
                );
                $this->db->insert('permohonan_izin_cuti', $data_histori);

            }
            // input GENERATED cuti 
            $data_generated= array(
                'awal'              => $sheet_gen->pgenerate,
                'tgl_generate'      => DATE('Y-m-d'),
                'status_generated'  =>'GENERATED'
            );
            $this->db->insert('status_generate_cuti', $data_generated);

            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES GENERATE BERHASIL!</b> Data berhasil digenerate!</div>');
            redirect('pci/generate_cuti');
        }
        
    }

    public function generate_personal_proses()
    {
        $no_scan = $this->input->post('no_scan', true);
        $sisacuti = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$no_scan'")->row();
        if($sisacuti->sisa_cuti){
            $alasan = "Sisa cuti ".$sisacuti->sisa_cuti." telah dibayarkan.";
        } else {
            $alasan = "Tidak ada sisa cuti yang dibayarkan. Sisa cuti habis.";
        }
        // input histori izin cuti 
        $data_histori = array (
            'kode_cuti'             => "GEN-".date('Ym'), //HISTORI IMPORT CUTI
            'nip'                   => $no_scan, 
            'dept'                  => $sisacuti->dept,
            'saldo_cuti'            => 0,
            'days_or_month'         => "Hari",
            'ket'                   => "th.".date('Y'),
            'alasan'                => $alasan
        );
        $this->db->insert('permohonan_izin_cuti', $data_histori);

        $data = array (
            'no_scan'   => $no_scan,
            'sisa_cuti' => 0
        );
        $this->db->where('no_scan', $no_scan);
        $this->db->update('tbl_makar', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES GENERATE KARYAWAN BERHASIL!</b> Data berhasil digenerate!</div>');
        redirect('pci/generate_cuti');
    }

    public function annual_leave()
    {
        $al        = $this->input->post('annual_leave', true);
        $dept      = $this->input->post('dept', true);
        $history   = $this->input->post('history', true);
        $this->db->where('status_karyawan', 'Tetap');
        $this->db->where('status_aktif', 1);
        $this->db->where_in('dept', $dept);
        $kartap = $this->db->get('tbl_makar')->result_array();

        foreach ($kartap as $kt) :
            $data_cuti = array(
                'sisa_cuti'     => $kt['sisa_cuti'] - $al
            );
            $this->db->where('no_scan', $kt['no_scan']);
            $this->db->where_in('dept', $dept);
            $this->db->update('tbl_makar', $data_cuti);

            if($history){ //jika keterangan histori di input manual
                $data = array (
                    'kode_cuti'             => "HCT-".date('Ym'),
                    'nip'                   => $kt['no_scan'],
                    'dept'                  => $kt['dept'],
                    'lama_izin'             => $al,
                    'days_or_month'         => "Hari",
                    'ket'                   => "Cuti",
                    'alasan'                => $history
                );
                $this->db->insert('permohonan_izin_cuti', $data);
            }else{
                $data = array (
                    'kode_cuti'             => "HCT-".date('Ym'),
                    'nip'                   => $kt['no_scan'],
                    'dept'                  => $kt['dept'],
                    'lama_izin'             => $al,
                    'days_or_month'         => "Hari",
                    'ket'                   => "Cuti",
                    'alasan'                => "Potongan Cuti Tahun ".date('Y')
                );
                $this->db->insert('permohonan_izin_cuti', $data);
            }
            
            //-------------------------------------------------------------------------------
        endforeach;
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Berhasil memotong sisa cuti karyawan</b></center>');
        redirect('pci/generate_cuti');
    }

    public function annual_leave_personal()
    {
        $al         = $this->input->post('annual_leave', true);
        $no_scan    = $this->input->post('no_scan', true);
        $history   = $this->input->post('history', true);

        $this->db->where_in('no_scan', $no_scan);
        $kartap = $this->db->get('tbl_makar')->result_array();

        foreach ($kartap as $kt) :
            $data_cuti = array(
                'sisa_cuti'     => $kt['sisa_cuti'] - $al
            );
            $this->db->where('no_scan', $kt['no_scan']);
            $this->db->update('tbl_makar', $data_cuti);
            
            if ($history) {
                // input histori izin cuti dipotong tahunan berdasarkan departemen yang dipilih
                $data = array (
                    'kode_cuti'             => "HCT-".date('Ym'),
                    'nip'                   => $kt['no_scan'],
                    'dept'                  => $kt['dept'],
                    'lama_izin'             => $al,
                    'days_or_month'          => "Hari",
                    'ket'                   => "Cuti",
                    'alasan'                => $history
                );
                $this->db->insert('permohonan_izin_cuti', $data);
            }else{
                // input histori izin cuti dipotong tahunan berdasarkan departemen yang dipilih
                $data = array (
                    'kode_cuti'             => "HCT-".date('Ym'),
                    'nip'                   => $kt['no_scan'],
                    'dept'                  => $kt['dept'],
                    'lama_izin'             => $al,
                    'days_or_month'          => "Hari",
                    'ket'                   => "Cuti",
                    'alasan'                => "Potongan Cuti Karyawan ".date('Y')
                );
                $this->db->insert('permohonan_izin_cuti', $data);
            }
            
            //-------------------------------------------------------------------------------
        endforeach;
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Berhasil memotong sisa cuti karyawan</b></center>');
        redirect('pci/generate_cuti');
    }
        public function annual_leave_personal2()
    {
        $al2 = $this->input->post('annual_leave2', true);
        $history2   = $this->input->post('history2', true);
        $no_scan    = $this->input->post('no_scan', true);
        
        $this->db->where_in('no_scan', $no_scan);        
        $sql_sheet = $this->db->get('tbl_makar')->result_array();
        foreach ($sql_sheet AS $value){
        if ($value['sisa_cuti'] <= 0) {
        $saldosisacuti = $al2 + $value['sisa_cuti'];
        } else {
        $saldosisacuti = 0;
        }

        $data = array (
        'no_scan'   => $value['no_scan'],
        'sisa_cuti' => $saldosisacuti
        );
        $this->db->where('no_scan', $value['no_scan']);
        $this->db->update('tbl_makar', $data);

         // input histori izin cuti 
        $data_histori = array (
        'kode_cuti'             => "GEN-".date('Ym'), //HISTORI IMPORT CUTI
        'nip'                   => $value['no_scan'], 
        'dept'                  => $value['dept'],
        'saldo_cuti'            => $saldosisacuti,
        'days_or_month'         => "Hari",
        'ket'                   => "th.".date('Y'),
        'alasan'                => $history2
        );
        $this->db->insert('permohonan_izin_cuti', $data_histori);        

        }
    $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Pembayaran sisa cuti karyawan Pemutihan berhasil</b></center>');
    redirect('pci/generate_cuti');
    
    }
}