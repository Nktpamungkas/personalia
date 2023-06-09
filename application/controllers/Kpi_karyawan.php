<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpi_karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // HALAMAN KONTROL BSC
    public function setting_bsc()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/setting/index');
        $this->load->view('template/footer');
    }

    public function pilihan($eks = 0)
    {
        $kode = $this->input->post('kode', true);
        if ($kode == "kode1bsc" || $eks == 1) {
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
    
            $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
            $this->load->view('template/header', $data);
            $this->load->view('kpi/setting/bsc');
            $this->load->view('template/footer');
        }elseif($kode == "kode2sto"  || $eks == 2){
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
    
            $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
            $this->load->view('template/header', $data);
            $this->load->view('kpi/setting/sto');
            $this->load->view('template/footer');
        }elseif($kode == "kode3kpc"  || $eks == 3){
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
    
            $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
            $this->load->view('template/header', $data);
            $this->load->view('kpi/setting/kpc');
            $this->load->view('template/footer');
        }elseif($kode == "kode4stn"  || $eks == 4){
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
    
            $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
            $this->load->view('template/header', $data);
            $this->load->view('kpi/setting/stn');
            $this->load->view('template/footer');
        }elseif($kode == "kode5kpd"  || $eks == 5){
            $data['user'] = $this->db->get_where('user', array('name' =>
            $this->session->userdata('name')))->row_array(); 
    
            $data['title'] = 'KPI Karyawan | Setting | Setting BSC';
            $this->load->view('template/header', $data);
            $this->load->view('kpi/setting/kpd');
            $this->load->view('template/footer');
        }
    }

    // KODE1BSC
    public function tambah_kode1bsc()
    {
        $data = array (
            'kode1'             => $this->input->post('kode1', true),
            'perspective_bsc'   => $this->input->post('perspective_bsc', true),
            'ket_bsc'           => $this->input->post('ket_bsc', true)
        );
        $this->db->insert('kode1bsc', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/pilihan/1');

    }

    public function hapus_kode1bsc($id)
    {
        //Mencari kode1bsc yang lama
        $kode1bsc_lama = $this->db->query("SELECT * FROM kode1bsc WHERE id = '$id'")->row();
        //setelah itu ganti kode1bsc yang terelasi dengan kode1bsc
        $datakode = array (
            'kode1bsc'  => ''
        );
        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode2sto', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode3kpc', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode5kpd', $datakode);

        $this->db->where('id', $id);
        $this->db->delete('kode1bsc');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/pilihan/1');
    }

    public function ubah_kode1bsc($id)
    {
        //Mencari kode1bsc yang lama
        $kode1bsc_lama = $this->db->query("SELECT * FROM kode1bsc WHERE id = '$id'")->row();
        //setelah itu ganti kode1bsc yang terelasi dengan kode1bsc
        $datakode = array (
            'kode1bsc'  => $this->input->post('kode1', true)
        );
        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode2sto', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode3kpc', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode1bsc', $kode1bsc_lama->kode1);
        $this->db->update('kode5kpd', $datakode);

        //setelah itu, ganti ditabel induk kode1bsc
        $data = array (
            'kode1'             => $this->input->post('kode1', true),
            'perspective_bsc'   => $this->input->post('perspective_bsc', true),
            'ket_bsc'           => $this->input->post('ket_bsc', true)
        );
    
        $this->db->where('id', $id);
        $this->db->update('kode1bsc', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/pilihan/1');
    }

    // KODE2STO
    public function tambah_kode2sto()
    {
        $data = array (
            'kode2'             => $this->input->post('kode2', true),
            'strategic_obj_sto' => $this->input->post('strategic_obj_sto', true),
            'ket_sto'           => $this->input->post('ket_sto', true),
            'kode1bsc'          => $this->input->post('kode1bsc', true)
        );
        $this->db->insert('kode2sto', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/pilihan/2');
    }

    public function hapus_kode2sto($id)
    {
        //Mencari kode2sto yang lama
        $kode2sto_lama = $this->db->query("SELECT * FROM kode2sto WHERE id = '$id'")->row();
        //setelah itu ganti kode2sto yang terelasi dengan kode2sto
        $datakode = array (
            'kode2sto'  => ''
        );
        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode3kpc', $datakode);

        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode5kpd', $datakode);

        $this->db->where('id', $id);
        $this->db->delete('kode2sto');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/pilihan/2');
    }

    public function ubah_kode2sto($id)
    {
        //Mencari kode2sto yang lama
        $kode2sto_lama = $this->db->query("SELECT * FROM kode2sto WHERE id = '$id'")->row();
        //setelah itu ganti kode2sto yang terelasi dengan kode2sto
        $datakode = array (
            'kode2sto'  => ''
        );
        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode3kpc', $datakode);

        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode2sto', $kode2sto_lama->kode2);
        $this->db->update('kode5kpd', $datakode);

        //setelah itu, ganti ditabel induk kode2sto
        $data = array (
            'kode2'             => $this->input->post('kode2', true),
            'strategic_obj_sto' => $this->input->post('strategic_obj_sto', true),
            'ket_sto'           => $this->input->post('ket_sto', true),
            'kode1bsc'          => $this->input->post('kode1bsc', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kode2sto', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/pilihan/2');
    }

    // KODE3KPC
    public function tambah_kode3kpc()
    {
        $data = array (
            'kode3'             => $this->input->post('kode3', true),
            'kpi_company_kpc'   => $this->input->post('kpi_company_kpc', true),
            'ket_kpc'           => $this->input->post('ket_kpc', true),
            'kode2sto'          => $this->input->post('kode2sto', true),
            'kode1bsc'          => $this->input->post('kode1bsc', true)
        );

        $this->db->insert('kode3kpc', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/pilihan/3');
    }

    public function hapus_kode3kpc($id)
    {
        //Mencari kode3kpc yang lama
        $kode3kpc_lama = $this->db->query("SELECT * FROM kode3kpc WHERE id = '$id'")->row();
        //setelah itu ganti kode3kpc yang terelasi dengan kode3kpc
        $datakode = array (
            'kode3kpc'  => ''
        );
        $this->db->where('kode3kpc', $kode3kpc_lama->kode3);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode3kpc', $kode3kpc_lama->kode3);
        $this->db->update('kode5kpd', $datakode);

        $this->db->where('id', $id);
        $this->db->delete('kode3kpc');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/pilihan/3');
    }

    public function ubah_kode3kpc($id)
    {
        //Mencari kode3kpc yang lama
        $kode3kpc_lama = $this->db->query("SELECT * FROM kode3kpc WHERE id = '$id'")->row();
        //setelah itu ganti kode3kpc yang terelasi dengan kode3kpc
        $datakode = array (
            'kode3kpc'  => ''
        );
        $this->db->where('kode3kpc', $kode3kpc_lama->kode3);
        $this->db->update('kode4stn', $datakode);

        $this->db->where('kode3kpc', $kode3kpc_lama->kode3);
        $this->db->update('kode5kpd', $datakode);

        //setelah itu, ganti ditabel induk kode3kpc
        $data = array (
            'kode3'             => $this->input->post('kode3', true),
            'kpi_company_kpc'   => $this->input->post('kpi_company_kpc', true),
            'ket_kpc'           => $this->input->post('ket_kpc', true),
            'kode2sto'          => $this->input->post('kode2sto', true),
            'kode1bsc'          => $this->input->post('kode1bsc', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kode3kpc', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/pilihan/3');
    }

    // KODE4STN
    public function tambah_kode4stn()
    {
        $data = array (
            'kode4'                     => $this->input->post('kode4', true),
            'strategic_initiative_stn'  => $this->input->post('strategic_initiative_stn', true),
            'uom'                       => $this->input->post('uom', true),
            'target'                    => $this->input->post('target', true),
            'owner'                     => $this->input->post('owner', true),
            'ket_stn'                   => $this->input->post('ket_stn', true),
            'kode3kpc'                  => $this->input->post('kode3kpc', true),
            'kode2sto'                  => $this->input->post('kode2sto', true),
            'kode1bsc'                  => $this->input->post('kode1bsc', true)
        );
        $this->db->insert('kode4stn', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/pilihan/4');
    }

    public function hapus_kode4stn($id)
    {
        // Mencari kode4stn yang lama
        $kode4stn_lama = $this->db->query("SELECT * FROM kode4stn WHERE id = '$id'")->row();
        //setelah itu ganti kode4stn yang terelasi dengan kode4stn
        $datakode = array (
            'kode4stn'  => ''
        );
        $this->db->where('kode4stn', $kode4stn_lama->kode4);
        $this->db->update('kode5kpd', $datakode);

        $this->db->where('id', $id);
        $this->db->delete('kode4stn');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/pilihan/4');
    }

    public function ubah_kode4stn($id)
    {
        // Mencari kode4stn yang lama
        $kode4stn_lama = $this->db->query("SELECT * FROM kode4stn WHERE id = '$id'")->row();
        //setelah itu ganti kode4stn yang terelasi dengan kode4stn
        $datakode = array (
            'kode4stn'  => ''
        );
        $this->db->where('kode4stn', $kode4stn_lama->kode4);
        $this->db->update('kode5kpd', $datakode);

        //setelah itu, ganti ditabel induk kode3kpc
        $data = array (
            'kode4'                     => $this->input->post('kode4', true),
            'strategic_initiative_stn'  => $this->input->post('strategic_initiative_stn', true),
            'uom'                       => $this->input->post('uom', true),
            'target'                    => $this->input->post('target', true),
            'owner'                     => $this->input->post('owner', true),
            'ket_stn'                   => $this->input->post('ket_stn', true),
            'kode3kpc'                  => $this->input->post('kode3kpc', true),
            'kode2sto'                  => $this->input->post('kode2sto', true),
            'kode1bsc'                  => $this->input->post('kode1bsc', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kode4stn', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/pilihan/4');
    }

    // KODE5KPD
    public function tambah_kode5kpd()
    {
        $data = array (
            'kode5'     => $this->input->post('kode5', true),
            'kpi_dept'  => $this->input->post('kpi_dept', true),
            'target'    => $this->input->post('target', true),
            'dept'      => $this->input->post('dept', true),
            'ket_kpd'   => $this->input->post('ket_kpd', true),
            'kode4stn'  => $this->input->post('kode4stn', true),
            'kode3kpc'  => $this->input->post('kode3kpc', true),
            'kode2sto'  => $this->input->post('kode2sto', true),
            'kode1bsc'  => $this->input->post('kode1bsc', true)
        );
        $this->db->insert('kode5kpd', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/pilihan/5');
    }

    public function hapus_kode5kpd($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kode5kpd');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/pilihan/5');
    }

    public function ubah_kode5kpd($id)
    {
        //setelah itu, ganti ditabel induk kode3kpc
        $data = array (
            'kode5'     => $this->input->post('kode5', true),
            'kpi_dept'  => $this->input->post('kpi_dept', true),
            'target'    => $this->input->post('target', true),
            'dept'      => $this->input->post('dept', true),
            'ket_kpd'   => $this->input->post('ket_kpd', true),
            'kode4stn'  => $this->input->post('kode4stn', true),
            'kode3kpc'  => $this->input->post('kode3kpc', true),
            'kode2sto'  => $this->input->post('kode2sto', true),
            'kode1bsc'  => $this->input->post('kode1bsc', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kode5kpd', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/pilihan/5');
    }

    public function export_kpd()
    {
        $this->load->view('kpi/setting/exportkpi');
    }

    // HALAMAN SETTING IPP
    public function setting_ipp()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['title'] = 'KPI Karyawan | Setting | Setting IPP';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/setting_ipp/index');
        $this->load->view('template/footer');
    }

    public function kpi_individu()
    {
        $data = $this->db->query("SELECT
                                        a.id,
                                        a.kode6,
                                        a.tgl,
                                        a.no_scan,
                                        b.nama,
                                        b.jabatan,
                                        b.dept,
                                        a.no_scan_atasan,
                                        a.kode5kpd,
                                        a.target1,
                                        a.ket1
                                    FROM
                                        `kpi_individu` a
                                        LEFT JOIN (SELECT * FROM tbl_makar b)b ON b.no_scan = a.no_scan ORDER BY a.id DESC")->result_array();
        echo json_encode($data);
    }

    public function edit_ipp($id)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $this->db->where('id', $id);
        $data['ipp'] = $this->db->get('kpi_individu')->row();
        $data['title'] = 'KPI Karyawan | Setting | Setting IPP';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/setting_ipp/edit');
        $this->load->view('template/footer');
    }

    public function search_targetkode5kpd($kode5kpd)
    {
        $dataSearch = $this->db->query("SELECT * FROM kode5kpd WHERE kode5 = '$kode5kpd'")->result();
        echo json_encode($dataSearch);
    }

    public function tambah_ipp()
    {
        $kode6 = $this->db->query('SELECT id FROM kpi_individu ORDER BY id DESC LIMIT 1')->row();
        
        $data = array (
            'kode6'             => 'IPP'.$kode6->id+1,
            'tgl'               => $this->input->post('tgl', true),
            'no_scan'           => $this->input->post('no_scan', true),
            'no_scan_atasan'    => $this->input->post('no_scan_atasan', true),
            'kode5kpd'          => $this->input->post('kode5kpd', true),
            'target1'           => $this->input->post('target1', true),
            'ket1'              => $this->input->post('jenis', true)
        );
        $this->db->insert('kpi_individu', $data);

        $data = array (
            'kode8'             => 'LPI',
            'kode7'             => 'IPP',
            'tgl'               => $this->input->post('tgl', true),
            'no_scan'           => $this->input->post('no_scan', true),
            'no_scan_atasan'    => $this->input->post('no_scan_atasan', true),
            'kode5kpd'          => $this->input->post('kode5kpd', true),
            'target1'           => $this->input->post('target1', true),
            'ket1'              => $this->input->post('jenis', true)
        );
        $this->db->insert('laporan_kpi', $data);

        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/setting_ipp');       
    }

    public function ubah_ipp($id)
    {
        $data = array (
            'kode6'             => $this->input->post('kode6', true),
            'tgl'               => $this->input->post('tgl', true),
            'no_scan'           => $this->input->post('no_scan', true),
            'no_scan_atasan'    => $this->input->post('no_scan_atasan', true),
            'kode5kpd'          => $this->input->post('kode5kpd', true),
            'target1'           => $this->input->post('target1', true),
            'ket1'              => $this->input->post('jenis', true).", ".$this->input->post('kriteria', true)
        );

        $this->db->where('id', $id);
        $this->db->update('kpi_individu', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/setting_ipp');       
    }

    public function hapus_ipp($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kpi_individu');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/setting_ipp');       
    }

    // HALAMAN LAPORAN KPI
    public function laporan_kpi()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['title'] = 'KPI Karyawan | Setting | Laporan KPI';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/laporan_kpi/index');
        $this->load->view('template/footer');
    }

    public function detail_kpi($no_scan, $tgl)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['tgl']        = $tgl;
        $data['no_scan']    = $no_scan;

        $data['title'] = 'KPI Karyawan | Setting | Laporan KPI';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/laporan_kpi/detail_kpi');
        $this->load->view('template/footer');
    }

    public function tambah_kpi($no_scan, $tgl)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['tgl']        = $tgl;
        $data['no_scan']    = $no_scan;

        $data['title'] = 'KPI Karyawan | Setting | Laporan KPI';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/laporan_kpi/tambah_kpi');
        $this->load->view('template/footer');
    }

    public function proses_kpi()
    {
        $this->db->trans_start();
            $tgl              = $this->input->post('tgl', true);
            $no_scan          = $this->input->post('no_scan', true);
            $no_scan_atasan   = $this->input->post('no_scan_atasan', true);
            $kode5kpd         = $this->input->post('kode5kpd[]', true);
            $target1          = $this->input->post('kpi_dept[]', true);
            $aktual           = $this->input->post('aktual[]', true);
            // $ket1             = $this->input->post('aktual[]', true);
        
            $value                  = array();
            $index                  = 0;
            foreach ($kode5kpd as $key) {
                array_push($value, array(
                    'kode8'            => 'LPI',
                    'kode7'            => 'IPP',
                    'tgl'              => $tgl,
                    'no_scan'          => $no_scan,
                    'no_scan_atasan'   => $no_scan_atasan,
                    'kode5kpd'         => $key,
                    'target1'          => $target1[$index],
                    'aktual'           => $aktual[$index],
                ));
                $index++;
            }
            $this->db->insert_batch('laporan_kpi', $value);
        $this->db->trans_complete();

        $this->db->trans_start();
            $tgl              = $this->input->post('tgl', true);
            $no_scan          = $this->input->post('no_scan', true);
            $no_scan_atasan   = $this->input->post('no_scan_atasan', true);
            $tambah_kode5kpd  = $this->input->post('tambah_kode5kpd[]', true);
            $tambah_target1   = $this->input->post('tambah_target[]', true);
            $tambah_ket1      = $this->input->post('tambah_aktual[]', true);
            $kode6 = $this->db->query('SELECT id FROM kpi_individu ORDER BY id DESC LIMIT 1')->row();

            if($tambah_kode5kpd){
                $value2                  = array();
                $index2                  = 0;
                foreach ($tambah_kode5kpd as $key2) {
                    array_push($value2, array(
                        'kode8'            => 'LPI',
                        'kode7'            => 'IPP',
                        'tgl'              => $tgl,
                        'no_scan'          => $no_scan,
                        'no_scan_atasan'   => $no_scan_atasan,
                        'kode5kpd'         => $key2,
                        'target1'          => $tambah_target1[$index2],
                        'aktual'           => $tambah_ket1[$index2],
                    ));
                    $index2++;
                }

                $value3                  = array();
                $index3                  = 0;
                foreach ($tambah_kode5kpd as $key2) {
                    array_push($value3, array(
                        'kode6'            => 'IPP'.$kode6->id+1,
                        'tgl'              => $tgl,
                        'no_scan'          => $no_scan,
                        'no_scan_atasan'   => $no_scan_atasan,
                        'kode5kpd'         => $key2,
                        'target1'          => $tambah_target1[$index3]
                    ));
                    $index3++;
                }
                $this->db->insert_batch('kpi_individu', $value3);
                $this->db->insert_batch('laporan_kpi', $value2);
                
            $this->db->trans_complete();
            }

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"  style="font-size: 14px"><b>Laporan KPI telah dibuat.</b></center>');
            redirect('kpi_karyawan/laporan_kpi'); 
    }

    public function search_kode5kpd($kode5kpd)
    {
        $dataKode5Kpd = $this->db->query("SELECT * FROM kode5kpd WHERE  kode5 = '$kode5kpd'")->result();
        echo json_encode($dataKode5Kpd);
    }

    // PRINT KPI KARYAWAN
    public function print_kpi($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['makar'] = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = $no_scan")->row_array();
        $data['no_scan'] = $this->db->query("SELECT * FROM kpi_individu WHERE no_scan = $no_scan")->row_array();
        $data['no_scan'] = $this->db->query("SELECT * FROM kpi_individu WHERE no_scan = $no_scan")->row();
       

        $data['title'] = 'KPI Karyawan';
        $this->load->view('kpi/setting_ipp/print', $data);
    }

    // HALAMAN FEEDBACK DEPT
    public function feedback()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 

        $data['title'] = 'KPI Karyawan | Setting | Feedback Dept';
        $this->load->view('template/header', $data);
        $this->load->view('kpi/feedback/index');
        $this->load->view('template/footer');
    }

    public function tambah_feedback()
    {
        $data = array (
            'nik'               => $this->input->post('no_scan', true),
            'nik2'              => $this->input->post('no_scan2', true),
            'feedback'          => $this->input->post('feedback', true),
            'lokasi_feedback'   => $this->input->post('feedback', true),
            'status'            => 'Terkirim'
        );
        $this->db->insert('feedback', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data berhasil ditambahkan.</b></center>');
        redirect('kpi_karyawan/feedback');
    }

    public function tanggapan($id)
    {
        $data = array (
            'tanggapan' => $this->input->post('tanggapan', true),
            'status'    => 'Dibaca'
        );

        $this->db->where('id', $id);
        $this->db->update('feedback', $data);
        $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Data telah berhasil diperbaharui.</b></center>');
        redirect('kpi_karyawan/feedback');   
    }

    public function hapus_feedback($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('feedback');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>Data telah berhasil dihapus.</b></center>');
        redirect('kpi_karyawan/feedback');     
    }

    public function print_kpi_individu($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 
        
         $this->db->where('no_scan', $no_scan);
         $data['no_scan'] = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = $no_scan")->row();

        $data['title'] = 'KPI Departemen | Print KPI Departemen';
        $data['makar'] = $this->db->query("SELECT a.no_scan,
                                                a.nama,
                                                a.dept,
                                                a.jabatan,
                                                b.kode5kpd,
                                                b.target1,
                                                b.ket1,
                                                c.kpi_dept                                                
                                            FROM 
                                                tbl_makar a
                                                LEFT JOIN (SELECT * FROM kpi_individu) b ON a.no_scan = b.no_scan
                                                LEFT JOIN (SELECT * FROM kode5kpd) c ON b.kode5kpd = c.kode5
                                         WHERE 
                                                a.no_scan = '$no_scan'")->result_array();
          $no=1;                                       
        $this->load->view('kpi/setting_ipp/print', $data);
    }
    public function ExportToExcell()
    {
        $this->load->view('kpi/setting_ipp/exportToExcelKPIDept');
    }

}