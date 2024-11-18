<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pci extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Izin Cuti';
		$this->load->view('template/header', $data);
		$this->load->view('pci/index');
		$this->load->view('template/footer');
	}

	public function index_all()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';

		$bulan['Belum_ver'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('pci/indexAll', $bulan);
		$this->load->view('template/footer');
	}
	public function index2()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';

		$this->load->view('template/header', $data);
		$this->load->view('pci\index2.php');
		$this->load->view('template/footer');
	}
	public function index_dinas()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';
		$bulan['Belum_ver'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('pci\index_dinas.php', $bulan);
		$this->load->view('template/footer');
	}

	public function show_verifikasi()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';

		$bulan['Belum_ver'] = 'Verifikasi';

		$this->load->view('template/header', $data);
		$this->load->view('pci/indexAll', $bulan);
		$this->load->view('template/footer');
	}

	public function show_verifikasi_dinas()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';

		$bulan['Belum_ver'] = 'Verifikasi';

		$this->load->view('template/header', $data);
		$this->load->view('pci/index_dinas', $bulan);
		$this->load->view('template/footer');
	}
	public function show_verifikasi_cuti_approve()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['title'] = 'Time Attendance | Izin Cuti';

		$bulan['Belum_ver'] = 'Verifikasi';

		$this->load->view('template/header', $data);
		$this->load->view('pci/indexAll_Approve', $bulan);
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
		$data['tgl_mulai'] = $this->input->post('start', true);
		$data['tgl_selesai'] = $this->input->post('stop', true);
		$this->load->view('pci/exportToExcel', $data);
	}
	public function export_excel_dept()
	{
		$data['tgl_mulai'] = $this->input->post('start', true);
		$data['tgl_selesai'] = $this->input->post('stop', true);
		$data['dept'] = $this->input->post('dept', true);
		$this->load->view('pci/exportToExcel_dept', $data);
	}
	public function export_sisa_cuti_diuangkan()
	{
		$data['tgl_mulai'] = $this->input->post('start', true);
		$data['tgl_selesai'] = $this->input->post('stop', true);
		$this->load->view('pci/export_cuti', $data);
	}

	public function export_excel_cuti($tgl1 = "", $tgl2 = "", $noscan = "", $dept = "")
	{
		if ($noscan && $tgl1 && $tgl2) {
			$data['noscan'] = $noscan;
			$data['tgl1'] = $tgl1;
			$data['tgl2'] = $tgl2;
			$data['dept'] = $dept;
			$this->load->view('pci/exportToExcelCuti', $data);
		} else {
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
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data = array(
			'status' => 'Printed'
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
												b.role_id,
                                                c.nama AS pengganti_kerja,
												a.pengganti_kerja as no_scan_pengganti_kerja,
												c.ttd,
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
                                                DATE_FORMAT(a.tgl_surat_pemohon, '%d %M %Y') as tgl_surat_pemohon,
												a.APD,
												DATE_FORMAT(a.tgl_approval, '%d %M %Y') as ftgl_approval,
												a.no_scan_atasan_1,
												a.no_scan_atasan_2,
												a.tgl_approval,												
												a.status_approval,
												a.status_approval_1,
												a.status_approval_2,
												a.hash_approval,
												a.hash_approval1,
												a.hash_approval2,
												DATE_FORMAT(a.tgl_approval_1, '%d %M %Y') as ftgl_approval_1,
												DATE_FORMAT(a.tgl_approval_2, '%d %M %Y') as ftgl_approval_2,
												a.hash_creation
                                            FROM 
                                                permohonan_izin_cuti a
                                                LEFT JOIN (SELECT * FROM tbl_makar) b ON a.nip = b.no_scan
                                                LEFT JOIN (SELECT * FROM tbl_makar) c ON a.pengganti_kerja = c.no_scan
                                                LEFT JOIN cuti d ON d.kode_cuti = a.ket
                                         WHERE 
                                                a.id = '$id'")->row();

		$this->load->view('pci/print', $data);
	}

	public function search_noscan($no_scan, $thn)
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
														b.kode_cuti AS generate,
														a.role_id
													FROM tbl_makar a                                            
												LEFT JOIN ( SELECT nama as nama_atasan, no_scan as no_scan_atasan, jabatan as jabatan_atasan 
															FROM tbl_makar 
															WHERE status_aktif = 1 and status_karyawan not in ('Resigned','perubahan_status')
															) tm2 ON a.atasan1 = tm2.nama_atasan 
												LEFT JOIN ( SELECT nama as nama_atasan2, no_scan as no_scan2, jabatan as jabatan2
															FROM tbl_makar 
															WHERE status_aktif = 1 and status_karyawan not in ('Resigned','perubahan_status')
															) tm3 ON a.atasan2 = tm3.nama_atasan2 
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
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Izin Cuti';
		$this->load->view('template/header', $data);
		$this->load->view('pci/add');
		$this->load->view('template/footer');
	}

	public function add()
	{
		if (
			$this->input->post('ket', true) !== "A15"
		) {
			$data = array(
				'kode_cuti' => "FIC-" . date('Ym'),
				'nip' => $this->input->post('no_scan', true),
				'dept' => $this->input->post('dept', true),
				'pengganti_kerja' => $this->input->post('pengganti_kerja', true),
				'lama_izin' => $this->input->post('lama_izin', true),
				'days_or_month' => $this->input->post('days_or_month', true),
				'tgl_mulai' => $this->input->post('tgl_mulai', true),
				'tgl_selesai' => $this->input->post('tgl_selesai', true),
				'ket' => $this->input->post('ket', true),
				'dll' => $this->input->post('dll', true),
				'alasan' => $this->input->post('alasan', true),
				'pemohon_nama' => $this->input->post('pemohon_nama', true),
				'pemohon_jabatan' => $this->input->post('pemohon_jabatan', true),
				'role_id' => $this->input->post('pemohon_role_id', true),
				'no_scan_atasan_1' => $this->input->post('no_scan_atasan', true),
				'no_scan_atasan_2' => $this->input->post('no_scan_atasan2', true),
				'disetujui_nama_1' => $this->input->post('disetujui_nama_1', true),
				'disetujui_jabatan_1' => $this->input->post('disetujui_jabatan_1', true),
				'disetujui_nama_2' => $this->input->post('disetujui_nama_2', true),
				'disetujui_jabatan_2' => $this->input->post('disetujui_jabatan_2', true),
				'mengetahui_nama' => $this->input->post('mengetahui_nama', true),
				'mengetahui_jabatan' => $this->input->post('mengetahui_jabatan', true),
				// 'tgl_diset_mengetehui' => $this->input->post('tgl_surat_pemohon', true),
				'tgl_surat_pemohon' => $this->input->post('tgl_surat_pemohon', true),
				'status' => 'Printed',
				'hash_creation' => $this->input->post('pemohon_nama', true) . ' - ' .
					$this->input->post('no_scan', true) . ' ' .
					$this->input->post('tgl_surat_pemohon', true)
			);
		} elseif (
			$this->input->post('ket', true) === "A15"
		) {
			$data = array(
				'kode_cuti' => "FIC-" . date('Ym'),
				'nip' => $this->input->post('no_scan', true),
				'dept' => $this->input->post('dept', true),
				'pengganti_kerja' => $this->input->post('pengganti_kerja', true),
				'lama_izin' => $this->input->post('lama_izin', true),
				'days_or_month' => $this->input->post('days_or_month', true),
				'tgl_mulai' => $this->input->post('tgl_mulai', true),
				'tgl_selesai' => $this->input->post('tgl_selesai', true),
				'ket' => $this->input->post('ket', true),
				'dll' => $this->input->post('dll', true),
				'alasan' => $this->input->post('alasan', true),
				'pemohon_nama' => $this->input->post('pemohon_nama', true),
				'pemohon_jabatan' => $this->input->post('pemohon_jabatan', true),
				'role_id' => $this->input->post('pemohon_role_id', true),
				'no_scan_atasan_1' => $this->input->post('no_scan_atasan', true),
				'no_scan_atasan_2' => $this->input->post('no_scan_atasan2', true),
				'disetujui_nama_1' => $this->input->post('atasan1', true),
				'disetujui_jabatan_1' => $this->input->post('jabatan_atasan', true),
				'disetujui_nama_2' => $this->input->post('atasan2', true),
				'disetujui_jabatan_2' => $this->input->post('jabatan_atasan2', true),
				'mengetahui_nama' => $this->input->post('mengetahui_nama', true),
				'mengetahui_jabatan' => $this->input->post('mengetahui_jabatan', true),
				'tgl_surat_pemohon' => $this->input->post('tgl_surat_pemohon', true),
				// 'tgl_diset_mengetehui' => $this->input->post('tgl_surat_pemohon', true),
				'status' => 'Printed',
				'hash_creation' => $this->input->post('pemohon_nama', true) . ' - ' .
					$this->input->post('no_scan', true) . ' ' .
					$this->input->post('tgl_surat_pemohon', true)
			);
		}

		if ($this->input->post('ket', true) == "A15" && $this->input->post('pemohon_role_id', true) === '2' || $this->input->post('pemohon_role_id', true) === '3') {
			$nama_pemohon = $this->input->post('pemohon_nama', true);
			$dept_pemohon = $this->input->post('dept', true);
			$no_scan = $this->input->post('no_scan', true);
			$dataatasan = $this->db->query("SELECT 
										tm.nama,
										tm.no_scan,
										tm.dept,
										tm2.no_scan as no_scan_atasan,
										tm2.nama as nama_atasan,
										u.fcm 
										from 
										tbl_makar tm 
										left join 
										tbl_makar tm2 on tm.atasan1 = tm2.nama
										left join 
										`user` u on tm2.no_scan =u.no_scan 
										where tm.no_scan ='$no_scan'
										and tm2.status_aktif = 1")->Row();


			$FCM = $dataatasan->fcm;

			$save = $this->db->insert('permohonan_izin_cuti', $data);
			// URL of the API you want to send data to
			$url = "https://dit.indotaichen.com/api-hrisapproval/api/send-notification-first"; // Replace with your actual URL

			// Data to be sent in the POST request
			$data = [
				'token' => $FCM,
				'title' => 'Approval Dinas',
				'content' => 'Ijin dari ' . $nama_pemohon . ' dept ' . $dept_pemohon . ' mohon di approve'
			];

			// Initialize cURL
			$ch = curl_init($url);

			// Set cURL options
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of outputting
			curl_setopt($ch, CURLOPT_POST, true); // Use POST method
			curl_setopt($ch, CURLOPT_HTTPHEADER, [
				'Content-Type: application/json', // Set content type to JSON
			]);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Encode data as JSON

			// KIRIM EMAIL KARYAWAN DINAS
			$query = $this->db->query("SELECT CONCAT(a.kode_cuti, '-', LPAD(a.id, 7, '0')) AS fkode_cuti,
			             DATE_FORMAT(a.tgl_surat_pemohon, '%d %M %Y') AS tgl_surat_pemohon,
			             b.no_scan,
			             b.nama,
			             b.dept,
						 b.jabatan,
			             c.nama as atasan1,
			             c.jabatan as jabatan_atasan,
			             DATE_FORMAT(a.tgl_mulai, '%d %M %Y') AS tgl_mulai,
			             a.lama_izin,
			             DATE_FORMAT(a.tgl_selesai, '%d %M %Y') AS tgl_selesai,
			             a.role_id,
			             a.alasan 
			      FROM permohonan_izin_cuti a
			      LEFT JOIN (SELECT * FROM tbl_makar) b ON a.nip = b.no_scan 
				   LEFT JOIN (SELECT * FROM tbl_makar) c ON b.atasan1 = c.nama
				   where
				  b.no_scan = '$no_scan'				  
			        AND a.ket IN ('A15') 
					and b.status_aktif = 1 and c.status_aktif =1
			      ORDER BY a.tgl_mulai DESC
			    ")->row();

			// URL of the API you want to send data to
			$url2 = "https://dit.indotaichen.com/api-hrisapproval/api/send-email"; // Replace with your actual URL

			// Data to be sent in the POST request
			$data = [
				"no_scan" => " $query->no_scan",
				"name" => "$query->nama",
				"department" => "$query->dept ",
				"position" => "$query->jabatan",
				"tgl_pengajuan" => "$query->tgl_surat_pemohon",
				"tgl_mulai" => "$query->tgl_mulai",
				"tgl_selesai" => "$query->tgl_selesai",
				"lama_izin" => $query->lama_izin,
				"keterangan" => "$query->alasan"
			];

			// Initialize cURL
			$ch1 = curl_init($url2);

			// Set cURL options
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true); // Return response instead of outputting
			curl_setopt($ch1, CURLOPT_POST, true); // Use POST method
			curl_setopt($ch1, CURLOPT_HTTPHEADER, [
				'Content-Type: application/json', // Set content type to JSON
			]);
			curl_setopt($ch1, CURLOPT_POSTFIELDS, json_encode($data)); // Encode data as JSON

			if ($save) {
				// Execute cURL request
				curl_exec($ch);
				curl_exec($ch1);
				// Close cURL session
				curl_close($ch);
				curl_close($ch1);
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Success.</b></center>');
				redirect('pci');
			} else {
				$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Please Try Again.</b></center>');
				redirect('pci/add_Request');
			}
		} elseif ($this->input->post('ket', true) == "A15" && $this->input->post('pemohon_role_id', true) === '12') {
			$nama_pemohon = $this->input->post('pemohon_nama', true);
			$dept_pemohon = $this->input->post('dept', true);
			$no_scan = $this->input->post('no_scan', true);
			$dataatasan = $this->db->query("SELECT 
										tm.nama,
										tm.no_scan,
										tm.dept,
										tm2.no_scan as no_scan_atasan,
										tm2.nama as nama_atasan,
										u.fcm 
										from 
										tbl_makar tm 
										left join 
										tbl_makar tm2 on tm.atasan1 = tm2.nama
										left join 
										`user` u on tm2.no_scan =u.no_scan 
										where tm.no_scan ='$no_scan'
										and tm2.status_aktif = 1")->Row();


			$FCM = $dataatasan->fcm;

			$save = $this->db->insert('permohonan_izin_cuti', $data);
			// URL of the API you want to send data to
			$url = "https://dit.indotaichen.com/api-hrisapproval/api/send-notification-first"; // Replace with your actual URL

			// Data to be sent in the POST request
			$data = [
				'token' => $FCM,
				'title' => 'Approval Dinas',
				'content' => 'Ijin dari ' . $nama_pemohon . ' dept ' . $dept_pemohon . ' mohon di approve'
			];

			// Initialize cURL
			$ch = curl_init($url);

			// Set cURL options
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of outputting
			curl_setopt($ch, CURLOPT_POST, true); // Use POST method
			curl_setopt($ch, CURLOPT_HTTPHEADER, [
				'Content-Type: application/json', // Set content type to JSON
			]);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Encode data as JSON

			if ($save) {
				// Execute cURL request
				curl_exec($ch);

				// Close cURL session
				curl_close($ch);
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Success.</b></center>');
				redirect('pci');
			} else {
				$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Please Try Again.</b></center>');
				redirect('pci/add_Request');
			}
			//tambahan create cuti kirim email ke atasan 1
			//script di sini
		} else {

			// KIRIM EMAIL pengajuan
			$noscan = $this->input->post('no_scan', true);

			// Ubah query SQL untuk menyertakan kolom dept_mail
			$query = $this->db->query("SELECT distinct 
										tm.no_scan,
											tm.nama,
											tm.dept,
											tm.jabatan,
											CONCAT(pic.kode_cuti, '-', pic.id) AS kode_cuti, 
											DATE_FORMAT(pic.tgl_mulai, '%d %M %Y') AS ftgl_mulai,
											DATE_FORMAT(pic.tgl_selesai, '%d %M %Y') AS ftgl_selesai,
											pic.lama_izin,
											pic.alasan,
											pic.no_scan_atasan_1,
											pic.no_scan_atasan_2,
											u.email
											FROM permohonan_izin_cuti pic
											left join (select nama, no_scan, dept, jabatan from tbl_makar where status_aktif =1) tm on tm.no_scan = pic.nip 
											LEFT JOIN `user` u ON u.no_scan = pic.no_scan_atasan_1
											where pic.nip = '$noscan' and not pic.status = 'Verifikasi' and pic.id IN (SELECT MAX(id) FROM permohonan_izin_cuti GROUP BY nip)
                ")->row();
			$email_atasan1 = $query->email;
			$kode_cuti = $query->kode_cuti;

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();
			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host = 'mail.indotaichen.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'dept.it@indotaichen.com';
			$mail->Password = 'Xr7PzUWoyPA';
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

			// Menambahkan penerima
			$mail->addAddress($email_atasan1);
			// $mail->addAddress('asep.pauji@indotaichen.com');


			$mail->Subject = 'Permohonan pengajuan cuti';
			// Mengatur format email ke HTML
			$mail->isHTML(true);
			$mailContent = "<html>
                                    <head>
                                    </head>
                                    <body>
                                    <br>
									Dengan hormat, <br>
										Berikut Data karyawan yang mengajukan Permohonan Izin Cuti : $kode_cuti <br>
										Nomor Absen : $query->no_scan <br>
										Nama karyawan : $query->nama<br>
										Departemen :  $query->dept  <br>
										Jabatan : $query->jabatan <br>
										Tanggal Permohonan :  $query->ftgl_mulai <br>
										Tanggal Selesai :  $query->ftgl_selesai  <br>
										Lama Izin :  $query->lama_izin <br>
										Alasan :  $query->alasan <br>
										Dimohon untuk login untuk approve permohonan tersebut di halaman <br>
										<a href='https://online.indotaichen.com/personali/approve_cuti_menyetujui </a><br>
										Terimakasih
                                        <br>
                                    </body>
                                </html>";
			$mail->Body = $mailContent;

			$save = $this->db->insert('permohonan_izin_cuti', $data);
			if ($save && $mail->send()) {
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Success.</b></center>');
				redirect('pci');
			} else {
				$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Please Try Again.</b></center>');
				redirect('pci/add_Request');
			}
		}
	}
	// END NEW IZIN CUTI

	// START EDIT IZIN CUTI
	public function edit_Request($id)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

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
			$data = array(
				'nip' => $this->input->post('no_scan', true),
				'pengganti_kerja' => $this->input->post('pengganti_kerja', true),
				'lama_izin' => $this->input->post('lama_izin', true),
				'days_or_month' => $this->input->post('days_or_month', true),
				'tgl_mulai' => $this->input->post('tgl_mulai', true),
				'tgl_selesai' => $this->input->post('tgl_selesai', true),
				'ket' => $this->input->post('ket', true),
				'dll' => $this->input->post('dll', true),
				'alasan' => $this->input->post('alasan', true),
				'pemohon_nama' => $this->input->post('pemohon_nama', true),
				'pemohon_jabatan' => $this->input->post('pemohon_jabatan', true),
				'disetujui_nama_1' => $this->input->post('disetujui_nama_1', true),
				'disetujui_jabatan_1' => $this->input->post('disetujui_jabatan_1', true),
				'disetujui_nama_2' => $this->input->post('disetujui_nama_2', true),
				'disetujui_jabatan_2' => $this->input->post('disetujui_jabatan_2', true),
				'mengetahui_nama' => $this->input->post('mengetahui_nama', true),
				'mengetahui_jabatan' => $this->input->post('mengetahui_jabatan', true),
				'tgl_surat_pemohon' => $this->input->post('tgl_surat_pemohon', true),
				'tgl_diset_mengetehui' => $this->input->post('tgl_diset_mengetehui', true),
				'hash_approval' => $this->input->post('mengetahui_nama', true) . '/' . $this->input->post('mengetahui_jabatan', true) . '/' . $this->input->post('tgl_diset_mengetehui', true),
				'status_approval' => 'Approved',
				'status' => 'Verifikasi'
			);
			if ($this->input->post('ket', true) == "A01") {
				$no_scan = $this->input->post('no_scan', true);
				$sisacuti = $this->db->query("SELECT sisa_cuti FROM tbl_makar WHERE no_scan = '$no_scan'")->row();
				$data_cuti = array(
					'sisa_cuti' => $sisacuti->sisa_cuti - $this->input->post('lama_izin', true)
				);
				$this->db->where('no_scan', $no_scan);
				$this->db->update('tbl_makar', $data_cuti);
			}
		} else {
			$data = array(
				'nip' => $this->input->post('no_scan', true),
				'pengganti_kerja' => $this->input->post('pengganti_kerja', true),
				'lama_izin' => $this->input->post('lama_izin', true),
				'days_or_month' => $this->input->post('days_or_month', true),
				'tgl_mulai' => $this->input->post('tgl_mulai', true),
				'tgl_selesai' => $this->input->post('tgl_selesai', true),
				'ket' => $this->input->post('ket', true),
				'dll' => $this->input->post('dll', true),
				'alasan' => $this->input->post('alasan', true),
				'pemohon_nama' => $this->input->post('pemohon_nama', true),
				'pemohon_jabatan' => $this->input->post('pemohon_jabatan', true),
				'disetujui_nama_1' => $this->input->post('disetujui_nama_1', true),
				'disetujui_jabatan_1' => $this->input->post('disetujui_jabatan_1', true),
				'disetujui_nama_2' => $this->input->post('disetujui_nama_2', true),
				'disetujui_jabatan_2' => $this->input->post('disetujui_jabatan_2', true),
				'mengetahui_nama' => $this->input->post('mengetahui_nama', true),
				'mengetahui_jabatan' => $this->input->post('mengetahui_jabatan', true),
				'tgl_surat_pemohon' => $this->input->post('tgl_surat_pemohon', true),
				'tgl_diset_mengetehui' => $this->input->post('tgl_diset_mengetehui', true)

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
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['noscan'] = $this->input->post('no_scan', true);
		$data['tgl1'] = $this->input->post('date1', true);
		$data['tgl2'] = $this->input->post('date2', true);

		$data['title'] = 'Time Attendance | Laporan Absen';
		$this->load->view('template/header', $data);
		$this->load->view('pci/laporan_absen', $data);
		$this->load->view('template/footer');
	}
	// END LAPORAN ABSEN

	public function tampil_username()
	{
		$user_data = array(
			'id' => $id->id,
			'name' => $id->name,
			'name' => $username,
			'dept' => $depts,
			'logged_in' => true
		);
	}

	public function approve_cuti_menyetujui()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Pengajuan Cuti';
		$this->load->view('template/header', $data);
		$this->load->view('pci/approve_cuti/index_menyetujui');
		$this->load->view('template/footer');
	}

	public function tugas_dinas_menyetujui()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Pengajuan Dinas';
		$this->load->view('template/header', $data);
		$this->load->view('pci/tugas_dinas/index_menyetujui');
		$this->load->view('template/footer');
	}

	public function histori_tugas_dinas()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Pengajuan Dinas';
		$this->load->view('template/header', $data);
		$this->load->view('pci/tugas_dinas/index_historis');
		$this->load->view('template/footer');
	}
	public function histori_approve_cuti()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Pengajuan Dinas';
		$this->load->view('template/header', $data);
		$this->load->view('pci/approve_cuti/index_historis');
		$this->load->view('template/footer');
	}
	public function data_approve_cuti_menyetujui()
	{
		$depts = $this->session->userdata('dept');
		$no_scan_ = $this->session->userdata('no_scan');
		$data = $this->db->query("SELECT distinct
										*,
										   CONCAT(p.kode_cuti, '-', LPAD(p.id, 7, '0')) AS fkode_cuti
									from
										permohonan_izin_cuti p
									left join (
										select
											tm.nama,
											tm.no_scan,
											tm.dept,
											tm2.no_scan as no_scan_atasan1,
											tm2.nama as nama_atasan,
										tm2.jabatan as jabatan_atasan1,
											tm3.nama as nama_atasan2,
											tm3.jabatan as jabatan_atasan2,
											tm3.no_scan as no_scan_atasan2,
											u.fcm as fcm_atasan1,
											u2.fcm as fcm_atasan2
										from
											tbl_makar tm
										left join 
									tbl_makar tm2 on
											tm.atasan1 = tm2.nama
										left join 
									tbl_makar tm3 on
											tm.atasan2 = tm3.nama
										left join 
									user u on
											tm2.no_scan = u.no_scan
										left join 
									user u2 on
											tm3.no_scan = u2.no_scan
										where
											tm2.status_aktif = 1
											and tm3.status_aktif = 1) tm on
										tm.no_scan = p.nip	
									where
									not p.ket = 'A15'and not p.status ='Verifikasi'
									and ((tm.no_scan_atasan1 = '$no_scan_' and status_approval_1 is null) 
									or(tm.no_scan_atasan2='$no_scan_' and status_approval_1 is not null and status_approval_2 is null))")->result_array();
		echo json_encode($data);
	}


	public function data_tugas_dinas_menyetujui()
	{
		$no_scan_ = $this->session->userdata('no_scan');
		$data = $this->db->query("SELECT distinct
										*,
										  CONCAT(p.kode_cuti, '-', LPAD(p.id, 7, '0')) AS fkode_cuti
									from
										permohonan_izin_cuti p
									left join (
										select
											tm.nama,
											tm.no_scan,
											tm.dept,
											tm2.no_scan as no_scan_atasan1,
											tm2.nama as nama_atasan,
											tm2.jabatan as jabatan_atasan1,
											tm3.nama as nama_atasan2,
											tm3.jabatan as jabatan_atasan2,
											tm3.no_scan as no_scan_atasan2,
											u.fcm as fcm_atasan1,
											u2.fcm as fcm_atasan2
										from
											tbl_makar tm
										left join 
									tbl_makar tm2 on
											tm.atasan1 = tm2.nama
										left join 
									tbl_makar tm3 on
											tm.atasan2 = tm3.nama
										left join 
									user u on
											tm2.no_scan = u.no_scan
										left join 
									user u2 on
											tm3.no_scan = u2.no_scan
										where
											tm2.status_aktif = 1
											and tm3.status_aktif = 1) tm on
										tm.no_scan = p.nip	
									where
									p.ket = 'A15'
									and ((tm.no_scan_atasan1 = '$no_scan_' and status_approval_1 is null) 
									or(tm.no_scan_atasan2='$no_scan_' and status_approval_1 is not null and status_approval_2 is null))")->result_array();
		echo json_encode($data);
	}
	public function data_tugas_dinas()
	{
		$no_scan_ = $this->session->userdata('no_scan');
		$data = $this->db->query("SELECT distinct
										*,
										  CONCAT(p.kode_cuti, '-', LPAD(p.id, 7, '0')) AS fkode_cuti
									from
										permohonan_izin_cuti p
									left join (
										select
											tm.nama,
											tm.no_scan,
											tm.dept,
											tm2.no_scan as no_scan_atasan1,
											tm2.nama as nama_atasan,
											tm2.jabatan as jabatan_atasan1,
											tm3.nama as nama_atasan2,
											tm3.jabatan as jabatan_atasan2,
											tm3.no_scan as no_scan_atasan2,
											u.fcm as fcm_atasan1,
											u2.fcm as fcm_atasan2
										from
											tbl_makar tm
										left join 
									tbl_makar tm2 on
											tm.atasan1 = tm2.nama
										left join 
									tbl_makar tm3 on
											tm.atasan2 = tm3.nama
										left join 
									user u on
											tm2.no_scan = u.no_scan
										left join 
									user u2 on
											tm3.no_scan = u2.no_scan
										where
											tm2.status_aktif = 1
											and tm3.status_aktif = 1) tm on
										tm.no_scan = p.nip	
									where
									p.ket = 'A15'
									and ((tm.no_scan_atasan1 = '$no_scan_' and status_approval_1 is null) 
									or(tm.no_scan_atasan2='$no_scan_' and status_approval_1 is not null and status_approval_2 is null))")->result_array();
		echo json_encode($data);
	}
	public function approval_cuti2($username)
	{
		// Mendapatkan nilai dari input
		$checked1 = $this->input->post('ket_approval_1', true);
		$checked2 = $this->input->post('ket_approval_2', true);
		$id = $this->input->post('id', true);
		$tgl_approval1 = $this->input->post('tgl_approval1', true);
		$tgl_approval2 = $this->input->post('tgl_approval2', true);
		$getalldata1 = $this->input->post('getalldata1', true);
		$getalldata2 = $this->input->post('getalldata2', true);

		// Pastikan ID ada dan valid
		if (empty($id)) {
			// Jika ID tidak valid atau kosong, hentikan proses
			return;
		}

		// Jika approval 1 diset
		if (!empty($checked1)) {
			$data = new stdClass();
			$data->status_approval_1 = $checked1;
			$data->disetujui_nama_1 = $this->input->post('user_approval1');
			$data->disetujui_jabatan_1 = $this->input->post('jabatan_atasan1', true);
			$data->tgl_diset_mengetehui = $tgl_approval1;
			$data->tgl_approval_1 = $tgl_approval1;
			$data->hash_approval1 = $getalldata1;

			// Update hanya berdasarkan ID yang diberikan
			$this->db->where('id', $id);
			$this->db->update('permohonan_izin_cuti', $data);

			// Ambil data berdasarkan ID
			$query = $this->db->query("SELECT DISTINCT
                                tm.no_scan,
                                tm.nama,
                                tm.dept,
                                tm.jabatan,
                                CONCAT(pic.kode_cuti, '-', pic.id) AS kode_cuti, 
                                DATE_FORMAT(pic.tgl_mulai, '%d %M %Y') AS ftgl_mulai,
                                DATE_FORMAT(pic.tgl_selesai, '%d %M %Y') AS ftgl_selesai,
                                pic.lama_izin,
                                pic.alasan,
                                pic.no_scan_atasan_1,
                                pic.no_scan_atasan_2,
                                pic.status_approval_1,
                                pic.status_approval_2,
                                u.email
                                FROM permohonan_izin_cuti pic
                                LEFT JOIN (SELECT nama, no_scan, dept, jabatan FROM tbl_makar WHERE status_aktif = 1) tm 
                                    ON tm.no_scan = pic.nip 
                                LEFT JOIN `user` u ON u.no_scan = pic.no_scan_atasan_2
                                WHERE pic.id = '$id' AND NOT pic.status = 'Verifikasi' 
                                AND pic.id IN (SELECT MAX(id) FROM permohonan_izin_cuti GROUP BY nip)
    ")->row();

			if (!$query) {
				// Data tidak ditemukan
				return;
			}

			$email_atasan2 = $query->email;
			$kode_cuti = $query->kode_cuti;
			$no_scan_atasan2 = $query->no_scan_atasan_2;

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();

			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host = 'mail.indotaichen.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'dept.it@indotaichen.com';
			$mail->Password = 'Xr7PzUWoyPA';
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

			// Tambahkan alamat email penerima
			if ($no_scan_atasan2 == 1) {
				$mail->addAddress('prs@indotaichen.com');
			} else {
				$mail->addAddress($email_atasan2);
			}

			// Tentukan subjek dan body email
			$mail->Subject = 'Permohonan pengajuan cuti';
			$mail->isHTML(true);

			$mailContent = "<html>
                        <head></head>
                        <body>
                            <br>
                            Dengan hormat, <br>
                            Berikut Data karyawan yang mengajukan Permohonan Izin Cuti : $kode_cuti <br>
                            Nomor Absen : $query->no_scan <br>
                            Nama karyawan : $query->nama<br>
                            Departemen :  $query->dept  <br>
                            Jabatan : $query->jabatan <br>
                            Tanggal Permohonan :  $query->ftgl_mulai <br>
                            Tanggal Selesai :  $query->ftgl_selesai  <br>
                            Lama Izin :  $query->lama_izin <br>
                            Alasan :  $query->alasan <br>
                            Status Approve Atasan 1 : $query->status_approval_1 <br>
							<br>
							Dimohon untuk login untuk approve permohonan tersebut di halaman <br> 
							<a href='https://online.indotaichen.com/personalia/approve_cuti_menyetujui </a><br>
                            Terimakasih
                            <br>
                        </body>
                    </html>";
			$mail->Body = $mailContent;

			if (!$mail->send()) {
				// Log error jika email gagal dikirim
				log_message('error', 'Email gagal dikirim ke: ' . $mail->ErrorInfo);
			}
			redirect('pci/approve_cuti_menyetujui');
		}

		// Jika approval 2 diset
		elseif (!empty($checked2)) {
			$data = new stdClass();
			$data->status_approval_2 = $checked2;
			$data->disetujui_nama_2 = $this->input->post('user_approval2');
			$data->disetujui_jabatan_2 = $this->input->post('jabatan_atasan2', true);
			$data->tgl_approval_2 = $tgl_approval2;
			$data->hash_approval2 = $getalldata2;

			// Update hanya berdasarkan ID yang diberikan
			$this->db->where('id', $id);
			$this->db->update('permohonan_izin_cuti', $data);

			// Ambil data berdasarkan ID
			$query = $this->db->query("SELECT DISTINCT
                                tm.no_scan,
                                tm.nama,
                                tm.dept,
                                tm.jabatan,
                                CONCAT(pic.kode_cuti, '-', pic.id) AS kode_cuti, 
                                DATE_FORMAT(pic.tgl_mulai, '%d %M %Y') AS ftgl_mulai,
                                DATE_FORMAT(pic.tgl_selesai, '%d %M %Y') AS ftgl_selesai,
                                pic.lama_izin,
                                pic.alasan,
                                pic.no_scan_atasan_1,
                                pic.no_scan_atasan_2,
                                pic.status_approval_1,
                                pic.status_approval_2,
                                u.email
                                FROM permohonan_izin_cuti pic
                                LEFT JOIN (SELECT nama, no_scan, dept, jabatan FROM tbl_makar WHERE status_aktif = 1) tm 
                                    ON tm.no_scan = pic.nip 
                                LEFT JOIN `user` u ON u.no_scan = pic.no_scan_atasan_2
                                WHERE pic.id = '$id' AND NOT pic.status = 'Verifikasi' 
                                AND pic.id IN (SELECT MAX(id) FROM permohonan_izin_cuti GROUP BY nip)
    ")->row();

			if (!$query) {
				// Data tidak ditemukan
				return;
			}

			$email_atasan2 = $query->email;
			$kode_cuti = $query->kode_cuti;
			$no_scan_atasan2 = $query->no_scan_atasan_2;

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();

			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host = 'mail.indotaichen.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'dept.it@indotaichen.com';
			$mail->Password = 'Xr7PzUWoyPA';
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

			$mail->addAddress('prs@indotaichen.com');

			// Tentukan subjek dan body email
			$mail->Subject = 'Permohonan pengajuan cuti';
			$mail->isHTML(true);

			$mailContent = "<html>
                        <head></head>
                        <body>
                            <br>
                            Dengan hormat, <br>
                            Berikut Data karyawan yang mengajukan Permohonan Izin Cuti : $kode_cuti <br>
                            Nomor Absen : $query->no_scan <br>
                            Nama karyawan : $query->nama<br>
                            Departemen :  $query->dept  <br>
                            Jabatan : $query->jabatan <br>
                            Tanggal Permohonan :  $query->ftgl_mulai <br>
                            Tanggal Selesai :  $query->ftgl_selesai  <br>
                            Lama Izin :  $query->lama_izin <br>
                            Alasan :  $query->alasan <br>
                           	Status Approve Atasan 1 : $query->status_approval_1 <br>
                            Status Approve Atasan 2 : $query->status_approval_2 <br>
                            Terimakasih
                            <br>
                        </body>
                    </html>";
			$mail->Body = $mailContent;

			if (!$mail->send()) {
				// Log error jika email gagal dikirim
				log_message('error', 'Email gagal dikirim ke: ' . $mail->ErrorInfo);
			}
			redirect('pci/approve_cuti_menyetujui');
		}
	}

	public function approval_tugas_dinas1($username)
	{
		// Mendapatkan nilai dari input
		$checked1 = $this->input->post('ket_approval_1', true);
		$checked2 = $this->input->post('ket_approval_2', true);
		$id = $this->input->post('id', true);
		$tgl_approval1 = $this->input->post('tgl_approval1', true);
		$tgl_approval2 = $this->input->post('tgl_approval2', true);
		$getalldata1 = $this->input->post('getalldata1', true);
		$getalldata2 = $this->input->post('getalldata2', true);

		// Pastikan ID ada dan valid
		if (empty($id)) {
			// Jika ID tidak valid atau kosong, hentikan proses
			return;
		}

		// Jika approval 1 diset
		if (!empty($checked1)) {
			$data = new stdClass();
			$data->status_approval_1 = $checked1;
			$data->disetujui_nama_1 = $this->input->post('user_approval1');
			$data->disetujui_jabatan_1 = $this->input->post('jabatan_atasan1', true);
			$data->tgl_diset_mengetehui = $tgl_approval1;
			$data->tgl_approval_1 = $tgl_approval1;
			$data->hash_approval1 = $getalldata1;

			// Update hanya berdasarkan ID yang diberikan
			$this->db->where('id', $id);
			$this->db->update('permohonan_izin_cuti', $data);

			// Ambil data berdasarkan ID
			$query = $this->db->query("SELECT DISTINCT
                                tm.no_scan,
                                tm.nama,
                                tm.dept,
                                tm.jabatan,
                                CONCAT(pic.kode_cuti, '-', pic.id) AS kode_cuti, 
                                DATE_FORMAT(pic.tgl_mulai, '%d %M %Y') AS ftgl_mulai,
                                DATE_FORMAT(pic.tgl_selesai, '%d %M %Y') AS ftgl_selesai,
                                pic.lama_izin,
                                pic.alasan,
                                pic.no_scan_atasan_1,
                                pic.no_scan_atasan_2,
                                pic.status_approval_1,
                                pic.status_approval_2,
                                u.email
                                FROM permohonan_izin_cuti pic
                                LEFT JOIN (SELECT nama, no_scan, dept, jabatan FROM tbl_makar WHERE status_aktif = 1) tm 
                                    ON tm.no_scan = pic.nip 
                                LEFT JOIN `user` u ON u.no_scan = pic.no_scan_atasan_1
                                WHERE pic.id = '$id' AND NOT pic.status = 'Verifikasi' 
                                AND pic.id IN (SELECT MAX(id) FROM permohonan_izin_cuti GROUP BY nip)
    ")->row();

			if (!$query) {
				// Data tidak ditemukan
				return;
			}

			$email_atasan2 = $query->email;
			$kode_cuti = $query->kode_cuti;
			$no_scan_atasan2 = $query->no_scan_atasan_2;

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();

			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host = 'mail.indotaichen.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'dept.it@indotaichen.com';
			$mail->Password = 'Xr7PzUWoyPA';
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

			// Tambahkan alamat email penerima
			if ($no_scan_atasan2 == 1 || $no_scan_atasan2 == 55) {
				$mail->addAddress('prs@indotaichen.com');
			} else {
				$mail->addAddress($email_atasan2);
			}

			// Tentukan subjek dan body email
			$mail->Subject = 'Permohonan Pengajuan Dinas';
			$mail->isHTML(true);

			$mailContent = "<html>
                        <head></head>
                        <body>
                            <br>
                            Dengan hormat, <br>
                            Berikut Data karyawan yang mengajukan Permohonan Tugas Dinas : $kode_cuti <br>
                            Nomor Absen : $query->no_scan <br>
                            Nama karyawan : $query->nama<br>
                            Departemen :  $query->dept  <br>
                            Jabatan : $query->jabatan <br>
                            Tanggal Permohonan :  $query->ftgl_mulai <br>
                            Tanggal Selesai :  $query->ftgl_selesai  <br>
                            Lama Izin :  $query->lama_izin <br>
                            Alasan Dinas:  $query->alasan <br>
                            Status Approve Atasan 1 : $query->status_approval_1 <br>
                            Terimakasih
                            <br>
                        </body>
                    </html>";
			$mail->Body = $mailContent;

			if (!$mail->send()) {
				// Log error jika email gagal dikirim
				log_message('error', 'Email gagal dikirim ke: ' . $mail->ErrorInfo);
			}
			// Redirect setelah update
			redirect('pci/tugas_dinas_menyetujui');
		}

		// Jika approval 2 diset
		elseif (!empty($checked2)) {
			$data = new stdClass();
			$data->status_approval_2 = $checked2;
			$data->disetujui_nama_2 = $this->input->post('user_approval2');
			$data->disetujui_jabatan_2 = $this->input->post('jabatan_atasan2', true);
			$data->tgl_approval_2 = $tgl_approval2;
			$data->hash_approval2 = $getalldata2;

			// Update hanya berdasarkan ID yang diberikan
			$this->db->where('id', $id);
			$this->db->update('permohonan_izin_cuti', $data);

			// Ambil data berdasarkan ID
			$query = $this->db->query("SELECT DISTINCT
                                tm.no_scan,
                                tm.nama,
                                tm.dept,
                                tm.jabatan,
                                CONCAT(pic.kode_cuti, '-', pic.id) AS kode_cuti, 
                                DATE_FORMAT(pic.tgl_mulai, '%d %M %Y') AS ftgl_mulai,
                                DATE_FORMAT(pic.tgl_selesai, '%d %M %Y') AS ftgl_selesai,
                                pic.lama_izin,
                                pic.alasan,
                                pic.no_scan_atasan_1,
                                pic.no_scan_atasan_2,
                                pic.status_approval_1,
                                pic.status_approval_2,
                                u.email
                                FROM permohonan_izin_cuti pic
                                LEFT JOIN (SELECT nama, no_scan, dept, jabatan FROM tbl_makar WHERE status_aktif = 1) tm 
                                    ON tm.no_scan = pic.nip 
                                LEFT JOIN `user` u ON u.no_scan = pic.no_scan_atasan_2
                                WHERE pic.id = '$id' AND NOT pic.status = 'Verifikasi' 
                                AND pic.id IN (SELECT MAX(id) FROM permohonan_izin_cuti GROUP BY nip)
    ")->row();

			if (!$query) {
				// Data tidak ditemukan
				return;
			}

			$email_atasan2 = $query->email;
			$kode_cuti = $query->kode_cuti;
			$no_scan_atasan2 = $query->no_scan_atasan_2;

			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();

			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host = 'mail.indotaichen.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'dept.it@indotaichen.com';
			$mail->Password = 'Xr7PzUWoyPA';
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');


			$mail->addAddress('prs@indotaichen.com');


			// Tentukan subjek dan body email
			$mail->Subject = 'Permohonan Pengajuan Dinas';
			$mail->isHTML(true);

			$mailContent = "<html>
                        <head></head>
                        <body>
                            <br>
                            Dengan hormat, <br>
                            Berikut Data karyawan yang mengajukan Tugas Dinas : $kode_cuti <br>
                            Nomor Absen : $query->no_scan <br>
                            Nama karyawan : $query->nama<br>
                            Departemen :  $query->dept  <br>
                            Jabatan : $query->jabatan <br>
                            Tanggal Permohonan :  $query->ftgl_mulai <br>
                            Tanggal Selesai :  $query->ftgl_selesai  <br>
                            Lama Izin :  $query->lama_izin <br>
                            Alasan Dinas:  $query->alasan <br>
                           	Status Approve Atasan 1 : $query->status_approval_1 <br>
                            Status Approve Atasan 2 : $query->status_approval_2 <br>

							Dimohon untuk login untuk verifikasi permohonan tersebut di <a href='https://online.indotaichen.com/personalia/pci/show_verifikasi_cuti_approve </a><br>
                            Terimakasih
                            <br>
                        </body>
                    </html>";
			$mail->Body = $mailContent;

			if (!$mail->send()) {
				// Log error jika email gagal dikirim
				log_message('error', 'Email gagal dikirim ke: ' . $mail->ErrorInfo);
			}
			redirect('pci/tugas_dinas_menyetujui');
		}
	}
	public function generate_cuti()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Time Attendance | Generate Cuti';
		$this->load->view('template/header', $data);
		$this->load->view('pci/generate_cuti/index');
		$this->load->view('template/footer');
	}

	public function histori_cuti($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();
		$data['no_scan'] = $no_scan;

		$data['title'] = 'Time Attendance | Generate Cuti';
		$this->load->view('template/header', $data);
		$this->load->view('pci/generate_cuti/histori');
		$this->load->view('template/footer');
	}

	public function import_excell_cuti()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			//upload gagal
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
			//redirect halaman
			redirect('pci/generate_cuti');
		} else {
			$data_upload = $this->upload->data();

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'no_scan' => $row['C'],
						'sisa_cuti' => $row['AH']
					));
				}
				$numrow++;

				// input histori izin cuti 
				$data_histori = array(
					'kode_cuti' => "HIC-" . date('Ym'), //HISTORI IMPORT CUTI
					'nip' => $row['C'], //Row C adalah letak no scan
					'dept' => $row['B'],
					'saldo_cuti' => $row['AH'],
					'days_or_month' => "Hari",
					'ket' => "th." . date('Y'),
					'alasan' => "Import data cuti oleh personalia"
				);
				$this->db->insert('permohonan_izin_cuti', $data_histori);
			}
			$this->db->update_batch('tbl_makar', $data, 'no_scan');

			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

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
			foreach ($sheet as $value) {
				$data = array(
					'no_scan' => $value['no_scan'],
					'sisa_cuti' => 12
				);
				$this->db->where('no_scan', $value['no_scan']);
				$this->db->update('tbl_makar', $data);

				// input histori izin cuti 
				$data_histori = array(
					'kode_cuti' => "GEN-" . date('Ym'), //HISTORI IMPORT CUTI
					'nip' => $value['no_scan'],
					'dept' => $value['dept'],
					'saldo_cuti' => 12,
					'days_or_month' => "Hari",
					'ket' => "th." . date('Y'),
					'alasan' => "Saldo cuti telah digenerate kembali"
				);
				$this->db->insert('permohonan_izin_cuti', $data_histori);
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES GENERATE BERHASIL!</b> Data berhasil digenerate!</div>');
			redirect('pci/generate_cuti');
		} else {
			$sql_sheet = "SELECT *,
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
			$sheet_gen = $this->db->query($sql_sheet . " LIMIT 1 ")->row();
			$sheet = $this->db->query($sql_sheet)->result_array();
			foreach ($sheet as $value) {
				if ($value['sisa_cuti'] <= 0) {
					$saldosisacuti = 12 + $value['sisa_cuti'];
				} else {
					$saldosisacuti = 12;
				}

				$data = array(
					'no_scan' => $value['no_scan'],
					'sisa_cuti' => $saldosisacuti
				);
				$this->db->where('no_scan', $value['no_scan']);
				$this->db->update('tbl_makar', $data);

				if ($value['sisa_cuti']) {
					$alasan = "Sisa cuti " . $value['sisa_cuti'] . " telah dibayarkan.";
				} else {
					$alasan = "Tidak ada sisa cuti yang dibayarkan. Sisa cuti habis.";
				}

				// input histori izin cuti 
				$data_histori = array(
					'kode_cuti' => "GEN-" . date('Ym'), //HISTORI IMPORT CUTI
					'nip' => $value['no_scan'],
					'dept' => $value['dept'],
					'saldo_cuti' => $saldosisacuti,
					'days_or_month' => "Hari",
					'ket' => "th." . date('Y'),
					'alasan' => $alasan
				);
				$this->db->insert('permohonan_izin_cuti', $data_histori);

			}
			// input GENERATED cuti 
			$data_generated = array(
				'awal' => $sheet_gen->pgenerate,
				'tgl_generate' => DATE('Y-m-d'),
				'status_generated' => 'GENERATED'
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
		if ($sisacuti->sisa_cuti) {
			$alasan = "Sisa cuti " . $sisacuti->sisa_cuti . " telah dibayarkan.";
		} else {
			$alasan = "Tidak ada sisa cuti yang dibayarkan. Sisa cuti habis.";
		}
		// input histori izin cuti 
		$data_histori = array(
			'kode_cuti' => "GEN-" . date('Ym'), //HISTORI IMPORT CUTI
			'nip' => $no_scan,
			'dept' => $sisacuti->dept,
			'saldo_cuti' => 0,
			'days_or_month' => "Hari",
			'ket' => "th." . date('Y'),
			'alasan' => $alasan
		);
		$this->db->insert('permohonan_izin_cuti', $data_histori);

		$data = array(
			'no_scan' => $no_scan,
			'sisa_cuti' => 0
		);
		$this->db->where('no_scan', $no_scan);
		$this->db->update('tbl_makar', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES GENERATE KARYAWAN BERHASIL!</b> Data berhasil digenerate!</div>');
		redirect('pci/generate_cuti');
	}

	public function annual_leave()
	{
		$al = $this->input->post('annual_leave', true);
		$dept = $this->input->post('dept', true);
		$history = $this->input->post('history', true);
		$this->db->where('status_karyawan', 'Tetap');
		$this->db->where('status_aktif', 1);
		$this->db->where_in('dept', $dept);
		$kartap = $this->db->get('tbl_makar')->result_array();

		foreach ($kartap as $kt):
			$data_cuti = array(
				'sisa_cuti' => $kt['sisa_cuti'] - $al
			);
			$this->db->where('no_scan', $kt['no_scan']);
			$this->db->where_in('dept', $dept);
			$this->db->update('tbl_makar', $data_cuti);

			if ($history) { //jika keterangan histori di input manual
				$data = array(
					'kode_cuti' => "HCT-" . date('Ym'),
					'nip' => $kt['no_scan'],
					'dept' => $kt['dept'],
					'lama_izin' => $al,
					'days_or_month' => "Hari",
					'ket' => "Cuti",
					'alasan' => $history
				);
				$this->db->insert('permohonan_izin_cuti', $data);
			} else {
				$data = array(
					'kode_cuti' => "HCT-" . date('Ym'),
					'nip' => $kt['no_scan'],
					'dept' => $kt['dept'],
					'lama_izin' => $al,
					'days_or_month' => "Hari",
					'ket' => "Cuti",
					'alasan' => "Potongan Cuti Tahun " . date('Y')
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
		$al = $this->input->post('annual_leave', true);
		$no_scan = $this->input->post('no_scan', true);
		$history = $this->input->post('history', true);

		$this->db->where_in('no_scan', $no_scan);
		$kartap = $this->db->get('tbl_makar')->result_array();

		foreach ($kartap as $kt):
			$data_cuti = array(
				'sisa_cuti' => $kt['sisa_cuti'] - $al
			);
			$this->db->where('no_scan', $kt['no_scan']);
			$this->db->update('tbl_makar', $data_cuti);

			if ($history) {
				// input histori izin cuti dipotong tahunan berdasarkan departemen yang dipilih
				$data = array(
					'kode_cuti' => "HCT-" . date('Ym'),
					'nip' => $kt['no_scan'],
					'dept' => $kt['dept'],
					'lama_izin' => $al,
					'days_or_month' => "Hari",
					'ket' => "Cuti",
					'alasan' => $history
				);
				$this->db->insert('permohonan_izin_cuti', $data);
			} else {
				// input histori izin cuti dipotong tahunan berdasarkan departemen yang dipilih
				$data = array(
					'kode_cuti' => "HCT-" . date('Ym'),
					'nip' => $kt['no_scan'],
					'dept' => $kt['dept'],
					'lama_izin' => $al,
					'days_or_month' => "Hari",
					'ket' => "Cuti",
					'alasan' => "Potongan Cuti Karyawan " . date('Y')
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
		$history2 = $this->input->post('history2', true);
		$hutang_cuti = $this->input->post('hutang_cuti', true);
		$no_scan = $this->input->post('no_scan', true);

		$this->db->where_in('no_scan', $no_scan);
		$sql_sheet = $this->db->get('tbl_makar')->result_array();
		foreach ($sql_sheet as $value) {
			if ($value['sisa_cuti'] <= 0) {
				$saldosisacuti = $al2 + $value['sisa_cuti'];
			} else {
				$saldosisacuti = 0;
			}

			$data = array(
				'no_scan' => $value['no_scan'],
				'sisa_cuti' => $hutang_cuti
			);
			$this->db->where('no_scan', $value['no_scan']);
			$this->db->update('tbl_makar', $data);

			// input histori izin cuti 
			$data_histori = array(
				'kode_cuti' => "GEN-" . date('Ym'), //HISTORI IMPORT CUTI
				'nip' => $value['no_scan'],
				'dept' => $value['dept'],
				'saldo_cuti' => $al2,
				'days_or_month' => "Hari",
				'ket' => "th." . date('Y'),
				'alasan' => $history2
			);
			$this->db->insert('permohonan_izin_cuti', $data_histori);

		}
		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Pembayaran sisa cuti karyawan Pemutihan berhasil</b></center>');
		redirect('pci/generate_cuti');

	}
	public function annual_leave_personal3()
	{
		$al2 = $this->input->post('annual_leave2', true);
		$history2 = $this->input->post('history2', true);
		$hutang_cuti = $this->input->post('hutang_cuti', true);
		$no_scan = $this->input->post('no_scan', true);

		$this->db->where_in('no_scan', $no_scan);
		$sql_sheet = $this->db->get('tbl_makar')->result_array();
		foreach ($sql_sheet as $value) {
			if ($value['sisa_cuti'] <= 0) {
				$saldosisacuti = $al2 + $value['sisa_cuti'];
			} else {
				$saldosisacuti = 0;
			}

			$data = array(
				'no_scan' => $value['no_scan'],
				'sisa_cuti' => $hutang_cuti
			);
			$this->db->where('no_scan', $value['no_scan']);
			$this->db->update('tbl_makar', $data);

			// input histori izin cuti 
			$data_histori = array(
				'kode_cuti' => "GEN-" . date('Ym'), //HISTORI IMPORT CUTI
				'nip' => $value['no_scan'],
				'dept' => $value['dept'],
				'saldo_cuti' => $al2,
				'days_or_month' => "Hari",
				'ket' => "th." . date('Y'),
				'alasan' => $history2
			);
			$this->db->insert('permohonan_izin_cuti', $data_histori);

		}
		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Pembayaran sisa cuti karyawan Pemutihan berhasil</b></center>');
		redirect('pci/index2');

	}
}