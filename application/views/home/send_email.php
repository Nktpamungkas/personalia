<?php
// Pastikan hanya menerima permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari permintaan
    $receiverEmail = filter_input(INPUT_POST, 'receiver_email', FILTER_SANITIZE_EMAIL);
    $selectedDataJSON = filter_input(INPUT_POST, 'selected_data', FILTER_SANITIZE_STRING);

    // Ubah JSON menjadi array
    $selectedData = json_decode($selectedDataJSON, true);

    // Proses pengiriman email
    if ($receiverEmail && $selectedData) {
        // KIRIM EMAIL
        $noscan = $selectedData[0]['no_scan']; // Ambil no_scan dari data pertama
        $dept = $selectedData[0]['dept']; // Ambil dept dari data pertama

        // Ubah query SQL untuk menyertakan kolom dept_mail
        $query = $this->db->query("SELECT 
                                        makar.no_scan,
                                        makar.nama,
                                        makar.dept,
                                        makar.jabatan,
                                        makar.tgl_masuk,
                                        makar.tgl_evaluasi,
                                        dm.dept_email1 as dept_email1,
                                        dm.dept_email2 as dept_email2,
                                        dm.dept_email3 as dept_email3,
                                        dm.dept_email4 as dept_email4,
                                        dm.dept_email5 as dept_email5
                                    FROM tbl_makar makar
                                    LEFT JOIN dept_mail dm ON dm.code = makar.dept 
                                    WHERE makar.no_scan = '$noscan'
        ")->row();

        $dept_mail1 = $query->dept_email1;
        $dept_mail2 = $query->dept_email2;
        $dept_mail3 = $query->dept_email3;
        $dept_mail4 = $query->dept_email4;
        $dept_mail5 = $query->dept_email5;

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

        $mail->addAddress('asep.pauji@indotaichen.com');
        
            // Konfigurasi isi email
        $ $mail->Subject = 'Informasi Karyawan baru'; 
        // Mengatur format email ke HTML
        $mail->isHTML(true);
        $mailContent = "<html>
                            <head>
                            </head>
                            <body>
                             <br>
                                Data karyawan baru, sebagai berikut : <br>
                                Nomor Absen : $query->no_scan <br>
                                Nama karyawan : $query->nama <br>
                                Departemen : $query->dept <br>
                                Tanggal Masuk : $query->tgl_masuk <br>                                        
                                Tanggal Evaluasi: $query->tgl_evaluasi <br>
                                Jabatan : $query->jabatan
                                <br>
                            </body>
                        </html>"; 
        $mail->Body = $mailContent; 

        // Kirim email
        if ($mail->send()) {
            echo 'Email berhasil dikirim ke ' . $receiverEmail;
        } else {
            echo 'Email gagal dikirim. Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Data tidak valid.';
    }
} else {
    echo 'Metode request tidak valid.';
}
?>
