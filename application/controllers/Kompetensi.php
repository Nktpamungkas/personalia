<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'Kompetensi';
        $this->load->view('template/header', $data);
        $this->load->view('kompetensi/index');
        $this->load->view('template/footer');
    }

    public function tambahdata()
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();

        $data['title'] = 'Kompetensi';
        $this->load->view('template/header', $data);
        $this->load->view('kompetensi/tambahdata');
        $this->load->view('template/footer');
    }

    public function proses_tambahdata()
    {
        $no_scan               = $this->input->post('no_scan', true);

        $data = array(
            'no_scan'   => $no_scan
        );
        $insert_jobdesc = $this->db->insert('kompetensi', $data);

        // KOMPETENSI TEKNIS 
        $this->db->trans_start();
        $kompetensi_teknis   = $this->input->post('kompetensi_teknis[]', true);
        $value_kompetensi_teknis = array();
        foreach ($kompetensi_teknis as $key_kompetensi_teknis) {
            array_push($value_kompetensi_teknis, array(
                'no_scan'               => $no_scan,
                'kompetensi_teknis'     => $key_kompetensi_teknis
            ));
        }
        $this->db->insert_batch('kompetensi_teknis', $value_kompetensi_teknis);
        $this->db->trans_complete();
        
        // KOMPETENSI NON TEKNIS 
        $this->db->trans_start();
        $kompetensi_nonteknis   = $this->input->post('kompetensi_nonteknis[]', true);
        $value_kompetensi_nonteknis = array();
        foreach ($kompetensi_nonteknis as $key_kompetensi_nonteknis) {
            array_push($value_kompetensi_nonteknis, array(
                'no_scan'                  => $no_scan,
                'kompetensi_nonteknis'     => $key_kompetensi_nonteknis
            ));
        }
        $this->db->insert_batch('kompetensi_nonteknis', $value_kompetensi_nonteknis);
        $this->db->trans_complete();
        
        $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Berhasil menambahkan data.</b></center>');
        redirect('kompetensi');
    }

    public function editdata($no_scan)
    {
        $data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
        $data['no_scan'] = $no_scan;

        $data['kompetensi'] = $this->db->query("SELECT * FROM kompetensi WHERE no_scan = '$no_scan'")->row();

        $data['title'] = 'Kompetensi';
        $this->load->view('template/header', $data);
        $this->load->view('kompetensi/editdata');
        $this->load->view('template/footer');
    }

    public function proses_editdata()
    {   
        if ($this->input->post('duplicate') == 1) {
            $no_scan               = $this->input->post('no_scan', true);
            $data = array(
                'no_scan'   => $no_scan
            );
            $insert_jobdesc = $this->db->insert('kompetensi', $data);
            
            // KOMPETENSI TEKNIS 
            $this->db->trans_start();
            $kompetensi_teknis_edit   = $this->input->post('kompetensi_teknis_edit[]', true);
            $value_kompetensi_teknis_edit = array();
            foreach ($kompetensi_teknis_edit as $key_kompetensi_teknis_edit) {
                array_push($value_kompetensi_teknis_edit, array(
                    'no_scan'               => $no_scan,
                    'kompetensi_teknis'     => $key_kompetensi_teknis_edit
                ));
            }
            $this->db->insert_batch('kompetensi_teknis', $value_kompetensi_teknis_edit);
            $this->db->trans_complete();
            
            // KOMPETENSI NON TEKNIS 
            $this->db->trans_start();
            $kompetensi_nonteknis_edit   = $this->input->post('kompetensi_nonteknis_edit[]', true);
            $value_kompetensi_nonteknis_edit = array();
            foreach ($kompetensi_nonteknis_edit as $key_kompetensi_nonteknis_edit) {
                array_push($value_kompetensi_nonteknis_edit, array(
                    'no_scan'                  => $no_scan,
                    'kompetensi_nonteknis'     => $key_kompetensi_nonteknis_edit
                ));
            }
            $this->db->insert_batch('kompetensi_nonteknis', $value_kompetensi_nonteknis_edit);
            $this->db->trans_complete();
            
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert" style="font-size: 14px"><b>Berhasil duplicate data.</b></center>');
            redirect($this->agent->referrer());
        } else {
            $no_scan    = $this->input->post('no_scan', true);
            
            $id         = $this->input->post('id', true);
            $this->db->query("UPDATE kompetensi SET no_scan = '$no_scan' WHERE id = '$id'");
    
            // KOMPETENSI TEKNIS
            $this->db->trans_start();
            $id                         = $this->input->post('id_kt[]', true);
            $no_scan                    = $this->input->post('no_scan', true);
            $kompetensi_teknis_edit     = $this->input->post('kompetensi_teknis_edit[]', true);
            $value_kompetensi_teknis_edit  = array();
            $index_kompetensi_teknis_edit  = 0;
            foreach ($kompetensi_teknis_edit as $key_kompetensi_teknis_edit) {
                array_push($value_kompetensi_teknis_edit, array(
                    'id'                 => $id[$index_kompetensi_teknis_edit],
                    'no_scan'            => $no_scan,
                    'kompetensi_teknis'  => $key_kompetensi_teknis_edit
                ));
                $index_kompetensi_teknis_edit++;
            }
            $this->db->update_batch('kompetensi_teknis', $value_kompetensi_teknis_edit, 'id');
            $this->db->trans_complete();
            
            // KOMPETENSI NON TEKNIS
            $this->db->trans_start();
            $id                             = $this->input->post('id_knt[]', true);
            $no_scan                        = $this->input->post('no_scan', true);
            $kompetensi_nonteknis_edit      = $this->input->post('kompetensi_nonteknis_edit[]', true);
            $value_kompetensi_nonteknis_edit = array();
            $index_kompetensi_nonteknis_edit  = 0;
            foreach ($kompetensi_nonteknis_edit as $key_kompetensi_nonteknis_edit) {
                array_push($value_kompetensi_nonteknis_edit, array(
                    'id'                 => $id[$index_kompetensi_nonteknis_edit],
                    'no_scan'            => $no_scan,
                    'kompetensi_nonteknis'  => $key_kompetensi_nonteknis_edit
                ));
                $index_kompetensi_nonteknis_edit++;
            }
            $this->db->update_batch('kompetensi_nonteknis', $value_kompetensi_nonteknis_edit, 'id');
            $this->db->trans_complete();
           
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert" style="font-size: 14px"><b>Berhasil disimpan.</b></center>');
            redirect($this->agent->referrer());
        }
    }

    public function hapus_kt($id){
        $this->db->where('id', $id);
        $this->db->delete('kompetensi_teknis');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>KOMPETENSI TEKNIS TERHAPUS.</b></center>');
        redirect($this->agent->referrer());
    }

    public function hapus_knt($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kompetensi_nonteknis');
        $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert" style="font-size: 14px"><b>KOMPETENSI NON TEKNIS TERHAPUS.</b></center>');
        redirect($this->agent->referrer());
    }
    
}