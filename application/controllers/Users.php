<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct(){
    parent::__construct();

    // load base_url
    $this->load->helper('url');

    // Load Model
    $this->load->model('Main_model');
  }
 
  public function index(){
    $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); 
       
        $data['title'] = 'Employee Information';
        $this->load->view('template/header', $data);

        $this->load->view('data_karyawan/users_view'); 
        $this->load->view('template/footer');
  }
  
   public function import_employee(){
      $this->index();
    // Check form submit or not 
    if($this->input->post('upload') != NULL ){ 
      $data = array(); 
      if(!empty($_FILES['file_data_employee']['name'])){ 
         // Set preference 
         $config['upload_path'] = 'assets/files/data_karyawan/'; 
         $config['allowed_types'] = 'csv'; 
         $config['max_size'] = '5000'; // max_size in kb 
         $config['file_name'] = $_FILES['file_data_employee']['name'];

         // Load upload library 
         $this->load->library('upload',$config); 
 
         // File upload
         if($this->upload->do_upload('file_data_employee')){ 
            // Get data about the file
            $uploadData = $this->upload->data(); 
            $filename = $uploadData['file_name'];

            // Reading file
            $file = fopen("assets/files/data_karyawan/".$filename,"r");
            $i = 0;
            $numberOfFields = 34; // Total number of fields
            $importData_arr = array();
 
            while (($filedata = fgetcsv($file, 5000, ",")) !== FALSE) {
               $num = count($filedata );
               
               if($numberOfFields == $num){
                  for ($c=0; $c < $num; $c++) {
                     $importData_arr[$i][] = $filedata [$c];
                  }
               }
               $i++;
            }
            fclose($file);

            $skip = 0;

            // insert import data
            foreach($importData_arr as $userdata){

               // Skip first row
               if($skip != 0){
                  $this->Main_model->insertRecord_employee($userdata);
               }
               $skip ++;
            }
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Import Data Karyawan Baru Berhasil.</b></center>');
            }else{ 
               $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Import Data Karyawan Baru Tidak Berhasil.</b></center>'); 
            } 
      }else{ 
         $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Import Data Karyawan Baru Tidak Berhasil.</b></center>'); 
      } 
      redirect('users/index');
  }
}

public function import_keluarga(){
   $this->index();
   // Check form submit or not 
   if($this->input->post('upload') != NULL ){ 
     $data = array(); 
     if(!empty($_FILES['file_data_keluarga']['name'])){ 
        // Set preference 
        $config['upload_path'] = 'assets/files/data_keluarga/'; 
        $config['allowed_types'] = 'csv'; 
        $config['max_size'] = '1000'; // max_size in kb 
        $config['file_name'] = $_FILES['file_data_keluarga']['name'];

        // Load upload library 
        $this->load->library('upload',$config); 

        // File upload
        if($this->upload->do_upload('file_data_keluarga')){ 
           // Get data about the file
           $uploadData = $this->upload->data(); 
           $filename = $uploadData['file_name'];

           // Reading file
           $file = fopen("assets/files/data_keluarga/".$filename,"r");
           $i = 0;
           $numberOfFields = 6; // Total number of fields
           $importData_arr = array();

           while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($filedata );
              
              if($numberOfFields == $num){
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
              }
              $i++;
           }
           fclose($file);

           $skip = 0;

           // insert import data
           foreach($importData_arr as $userdata){

              // Skip first row
              if($skip != 0){
                 $this->Main_model->insertRecord_keluarga($userdata);
              }
              $skip ++;
           }
           $data['response'] = 'successfully uploaded '.$filename; 
        }else{ 
           $data['response'] = 'failed'; 
        } 
     }else{ 
        $data['response'] = 'failed'; 
     } 
     redirect('users/index');
 }
}

public function import_pengalaman(){
   $this->index();
   // Check form submit or not 
   if($this->input->post('upload') != NULL ){ 
     $data = array(); 
     if(!empty($_FILES['file_data_pengalaman']['name'])){ 
        // Set preference 
        $config['upload_path'] = 'assets/files/data_pengalaman/'; 
        $config['allowed_types'] = 'csv'; 
        $config['max_size'] = '1000'; // max_size in kb 
        $config['file_name'] = $_FILES['file_data_pengalaman']['name'];

        // Load upload library 
        $this->load->library('upload',$config); 

        // File upload
        if($this->upload->do_upload('file_data_pengalaman')){ 
           // Get data about the file
           $uploadData = $this->upload->data(); 
           $filename = $uploadData['file_name'];

           // Reading file
           $file = fopen("assets/files/data_pengalaman/".$filename,"r");
           $i = 0;
           $numberOfFields = 5; // Total number of fields
           $importData_arr = array();

           while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($filedata );
              
              if($numberOfFields == $num){
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
              }
              $i++;
           }
           fclose($file);

           $skip = 0;

           // insert import data
           foreach($importData_arr as $userdata){

              // Skip first row
              if($skip != 0){
                 $this->Main_model->insertRecord_pengalaman($userdata);
              }
              $skip ++;
           }
           $data['response'] = 'successfully uploaded '.$filename; 
        }else{ 
           $data['response'] = 'failed'; 
        } 
     }else{ 
        $data['response'] = 'failed'; 
     } 
     redirect('users/index');
 }
}
public function index_verified(){
   $data['user'] = $this->db->get_where('user', array('name' =>
       $this->session->userdata('name')))->row_array(); 
      
       $data['title'] = 'Employee Information';
       $this->load->view('template/header', $data);

       $this->load->view('data_karyawan/index_verified'); 
       $this->load->view('template/footer');
 }

}