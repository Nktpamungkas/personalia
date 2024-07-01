<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    function insertrecord_employee($record){
        
        if(count($record) > 0){
            
            // Check user
            $this->db->select('*');
            $this->db->where('no_ktp', $record[0]);
            $qemployee = $this->db->get('tbl_makar_temp');
            $response = $qemployee->result_array();
            
            // Insert record$record
            if(count($response) == 0){
                $newuser = array(
                    // "no_ktp"            => trim($record[0]),
                    // "nik_krishand"      => trim($record[1]),
                    // "no_scan"           => trim($record[2]),
                    // "npwp"              => trim($record[3]),
                    // "nama"              => trim($record[4]),
                    // "tempat_lahir"      => trim($record[5]),
                    // "tgl_lahir"         => trim($record[6]),
                    // "alamat_ktp"        => trim($record[7]),
                    // "alamat_domisili"   => trim($record[8]),
                    // "alamat_npwp"       => trim($record[9]),
                    // "kecamatan_domisili"=> trim($record[10]),
                    // "kabupaten_domisili"=> trim($record[11]),
                    // "kode_pos"          => trim($record[12]),
                    // "status_rumah"      => trim($record[13]),
                    // "agama"             => trim($record[14]),
                    // "jenis_kelamin"     => trim($record[15]),
                    // "status_kel"        => trim($record[16]),
                    // "nama_sekolah"      => trim($record[17]),
                    // "pendidikan"        => trim($record[18]),
                    // "jurusan"           => trim($record[19]),
                    // "ipk"               => trim($record[20]),
                    // "gol_darah"         => trim($record[21]),
                    // "email_pribadi"     => trim($record[22]),
                    // "no_hp"             => trim($record[23]),
                    // "pengalaman_kerja"  => trim($record[24]),
                    // "keterampilan_khusus"=> trim($record[25]),
                    // "tgl_masuk"         => trim($record[26]),
                    // "status_karyawan"   => trim($record[27]),
                    // "tgl_tetap"         => trim($record[28]),
                    // "golongan"          => trim($record[29]),
                    // "jabatan"           => trim($record[30]),
                    // "dept"              => trim($record[31]),
                    // "bagian"            => trim($record[32]),
                    // "atasan1"           => trim($record[33]),
                    // "atasan2"           => trim($record[34]),
                    // "no_bpjs_tk"        => trim($record[35]),
                    // "no_bpjs_kes"       => trim($record[36]),
                    // "status_aktif"      => trim($record[37]),
                    // "tgl_resign"        => trim($record[38]),
                    // "kode_jabatan"      => trim($record[39]),
                    // "nama_jabatan"      => trim($record[40]),
                    // "pot_cuti"          => trim($record[41]),
                    // "sisa_cuti"         => trim($record[42]),
                    // "tgl_surat_resign"  => trim($record[43]),
                    // "gaji"              => trim($record[44]),
                    // "ukuran_baju_polo"  => trim($record[45]),
                    // "ukuran_baju_shirt" => trim($record[46]),
                    // "disabled_ub"       => trim($record[47]),
                    // "kartu_keluarga"    => trim($record[48]),
                    // "ttd"               => trim($record[49]),
                    // "masa_berlaku_ktp"  => trim($record[50]),
                    // "RT"                => trim($record[51]),
                    // "RW"                => trim($record[52]),
                    // "status_Seragam"    => trim($record[53]),
                    // "tgl_seragam"       => trim($record[54]),
                    // "Status_verifikasi" => trim($record[55])

                    // filed yang di isi sesuai dengan form add employee
                    // "no_ktp"             => trim($record[0]),
                    // "no_scan"            => trim($record[1]),
                    // "npwp"               => trim($record[2]),
                    // "nama"               => trim($record[3]),
                    // "tempat_lahir"       => trim($record[4]),
                    // "tgl_lahir"          => trim($record[5]),
                    // "alamat_ktp"         => trim($record[6]),
                    // "alamat_domisili"    => trim($record[7]),
                    // "alamat_npwp"        => trim($record[8]),
                    // "kecamatan_domisili" => trim($record[9]),
                    // "kabupaten_domisili" => trim($record[10]),
                    // "kode_pos"           => trim($record[11]),
                    // "status_rumah"       => trim($record[12]),
                    // "agama"              => trim($record[13]),
                    // "jenis_kelamin"      => trim($record[14]),
                    // "status_kel"         => trim($record[15]),
                    // "nama_sekolah"       => trim($record[16]),
                    // "pendidikan"         => trim($record[17]),
                    // "jurusan"            => trim($record[18]),
                    // "ipk"                => trim($record[19]),
                    // "gol_darah"          => trim($record[20]),
                    // "email_pribadi"      => trim($record[21]),
                    // "no_hp"              => trim($record[22]),
                    // "pengalaman_kerja"   => trim($record[23]),
                    // "tgl_masuk"          => trim($record[24]),
                    // "status_karyawan"    => trim($record[25]),                    
                    // "golongan"           => trim($record[26]),
                    // "jabatan"            => trim($record[27]),
                    // "dept"               => trim($record[28]),
                    // "bagian"             => trim($record[29]),
                    // "atasan1"            => trim($record[30]),
                    // "atasan2"            => trim($record[31]),
                    // "status_aktif"       => trim($record[32]),
                    // "no_bpjs_tk"         => trim($record[33]),
                    // "no_bpjs_kes"        => trim($record[34]),
                    // "kartu_keluarga"     => trim($record[35]),
                    // "masa_berlaku_ktp"   => trim($record[36]),
                    // "RT"                 => trim($record[37]),
                    // "RW"                 => trim($record[38]),
                    // "status_Seragam"     => trim($record[39]),
                    // "Status_verifikasi"  => trim($record[40])

                    "no_ktp"             => trim($record[0]),
                    "no_scan"            => trim($record[1]),
                    "npwp"               => trim($record[2]),
                    "nama"               => trim($record[3]),
                    "tempat_lahir"       => trim($record[4]),
                    "tgl_lahir"          => trim($record[5]),
                    "alamat_ktp"         => trim($record[6]),
                    "alamat_domisili"    => trim($record[7]),
                    "alamat_npwp"        => trim($record[8]),
                    "kecamatan_domisili" => trim($record[9]),
                    "kabupaten_domisili" => trim($record[10]),
                    "kode_pos"           => trim($record[11]),
                    "status_rumah"       => trim($record[12]),
                    "agama"              => trim($record[13]),
                    "jenis_kelamin"      => trim($record[14]),
                    "status_kel"         => trim($record[15]),
                    "nama_sekolah"       => trim($record[16]),
                    "pendidikan"         => trim($record[17]),
                    "jurusan"            => trim($record[18]),
                    "ipk"                => trim($record[19]),
                    "gol_darah"          => trim($record[20]),
                    "email_pribadi"      => trim($record[21]),
                    "no_hp"              => trim($record[22]),
                    "tgl_masuk"          => trim($record[23]),
                    "status_karyawan"    => trim($record[24]),                    
                    "golongan"           => trim($record[25]),
                    "jabatan"            => trim($record[26]),
                    "no_bpjs_tk"         => trim($record[27]),
                    "no_bpjs_kes"        => trim($record[28]),
                    "kartu_keluarga"     => trim($record[29]),
                    "masa_berlaku_ktp"   => trim($record[30]),
                    "RT"                 => trim($record[31]),
                    "RW"                 => trim($record[32]),
                    "Status_verifikasi"  => trim($record[33])
                );

                $this->db->insert('tbl_makar_temp', $newuser);
            }
        }
    }

    public function insertrecord_keluarga($record){
        if(count($record) > 0){
            
            // Check user
            $this->db->select('*');
            $this->db->where('no_scan');
            $qkeluarga = $this->db->get('data_keluarga_temp');
            $response = $qkeluarga->result_array();
            
            // Insert record$record
            if(count($response) == 0){
                $newkeluarga = array(
                    "no_scan"            => trim($record[0]),
                    "nama"               => trim($record[1]),
                    "hubungan"           => trim($record[2]),
                    "tempat"             => trim($record[3]),
                    "tgl_lahir"          => trim($record[4]),
                    "pekerjaan"          => trim($record[5])
                );

                $this->db->insert('data_keluarga_temp', $newkeluarga);
            }
         }

       
    }

    public function insertrecord_pengalaman($record){
        if(count($record) > 0){
            
                // Check user
                $this->db->select('*');
                $this->db->where('no_scan');
                $qpengalaman = $this->db->get('data_pengalaman_kerja_temp');
                $response = $qpengalaman->result_array();
                
                // Insert record$record
                if(count($response) == 0){
                    $newpengalaman = array(
                        "no_scan"             => trim($record[0]),
                        "nama_perusahaan"     => trim($record[1]),
                        "bagian"              => trim($record[2]),
                        "jabatan"             => trim($record[3]),
                        "masa_kerja"          => trim($record[4])
                    );
    
                    $this->db->insert('data_pengalaman_kerja_temp', $newpengalaman);
                }
                
            }
        }


}
