<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index_permohonan()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Recruitment | Permohonan';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/index_permohonan');
        $this->load->view('template/footer');
    }


    public function index_seleksi()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Recruitment | Seleksi';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/index_seleksi');
        $this->load->view('template/footer');
    }

    public function add_permohonan()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Recruitment | Permohonan';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/add_permohonan');
        $this->load->view('template/footer');
    }

    public function add_seleksi()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Recruitment | Seleksi';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/add_seleksi');
        $this->load->view('template/footer');
    }

    public function edit_permohonan($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $data['pemohon'] = $this->db->query("SELECT * FROM recruitment_permohonan WHERE id = '$id'")->row();

        $data['title'] = 'Recruitment | Permohonan';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/edit_permohonan');
        $this->load->view('template/footer');
    }

    public function edit_seleksi($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $data['seleksi'] = $this->db->query("SELECT * FROM recruitment_seleksi WHERE id = '$id'")->row();

        $data['title'] = 'Recruitment | Seleksi';
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/edit_seleksi');
        $this->load->view('template/footer');
    }

    public function proses_permohonan()
    {
        $jumlah_hari    = $this->input->post('lt_target', true);
        $tanggal        = $this->input->post('tgl_fptk', true);
        for($i = $jumlah_hari; $i>=1; $i--){
            $tanggal  = date("Y-m-d", strtotime("+1 days", strtotime($tanggal)));
             $hari       = date('l', strtotime($tanggal));
            if ($hari == 'Saturday' OR $hari == 'Sunday') {
                $i = $i+1;
                continue;
            }
        }
        $hari    =   $tanggal;
            
        $data = array(
            'no'            => $this->input->post('no_fptk', true),
            'tgl_fptk'      => $this->input->post('tgl_fptk', true),
            'alasan'        => $this->input->post('alasan', true),
            'dept'          => $this->input->post('dept', true),
            'level'         => $this->input->post('level', true),
            'jabatan'       => $this->input->post('jabatan', true),
            'total_need'    => $this->input->post('total_need', true),
            'total_fulfil'  => $this->input->post('total_fulfil', true),
            'status'        => $this->input->post('status', true),
            'kode_gol'      => $this->input->post('kode_gol', true),
            'lt_target'     => $this->input->post('lt_target', true),
            'tgl_target'    => $hari,
            'tgl_aktual'    => $this->input->post('tgl_aktual', true),
            'tgl_join'      => $this->input->post('tgl_join', true),
            'nama_pelamar'  => $this->input->post('nama_pelamar', true),
            'ket'           => $this->input->post('ket', true),
            'lulus_ojt'     => $this->input->post('lulus_ojt', true)
        );
        $this->db->insert('recruitment_permohonan', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Permohonan berhasil dibuat</b></center>');
        redirect('recruitment/index_permohonan');
    }

    public function proses_edit_permohonan()
    {
        $data = array(
            'no'            => $this->input->post('no_fptk', true),
            'tgl_fptk'      => $this->input->post('tgl_fptk', true),
            'alasan'        => $this->input->post('alasan', true),
            'dept'          => $this->input->post('dept', true),
            'level'         => $this->input->post('level', true),
            'jabatan'       => $this->input->post('jabatan', true),
            'total_need'    => $this->input->post('total_need', true),
            'total_fulfil'  => $this->input->post('total_fulfil', true),
            'status'        => $this->input->post('status', true),
            'kode_gol'      => $this->input->post('kode_gol', true),
            'lt_target'     => $this->input->post('lt_target', true),
            'tgl_target'    => $this->input->post('tgl_target', true),
            'tgl_aktual'    => $this->input->post('tgl_aktual', true),
            'tgl_join'      => $this->input->post('tgl_join', true),
            'nama_pelamar'  => $this->input->post('nama_pelamar', true),
            'ket'           => $this->input->post('ket', true),
            'lulus_ojt'     => $this->input->post('lulus_ojt', true)
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('recruitment_permohonan', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Permohonan berhasil diubah</b></center>');
        redirect('recruitment/index_permohonan');
    }

    public function duplicate_permohonan($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();
        $pemohon = $this->db->query("SELECT * FROM recruitment_permohonan WHERE id = '$id'")->row();

        $data = array(
            'no'            => $pemohon->no,
            'tgl_fptk'      => $pemohon->tgl_fptk,
            'alasan'        => $pemohon->alasan,
            'dept'          => $pemohon->dept,
            'level'         => $pemohon->level,
            'jabatan'       => $pemohon->jabatan,
            'total_need'    => $pemohon->total_need,
            'total_fulfil'  => $pemohon->total_fulfil,
            'status'        => $pemohon->status,
            'kode_gol'      => $pemohon->kode_gol,
            'lt_target'     => $pemohon->lt_target,
            'tgl_target'    => $pemohon->tgl_target,
            'tgl_aktual'    => $pemohon->tgl_aktual,
            'tgl_join'      => $pemohon->tgl_join,
            'nama_pelamar'  => $pemohon->nama_pelamar,
            'ket'           => $pemohon->ket,
            'lulus_ojt'     => $pemohon->lulus_ojt
        );
        $this->db->insert('recruitment_permohonan', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Permohonan berhasil diduplicate</b></center>');
        redirect('recruitment/index_permohonan');
    }

    public function proses_hapus_permohonan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('recruitment_permohonan');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Permohonan berhasil dihapus</b></center>');
        redirect('recruitment/index_permohonan');
    }

    public function proses_seleksi()
    {
        $data = array(
            'no'                => $this->input->post('no_fptk', true),
            'tgl_panggil'       => $this->input->post('tgl_panggil', true),
            'nama'              => $this->input->post('nama', true),
            'tgl_lahir'         => $this->input->post('tgl_lahir', true),
            'pendidikan'        => $this->input->post('pendidikan', true),
            'jurusan'           => $this->input->post('jurusan', true),
            'dept'              => $this->input->post('dept', true),
            'sumber'            => $this->input->post('sumber', true),
            'no_hp'             => $this->input->post('no_hp', true),
            'level'             => $this->input->post('level', true),
            'jabatan_dilamar'   => $this->input->post('jabatan_dilamar', true),
            'int_hrd'           => $this->input->post('int_hrd', true),
            'hint_hrd'          => $this->input->post('hint_hrd', true),
            'psikotes'          => $this->input->post('psikotes', true),
            'hpsikotes'         => $this->input->post('hpsikotes', true),
            'tes_lap'           => $this->input->post('tes_lap', true),
            'htes_lap'          => $this->input->post('htes_lap', true),
            'int_user'          => $this->input->post('int_user', true),
            'hint_user'         => $this->input->post('hint_user', true),
            'offering'          => $this->input->post('offering', true),
            'hoffering'         => $this->input->post('hoffering', true),
            'tgl_join'          => $this->input->post('tgl_join', true),
            'tgl_evaluasi'      => $this->input->post('tgl_evaluasi', true),
            'ket'               => $this->input->post('ket', true)
        );
        $this->db->insert('recruitment_seleksi', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Seleksi berhasil dibuat</b></center>');
        redirect('recruitment/index_seleksi');
    }

    public function proses_edit_seleksi()
    {
        $data = array(
            'no'                => $this->input->post('no_fptk', true),
            'tgl_panggil'       => $this->input->post('tgl_panggil', true),
            'nama'              => $this->input->post('nama', true),
            'tgl_lahir'         => $this->input->post('tgl_lahir', true),
            'pendidikan'        => $this->input->post('pendidikan', true),
            'jurusan'           => $this->input->post('jurusan', true),
            'dept'              => $this->input->post('dept', true),
            'sumber'            => $this->input->post('sumber', true),
            'no_hp'             => $this->input->post('no_hp', true),
            'level'             => $this->input->post('level', true),
            'jabatan_dilamar'   => $this->input->post('jabatan_dilamar', true),
            'int_hrd'           => $this->input->post('int_hrd', true),
            'hint_hrd'          => $this->input->post('hint_hrd', true),
            'psikotes'          => $this->input->post('psikotes', true),
            'hpsikotes'         => $this->input->post('hpsikotes', true),
            'tes_lap'           => $this->input->post('tes_lap', true),
            'htes_lap'          => $this->input->post('htes_lap', true),
            'int_user'          => $this->input->post('int_user', true),
            'hint_user'         => $this->input->post('hint_user', true),
            'offering'          => $this->input->post('offering', true),
            'hoffering'         => $this->input->post('hoffering', true),
            'tgl_join'          => $this->input->post('tgl_join', true),
            'tgl_evaluasi'      => $this->input->post('tgl_evaluasi', true),
            'ket'               => $this->input->post('ket', true)
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('recruitment_seleksi', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Seleksi berhasil diubah</b></center>');
        redirect('recruitment/index_seleksi');
    }
    public function proses_hapus_seleksi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('recruitment_seleksi');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Seleksi berhasil dihapus</b></center>');
        redirect('recruitment/index_seleksi');
    }

    public function export_permohonan()
    {
        $this->load->view('recruitment/export_permohonan');
    }

    public function export_seleksi()
    {
        $this->load->view('recruitment/export_seleksi');
    }

    /////////////////////////////////////////////// EXIT INTERVIEW BEGIN ///////////////////////////////////////////////
    public function List_form_exit_interview()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
        $data['title'] = 'Recruitment | Exit Interview';

        $this->load->view('template/header', $data);
        $this->load->view('recruitment/list_exit_interview');
        $this->load->view('template/footer');
    }

    public function Exit_interview()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'Recruitment | Exit Interview';
        $data['question'] = $this->db->query("SELECT Q.id_question, Q.question, Q.title_quest, J.jenis_jawaban, J.id_jenis_jawaban, 
                                                    K.kategori_question, V.a_choice, V.b_choice, V.c_choice, V.d_choice
                                                FROM hrd.tbl_question Q
                                                LEFT JOIN hrd.vpot_table_form V ON V.id_question = Q.id_question
                                                left join hrd.tbl_jenis_jawab J on J.id_jenis_jawaban = Q.id_jenis_jawaban
                                                left join hrd.tbl_kategori_question K on K.id_kategori_question = Q.id_kategori_question
                                                where Q.title_quest = 'FORM EXIT INTERVIEW'")->result();
        $this->load->view('template/header', $data);
        $this->load->view('recruitment/index_exit_interview');
        $this->load->view('template/footer');
    }

    public function get_data_karyawan()
    {
        $nik = $this->input->post('nik');
        $result = $this->db->query('SELECT nama, jenis_kelamin, status_kel, tgl_masuk, jabatan, dept, tgl_resign
        FROM hrd.tbl_makar where no_scan = ' . $nik)->row_array();

        echo json_encode($result);
    }

    public function inserting_tgl_surat_resign()
    {
        $tgl_surat_resign = $this->input->post('tgl_surat_resign');
        $nik = $this->input->post('nik');
        $data = array(
            "tgl_surat_resign" => $tgl_surat_resign
        );
        $this->db->where('no_scan', $nik);
        $this->db->update('tbl_makar', $data);

        $result = array(
            "status" => "success",
            "message" => "200"
        );
        echo json_encode($result);
    }

    public function insert_multiple_choice()
    {
        $nik = $this->input->post('nik');
        $id_question = $this->input->post('id_question');
        $id_choice = $this->input->post('id_choice');
        $choice = $this->input->post('choice');
        $title_quest = $this->input->post('title_quest');

        $data = array(
            "no_scan" => $nik,
            "id_question" => $id_question,
            "id_answer" => $id_choice,
            "answer" => $choice,
            "title_quest" => $title_quest,
            "tgl_pengisian" => date('Y-m-d')
        );

        $this->db->insert('vpot_table_answer', $data);
        $result = array(
            "status" => "success",
            "message" => "200"
        );

        echo json_encode($result);
    }

    public function insert_answer_essay()
    {
        $nik = $this->input->post('nik');
        $jenis_jawaban = $this->input->post('jenis_jawaban');
        $id_question = $this->input->post('id_question');
        $value = $this->input->post('text_area');
        $title_quest = $this->input->post('title_quest');

        if ($jenis_jawaban == 1) {
            $data = array(
                "no_scan" => $nik,
                "id_question" => $id_question,
                "id_answer" => $jenis_jawaban,
                "answer" => $value,
                "title_quest" => $title_quest,
                "tgl_pengisian" => date('Y-m-d')
            );
            $this->db->insert('vpot_table_answer', $data);
        } else {
            $data = array(
                "explanation" => $value
            );
            $this->db->where('no_scan', $nik);
            $this->db->where('title_quest', $title_quest);
            $this->db->where('id_question', $id_question);
            $this->db->update('vpot_table_answer', $data);
        }
        $result = array(
            "status" => "success",
            "message" => "200"
        );

        echo json_encode($result);
    }

    public function Print_form_exit1($no_scan)
    {
        $this->load->library('mypdf');

        $data['question'] = $this->db->query("SELECT Q.id_question,no_scan, Q.question, Q.title_quest, J.jenis_jawaban, J.id_jenis_jawaban, K.kategori_question, 
        V.a_choice, V.b_choice, V.c_choice, V.d_choice ,R.id_answer, R.answer, R.explanation
        FROM hrd.tbl_question Q
        LEFT JOIN hrd.vpot_table_form V ON V.id_question = Q.id_question
        left join hrd.tbl_jenis_jawab J on J.id_jenis_jawaban = Q.id_jenis_jawaban
        left join hrd.tbl_kategori_question K on K.id_kategori_question = Q.id_kategori_question
        left join vpot_table_answer R on Q.id_question = R.id_question and R.no_scan = '$no_scan'
        where Q.title_quest = 'FORM EXIT INTERVIEW' 
       order by id_question
        ")->result();

        $data['person'] = $this->db->query('SELECT no_scan, nama, jenis_kelamin, status_kel, tgl_masuk, jabatan, dept, tgl_resign, tgl_surat_resign
                                                FROM hrd.tbl_makar where no_scan = ' . $no_scan)->row_array();


        $this->mypdf->generate('recruitment/Laporan/pdf_exit_form', $data);
    }
    public function Print_form_exit2($no_scan)
    {
        $data['question'] = $this->db->query("SELECT Q.id_question,no_scan, Q.question, Q.title_quest, J.jenis_jawaban, 
                                                    J.id_jenis_jawaban, K.kategori_question, 
                                                    V.a_choice, V.b_choice, V.c_choice, V.d_choice ,R.id_answer, R.answer, R.explanation
                                                    FROM hrd.tbl_question Q
                                                    LEFT JOIN hrd.vpot_table_form V ON V.id_question = Q.id_question
                                                    left join hrd.tbl_jenis_jawab J on J.id_jenis_jawaban = Q.id_jenis_jawaban
                                                    left join hrd.tbl_kategori_question K on K.id_kategori_question = Q.id_kategori_question
                                                    left join vpot_table_answer R on Q.id_question = R.id_question and R.no_scan = '$no_scan'
                                                    where Q.title_quest = 'FORM EXIT INTERVIEW' 
                                                order by id_question
                                                    ")->result();

        $data['person'] = $this->db->query('SELECT no_scan, nama, jenis_kelamin, status_kel, tgl_masuk, jabatan, dept, tgl_resign, tgl_surat_resign
                                                FROM hrd.tbl_makar where no_scan = ' . $no_scan)->row_array();


        $this->load->view('recruitment/Laporan/print_exit_form_html', $data);
    }

    public function delete_from_exit($no_scan)
    {
        $this->db->where('no_scan', $no_scan);
        $this->db->delete('vpot_table_answer');

        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Form exit berhasil dihapus</b></center>');
        redirect('recruitment/List_form_exit_interview');
    }

    public function export_to_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('recruitment/exportexcel', $data);
    }
}