<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];

        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('home/index');
        $this->load->view('template/footer');
    }

    public function data_status_idcseragam_dept($dept)
                                { 
                                    $data = $this->db->query("SELECT no_scan,
                                    nama,
                                    dept,
                                    jabatan,
                                    DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                    TIMESTAMPDIFF( MONTH , tgl_masuk, NOW() ) AS masa_kerja,
                                    status_seragam,
                                    status_idcard,
                                    DATE_FORMAT((DATE_ADD(tgl_masuk, INTERVAL 6 month )), '%d-%m-%Y') as tgl_seragam                                   
                            FROM
                                    tbl_makar 
                              WHERE
                                    dept = '$dept'
                                    AND status_karyawan IN ('Kontrak2','Kontrak1')
                                    AND masa_kerja <12
                                    ORDER BY
                                    masa_kerja desc")->result_array();
                                    echo json_encode($data);
                                }
      
    public function data_status_idcseragam_all_dept()
    { 
        $data = $this->db->query("SELECT a.no_scan,
                                        a.nama,
                                        a.dept,
                                        a.jabatan,
                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                        TIMESTAMPDIFF( MONTH , tgl_masuk, NOW() ) AS masa_kerja,
                                        a.status_seragam,
                                        a.status_idcard,
                                        DATE_FORMAT((DATE_ADD(tgl_masuk, INTERVAL 6 month )), '%d-%m-%Y') as tgl_seragam,
                                        case 
                                            when d.status_email = 1 then 'Sent'
                                            else '-'
                                        end as status_email, 
                                        c.dept_email1,
                                        c.dept_email2,
                                        c.dept_email3,
                                        c.dept_email4,
                                        c.dept_email5
                                FROM
                                        tbl_makar a
                                        INNER JOIN ( SELECT * FROM dept_mail ) c ON c.code = a.dept 
                                        left JOIN ( SELECT * FROM status_email_idcard ) d ON d.no_scan = a.no_scan
                                    WHERE
                                        tgl_masuk BETWEEN tgl_masuk
                                        AND  DATE_ADD( NOW(), INTERVAL '6' MONTH ) 
                                        AND NOT status_karyawan ='Resigned'
                                        AND NOT status_idcard ='Sudah'
                                        AND NOT status_seragam ='Sudah'
                                        ORDER BY
                                        masa_kerja desc")->result_array();
                                        echo json_encode($data);
    }
    public function data_status_idcseragam_all_dept2()
    { 
        $data = $this->db->query("SELECT a.no_scan,
                                        a.nama,
                                        a.dept,
                                        a.jabatan,
                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                        TIMESTAMPDIFF( MONTH , tgl_masuk, NOW() ) AS masa_kerja,
                                        a.status_seragam,
                                        a.status_idcard,
                                        DATE_FORMAT((DATE_ADD(tgl_masuk, INTERVAL 6 month )), '%d-%m-%Y') as tgl_seragam,                                       
                                        c.dept_email1,
                                        c.dept_email2,
                                        c.dept_email3,
                                        c.dept_email4,
                                        c.dept_email5
                                FROM
                                        tbl_makar a
                                        INNER JOIN ( SELECT * FROM dept_mail ) c ON c.code = a.dept 
                                    WHERE
                                        tgl_masuk BETWEEN tgl_masuk
                                        AND  DATE_ADD( NOW(), INTERVAL '6' MONTH ) 
                                        AND NOT status_karyawan ='Resigned'
                                        AND NOT status_karyawan ='Tetap'
                                        AND status_idcard ='Sudah'
                                        AND not status_seragam ='Sudah'
                                        AND masa_kerja <12
                                        ORDER BY
                                        masa_kerja desc")->result_array();
                                        echo json_encode($data);
    }
                                   
    public function data_habis_kontrak()
    {
        $data = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.keterangan 
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE
                                            b.kontrak_akhir BETWEEN NOW()
                                            AND DATE_ADD( NOW(), INTERVAL '2' MONTH )
                                            AND b.`status` = ''
                                        ORDER BY
                                            b.kontrak_akhir")->result_array();
        echo json_encode($data);
    }
    
    public function data_karyawan_training()
    {
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        tgl_masuk,
                                        jabatan
                                    FROM
                                        tbl_makar 
                                    WHERE
                                        status_karyawan = 'Training'")->result_array();
        echo json_encode($data);
    }

    public function data_habis_kontrak_dept($dept)
    {
        $data = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.keterangan 
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                        WHERE
                                            b.kontrak_akhir BETWEEN NOW()
                                            AND  DATE_ADD( NOW(), INTERVAL '5' MONTH ) 
                                            AND a.dept = '$dept'
                                            AND NOT status_karyawan = 'Resigned'
                                            AND b.`status` = ''
                                        ORDER BY
                                            b.kontrak_akhir")->result_array();
        echo json_encode($data);
    }

    public function data_karyawan_baru()
    {
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS ftgl_masuk,
                                        jabatan 
                                    FROM
                                        tbl_makar
                                    WHERE NOT 
                                        status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status'
                                    ORDER BY
                                        tgl_masuk DESC")->result_array();
        echo json_encode($data);
    }

    public function data_keluar()
    {
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS ftgl_masuk,
                                        DATE_FORMAT( tgl_resign, '%d %M %Y' ) AS ftgl_keluar,
                                        jabatan,
                                        status_karyawan
                                    FROM
                                        tbl_makar
                                    WHERE  
                                        status_karyawan = 'Resigned' OR status_karyawan = 'perubahan_status'
                                    ORDER BY
                                        tgl_resign DESC")->result_array();
        echo json_encode($data);
    }

    public function proses_resign()
    {
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS ftgl_masuk,
                                        DATE_FORMAT( tgl_resign, '%d %M %Y' ) AS ftgl_keluar,
                                        jabatan,
                                        status_karyawan
                                    FROM
                                        tbl_makar
                                    WHERE  
                                        status_karyawan = 'Resigned' OR status_karyawan = 'perubahan_status'
                                    ORDER BY
                                        tgl_resign DESC")->result_array();
                                         $query = $this->db->query("SELECT id, 
                                         no_scan,
                                         nama,
                                         dept,
                                         jabatan,
                                         DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS tgl_masuk,
                                         DATE_FORMAT( tgl_pengajuan_resign, '%d %M %Y' ) AS tgl_pengajuan_resign,
                                         DATE_ADD(tgl_pengajuan_resign,INTERVAL 1 month ) as tgl_resign,
                                         status_karyawan
                                     FROM
                                     tbl_makar
                                     WHERE
                                         status_karyawan = 'Proses Resign'
                                     
                                     ORDER BY
                                     tgl_resign DESC")->result_array();; 
        echo json_encode($data);
    }
    public function ExportExcellhabiskontrak()
    {
        $this->load->view('home/export_excel_habis_kontrak');
    }
    public function statusseragam()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Status Seragam Dan ID card Karyawan ALL';
        $this->load->view('template/header', $data);
        $this->load->view('home/statusIdcSeragam');
        $this->load->view('template/footer');
    }
    
    public function statusseragam_dept()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Status Seragam Dan ID card Karyawan Dept';
        $this->load->view('template/header', $data);
        $this->load->view('home/statusIdcSeragam_dept');
        $this->load->view('template/footer');
    }

    public function karyawanbaru()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Dashboard Karyawan Baru';
        $this->load->view('template/header', $data);
        $this->load->view('home/karyawanbaru');
        $this->load->view('template/footer');
    }

    public function habiskontrak()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Karyawan Habis Kontrak';
        $this->load->view('template/header', $data);
        $this->load->view('home/habiskontrak');
        $this->load->view('template/footer');
    }

    public function kedisiplinan()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Data Karyawan Kedisiplinan';
        $this->load->view('template/header', $data);
        $this->load->view('home/kedisiplinan');
        $this->load->view('template/footer');
    }

    public function keluar()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Data Karyawan Keluar';
        $this->load->view('template/header', $data);
        $this->load->view('home/keluar');
        $this->load->view('template/footer');
    }

    public function ulangtahun()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array();

        $data['title'] = 'Data Karyawan Ulang Tahun';
        $this->load->view('template/header', $data);
        $this->load->view('home/ultah');
        $this->load->view('template/footer');
    }

    public function send_mail()
    {
        $query = $this->db->query("SELECT a.nama,
                                        a.dept,
                                        a.no_scan,
                                        b.email_address
                                    FROM
                                        tbl_makar a
                                        LEFT JOIN ( SELECT * FROM email_pribadi b)b ON b.no_scan = a.no_scan
                                    WHERE
                                        DATE_FORMAT( a.tgl_lahir, '%m-%d' ) = DATE_FORMAT( Now( ), '%m-%d' ) 
                                        AND NOT a.status_aktif = 0")->result_array();
        foreach($query AS $data) {
        $config = Array(
            'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'employees.indotaichen@gmail.com',
                    'smtp_pass' => '4dm1ndit',
                    'mailtype'  => 'html', 
                    'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n"); 
            $this->email->from('PT. Indotaichen Textile Industri', 'This is an automatic email (Ini adalah email otomatis)'); 
            $this->email->to($data['email_address']);
            $this->email->subject('Ucapan selamat ulang tahun untukmu'); 
            $this->email->message('<html>
                                    <head>
                                    <title>Selamat Ulang Tahun</title>
                                    </head>
                                    <body>
                                    <h3><p>Hari ini adalah hari kelahiranmu,</p></h3>
                                    <h4><p>Hari ini adalah hari ulang tahunmu. Ulang tahun adalah hari istimewa, waktu yang tepat untuk memiliki harapan dan mimpi baru. Dan sekarang, aku ingin meluangkan waktu untuk mengatakan, Selamat Ulang Tahun, semoga hari-harimu penuh berkah.</p></h4>
                                    <p><b>Thank You</b> <br>
                                        <b>Best Regards,</b> <br>
                                        <b>PT. INDO TAICHEN TEXTILE INDUSTRY</b> <br>
                                    </p>
                                    </body>
                                </html>'); 
            $kirim = $this->email->send();
        }
        if($kirim){
            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Email berhasil dikirim.</b></center>');
            redirect('home/ulangtahun');
        }else {
            $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Email tidak berhasil dikirim.</b></center>');
            echo $this->email->print_debugger();
        } 
    }

    public function export_excel()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('home/export_excel_keluar', $data); 
    }
    public function export_excel_baru()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('home/export_excel_baru', $data); 
    }
    public function export_excel_Status_seragam()
    {
        $data['tgl_mulai']   = $this->input->post('start', true);
        $data['tgl_selesai'] = $this->input->post('stop', true);
        $this->load->view('home/export_excel_Status_IDSeragam', $data); 
    }

    public function edit_status_seragam($no_scan)
    {
        $statusidcard = $this->input->post('status_idcard', true);
        if ($statusidcard == 'Belum'){
            $data = array(
                'no_scan'           =>  $this->input->post('no_scan', true),
                // 'status_seragam'       => $this->input->post('status_seragam', true),
                // 'status_idcard'        => $this->input->post('status_idcard', true)
                'status_email'        =>'1'
            );
            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->insert('status_email_idcard', $data);

            $noscan = $this->input->post('no_scan', true);
            $query = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();

            $this->load->library('phpmailer_lib'); 
            $mail = $this->phpmailer_lib->load();
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.indotaichen.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'dept.it@indotaichen.com'; 
            $mail->Password = 'Xr7PzUWoyPA'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
            $mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');
            
            // Menambahkan penerima
                $mail->addAddress($this->input->post('email1')); 
                $mail->addAddress($this->input->post('email2')); 
                $mail->addAddress($this->input->post('email3')); 
                $mail->addAddress($this->input->post('email4')); 
                $mail->addAddress($this->input->post('email5')); 
            // $mail->addAddress('stefanus.pranjana@indotaichen.com');
            $mail->addAddress('Iso.hrd@indotaichen.com');
            $mail->addAddress('asep.pauji@indotaichen.com');
            $mail->addAddress('prs01@indotaichen.com');
            $mail->addAddress('training@INDOTAICHEN.COM');
            
            $mail->Subject = 'Informasi Status ID card dan Seragam Karyawan Baru'; 
            // Mengatur format email ke HTML
            $mail->isHTML(true);
            $mailContent = "<html>
                            <head>
                            </head>
                            <body>
                                Hi Team,<br>
                                Data karyawan baru dengan masa kerja >6 bulan, tolong segera panggil<br>
                                untuk foto ID Card: <br>
                                <br>
                                Nomor Absen     : $query->no_scan <br>
                                Nama karyawan   : $query->nama <br>
                                Departemen      : $query->dept <br>
                                Tanggal Masuk   : $query->tgl_masuk <br>
                                Jabatan         : $query->jabatan <br>
                                Status karyawan : $query->status_karyawan <br>
                                ID Card         : $query->status_idcard <br>                                     
                                <br>
                                Jangan abaikan reminder ini dan jangan tunda menyelesaikan reminder ini.<br>
                                <br>
                                Terima kasih.
                            </body>
                        </html>"; 
            $mail->Body = $mailContent;

            if (!$mail->send()) {
                echo 'Pesan tidak dapat dikirim.';
                echo 'Mailer Error: ' . 
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been resigned and Email not successfully sent.</b>'.$mail->ErrorInfo.'</center>');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Email Status ID card and Seragam Notification has been successfully sent.</b></center>');
            }
           redirect('home/statusseragam');

        }elseif ($statusidcard == 'Sudah'){          
        $data = array(
                // 'masa_kerja'           =>  '',
                // 'status_seragam'       => $this->input->post('status_seragam', true),
                // 'status_idcard'        => $this->input->post('status_idcard', true)
                'status_idcard'        =>'Sudah'
            );
            $this->db->where('no_scan', $this->input->post('no_scan', true));
            $this->db->update('tbl_makar', $data);
            
            $noscan = $this->input->post('no_scan', true);
            $query = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();

            $this->load->library('phpmailer_lib'); 
            $mail = $this->phpmailer_lib->load();
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.indotaichen.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'dept.it@indotaichen.com'; 
            $mail->Password = 'Xr7PzUWoyPA'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
            $mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');
            
            // Menambahkan penerima
                $mail->addAddress($this->input->post('email1')); 
                $mail->addAddress($this->input->post('email2')); 
                $mail->addAddress($this->input->post('email3')); 
                $mail->addAddress($this->input->post('email4')); 
                $mail->addAddress($this->input->post('email5')); 
            // $mail->addAddress('stefanus.pranjana@indotaichen.com');
            $mail->addAddress('Iso.hrd@indotaichen.com');
            // $mail->addAddress('asep.pauji@indotaichen.com');
            $mail->addAddress('prs01@indotaichen.com');
            $mail->addAddress('training@INDOTAICHEN.COM');
            // 
            $mail->Subject = 'Informasi Status ID card dan Seragam Karyawan Baru'; 
            // Mengatur format email ke HTML
            $mail->isHTML(true);
            $mailContent = "<html>
                                <head>
                                </head>
                                <body>
                                    Hi Team,<br>
                                    Data karyawan berikut sudah menerima ID Card: <br>
                                    <br>
                                    Nomor Absen     : $query->no_scan <br>
                                    Nama karyawan   : $query->nama <br>
                                    Departemen      : $query->dept <br>
                                    Tanggal Masuk   : $query->tgl_masuk <br>
                                    Jabatan         : $query->jabatan <br>
                                    Status karyawan : $query->status_karyawan <br>
                                    ID Card         : $query->status_idcard <br>
                                    <br>
                                    <br>
                                    Terima kasih.
                                </body>
                            </html>"; 
            $mail->Body = $mailContent;

            if (!$mail->send()) {
                echo 'Pesan tidak dapat dikirim.';
                echo 'Mailer Error: ' . 
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been resigned and Email not successfully sent.</b>'.$mail->ErrorInfo.'</center>');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Email Status ID card and Seragam Notification has been successfully sent.</b></center>');
            }
           redirect('home/statusseragam');
    }
}
    public function edit_status_seragam_dept($no_scan)
    {
        $statusSeragam = $this->input->post('status_seragam2', true);
        if ($statusSeragam == 'Belum'){
            $noscan = $this->input->post('no_scan', true);
            $query = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();

            $this->load->library('phpmailer_lib'); 
            $mail = $this->phpmailer_lib->load();
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.indotaichen.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'dept.it@indotaichen.com'; 
            $mail->Password = 'Xr7PzUWoyPA'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
            $mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');
            
            // Menambahkan penerima
                $mail->addAddress($this->input->post('email1')); 
                $mail->addAddress($this->input->post('email2')); 
                $mail->addAddress($this->input->post('email3')); 
                $mail->addAddress($this->input->post('email4')); 
                $mail->addAddress($this->input->post('email5')); 
            // $mail->addAddress('stefanus.pranjana@indotaichen.com');
            $mail->addAddress('Iso.hrd@indotaichen.com');
            // $mail->addAddress('asep.pauji@indotaichen.com');
            $mail->addAddress('prs01@indotaichen.com');
            $mail->addAddress('training@INDOTAICHEN.COM');

            $mail->Subject = 'Informasi Status ID card dan Seragam Karyawan Baru'; 
            // Mengatur format email ke HTML
            $mail->isHTML(true);
            $mailContent = "<html>
                            <head>
                            </head>
                            <body>
                                Hi Team,<br>
                                Data karyawan baru dengan masa kerja >6 bulan, Belum di berikan seragam<br>
                                tolong segera panggil: <br>
                                <br>
                                Nomor Absen     : $query->no_scan <br>
                                Nama karyawan   : $query->nama <br>
                                Departemen      : $query->dept <br>
                                Tanggal Masuk   : $query->tgl_masuk <br>
                                Jabatan         : $query->jabatan <br>
                                Status karyawan : $query->status_karyawan <br>
                                ID Card         : $query->status_idcard <br>                                     
                                <br>
                                Jangan abaikan reminder ini dan jangan tunda menyelesaikan reminder ini.<br>
                                <br>
                                Terima kasih.
                            </body>
                        </html>"; 
            $mail->Body = $mailContent;

            if (!$mail->send()) {
                echo 'Pesan tidak dapat dikirim.';
                echo 'Mailer Error: ' . 
                $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been resigned and Email not successfully sent.</b>'.$mail->ErrorInfo.'</center>');
            } else {
                $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Email Status ID card and Seragam Notification has been successfully sent.</b></center>');
            }
           redirect('home/statusseragam');

        }elseif ($statusSeragam == 'Sudah'){
            $data = array(
                 // 'masa_kerja'           =>  '',
                 'status_seragam'       => 'Sudah'
                //  'status_idcard'        => $this->input->post('status_idcard2', true)
             );
             $this->db->where('no_scan', $this->input->post('no_scan', true));
             $this->db->update('tbl_makar', $data);
             
             $noscan = $this->input->post('no_scan', true);
             $query = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();
 
             $this->load->library('phpmailer_lib'); 
             $mail = $this->phpmailer_lib->load();
             // Konfigurasi SMTP
             $mail->isSMTP();
             $mail->Host = 'mail.indotaichen.com'; 
             $mail->SMTPAuth = true;
             $mail->Username = 'dept.it@indotaichen.com'; 
             $mail->Password = 'Xr7PzUWoyPA'; 
             $mail->SMTPSecure = 'ssl';
             $mail->Port = 465;
 
             $mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
             $mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');
             
             // Menambahkan penerima
                 $mail->addAddress($this->input->post('email1')); 
                 $mail->addAddress($this->input->post('email2')); 
                 $mail->addAddress($this->input->post('email3')); 
                 $mail->addAddress($this->input->post('email4')); 
                 $mail->addAddress($this->input->post('email5')); 
            //  $mail->addAddress('stefanus.pranjana@indotaichen.com');
             $mail->addAddress('Iso.hrd@indotaichen.com');
             $mail->addAddress('asep.pauji@indotaichen.com');
             $mail->addAddress('prs01@indotaichen.com');
             $mail->addAddress('training@INDOTAICHEN.COM');

             $mail->Subject = 'Informasi Status Seragam Karyawan Baru'; 
             // Mengatur format email ke HTML
             $mail->isHTML(true);
             $mailContent =  
                            "<html>
                            <head>
                            </head>
                            <body>
                                Hi Team,<br>
                                Data karyawan berikut sudah menerima ID Card & Seragam: <br>
                                <br>
                                Nomor Absen     : $query->no_scan <br>
                                Nama karyawan   : $query->nama <br>
                                Departemen      : $query->dept <br>
                                Tanggal Masuk   : $query->tgl_masuk <br>
                                Jabatan         : $query->jabatan <br>
                                Status karyawan : $query->status_karyawan <br>
                                <br>
                                <br>
                                Terima kasih.
                            </body>
                        </html>"; 
             $mail->Body = $mailContent;
 
             if (!$mail->send()) {
                 echo 'Pesan tidak dapat dikirim.';
                 echo 'Mailer Error: ' . 
                 $this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been resigned and Email not successfully sent.</b>'.$mail->ErrorInfo.'</center>');
             } else {
                 $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Email Status ID card and Seragam Notification has been successfully sent.</b></center>');
             }
            redirect('home/statusseragam');
    }
    }

// END EMPLOYEE
    public function karyawantraining()
    {
        $data['user'] = $this->db->get_where('user', array('name' =>
        $this->session->userdata('name')))->row_array(); //Select * from user where name = '$name'
        // echo 'selemat datang ' . $data['user']['name'];
        $data['title'] = 'Data Karyawan Masa Percobaan';
        $this->load->view('template/header', $data);
        $this->load->view('home/karyawantraining');
        $this->load->view('template/footer');
    }
}
