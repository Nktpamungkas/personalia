<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('dual_db_model');

		// load base_url
		$this->load->helper('url');
		// Load Model
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Employee Information';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/index');
		$this->load->view('template/footer');
	}

	public function data_employee()
	{
		$data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        jabatan,
                                        upper(bagian) as bagian,
                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                        case 
                                            when status_karyawan = 'Tetap' then  DATE_FORMAT(tgl_tetap, '%d-%m-%Y')
                                            else '-'
                                        end AS tgl_tetap,
                                        upper(status_karyawan) as  status_karyawan
                                    FROM tbl_makar
                                    WHERE NOT status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status'  
                                    ORDER BY nama ASC ")->result_array();
		echo json_encode($data);
	}

	public function data_employee_temp()
	{
		$data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        jabatan,
                                        bagian,
                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                        status_verifikasi
                                    FROM tbl_makar_temp
                                    WHERE NOT status_verifikasi = 'VERIFIED'
                                    ORDER BY nama ASC ")->result_array();
		echo json_encode($data);
	}

	public function per_dpt()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Employee Dept. Information';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/index_dpt');
		$this->load->view('template/footer');
	}

	public function data_employee_dpt($dept)
	{
		$data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        jabatan,
                                        alamat_domisili,
                                        no_hp,
                                        email_pribadi,
                                        status_karyawan,
                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk
                                    FROM tbl_makar 
                                    WHERE dept = '$dept' 
                                        AND NOT status_karyawan = 'Resigned' 
                                        AND NOT status_karyawan = 'perubahan_status' 
                                        ORDER BY nama ASC")->result_array();
		echo json_encode($data);
	}

	public function search_gaji()
	{
		$dataSearch = $this->db->query("SELECT * FROM tbl_gaji LIMIT 1")->result();
		echo json_encode($dataSearch);
	}

	public function ExportToExcell()
	{
		$this->load->view('data_karyawan/export_excel');
	}

	public function ExportToExcell_verified()
	{
		$this->load->view('data_karyawan/export_excel_verif');
	}
	public function print_datakaryawan($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
		$data['makar'] = $this->db->query("SELECT *, date_format(tk.kontrak_awal, '%d') AS tgl_masuk_hari, date_format(tk.kontrak_awal, '%M') AS tgl_masuk_bulan, date_format(tk.kontrak_awal, '%y') AS tgl_masuk_tahun,SUBSTR(makar.alamat_domisili, 1, LOCATE('RT', makar.alamat_domisili)-1) as Domisili,SUBSTR(SUBSTR(makar.alamat_domisili, LOCATE('/', makar.alamat_domisili)+ 1), LOCATE('/', SUBSTR(makar.alamat_domisili, LOCATE('/', makar.alamat_domisili)+ 1))+ 13) AS  kelurahan
		FROM tbl_makar makar  
		left join tbl_kontrak tk on
		tk.no_scan = makar.no_scan 
		WHERE makar.no_scan = '$no_scan'")->row();
		$data['no_scan'] = $no_scan;

		$data['title'] = 'Print Data Karyawan';
		$this->load->view('data_karyawan/print', $data);
	}

	public function tanda_tangan($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Tanda Tangan';
		$data['no_scan'] = $no_scan;
		$this->load->view('data_karyawan/ttd', $data);
	}

	public function addttd($no_scan)
	{
		$data = array(
			'ttd' => $this->input->post('ttd', true)
		);
		$this->db->where('no_scan', $no_scan);
		$this->db->update('tbl_makar', $data);
		$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Tanda tangan berhasil dibuat</b></center>');
		redirect($this->agent->referrer());
	}

	//tampil username
	public function tampil_username()
	{
		$user_data = array(
			'id' => $id->id,
			'name' => $id->name,
			'name' => $username,
			'logged_in' => true
		);
	}

	// START ADD NEW EMPLOYEE
	public function addNewEmployee()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'
		// echo 'selemat datang ' . $data['user']['name'];
		$data['title'] = 'Add New Employee';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/add');
		$this->load->view('template/footer');
	}

	public function add($username)
	{
		$this->form_validation->set_rules('no_scan', 'Nomor Scan', 'required|trim|is_unique[tbl_makar.no_scan]', array(
			'is_unique' => 'This nomor scan has already used!'
		));
		$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|trim|is_unique[tbl_makar.no_ktp]', array(
			'is_unique' => 'This nomor KTP has already used!'
		));

		if ($this->form_validation->run() == false) {
			$this->addNewEmployee();
		} else {
			$tglmasuk = $this->input->post('tgl_masuk', true);
			$tgl_seragam = date('Y-m-d', strtotime('+6 month', strtotime($tglmasuk)));

			$data = array(
				'no_ktp' => $this->input->post('no_ktp', true),
				'no_scan' => $this->input->post('no_scan', true),
				'nama' => $this->input->post('nama', true),
				'tempat_lahir' => $this->input->post('tempat_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'alamat_ktp' => $this->input->post('alamat_ktp', true),
				'alamat_domisili' => $this->input->post('alamat_domisili', true),
				'RT' => $this->input->post('RT', true),
				'RW' => $this->input->post('RW', true),
				'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
				'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
				'kode_pos' => $this->input->post('kode_pos', true),
				'status_rumah' => $this->input->post('status_rumah', true),
				'agama' => $this->input->post('agama', true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'status_kel' => $this->input->post('status_kel', true),
				'nama_sekolah' => $this->input->post('nama_sekolah', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'jurusan' => $this->input->post('jurusan', true),
				'ipk' => $this->input->post('ipk', true),
				'gol_darah' => $this->input->post('gol_darah', true),
				'email_pribadi' => $this->input->post('email_pribadi', true),
				'no_hp' => $this->input->post('no_hp', true),
				'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
				'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
				'tgl_masuk' => $this->input->post('tgl_masuk', true),
				'status_karyawan' => $this->input->post('status_karyawan', true),
				'tgl_tetap' => $this->input->post('tgl_tetap', true),
				'golongan' => $this->input->post('golongan', true),
				'jabatan' => $this->input->post('jabatan', true),
				'dept' => $this->input->post('dept', true),
				'bagian' => $this->input->post('bagian', true),
				'atasan1' => $this->input->post('atasan1', true),
				'atasan2' => $this->input->post('atasan2', true),
				'no_bpjs_tk' => $this->input->post('no_bpjs_tk', true),
				'no_bpjs_kes' => $this->input->post('no_bpjs_kes', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'status_aktif' => $this->input->post('status_aktif', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'npwp' => $this->input->post('npwp', true),
				'alamat_npwp' => $this->input->post('alamat_npwp', true),
				'kartu_keluarga' => $this->input->post('kartu_keluarga', true),
				'masa_berlaku_ktp' => $this->input->post('masa_berlaku_ktp', true),
				'tgl_seragam' => $tgl_seragam,
				'status_seragam' => $this->input->post('status_seragam', true),
				'status_idcard' => $this->input->post('status_seragam', true),
				'tgl_evaluasi' => $this->input->post('tgl_evaluasi', true)
			);
			$this->db->insert('tbl_makar', $data);

			$data2 = array(
				'nik' => '0000' . $this->input->post('no_scan', true),
				'nama' => $this->input->post('nama', true),
				'dept' => $this->input->post('dept', true),
				'idk' => $this->input->post('no_scan', true),
				'jk' => $this->input->post('jk', true),
				'email' => $this->input->post('email_pribadi', true),
				'tgl_masuk' => $this->input->post('tgl_masuk', true),
				'sts' => substr($this->input->post('status_karyawan', true), 0, 1),
				'tgl_tetap' => $this->input->post('tgl_tetap', true),
				'spsi' => '1',
				'bpjstk' => '1',
				'bpjskes' => '1',
				'jabatan' => $this->input->post('jabatan', true),
				'aktif' => $this->input->post('status_aktif', true)
			);
			$this->dual_db_model->save_data_to_both_databases($data2);

			$id = $this->input->post('no_scan', true);
			// var_dump($no_scan);

			$data = array(
				'dept' => $this->input->post('dept', true),
				'bagian' => $this->input->post('bagian', true),
				'tgl_verif' => DATE('Y-m-d H:i:s'),
				'status_verifikasi' => 'VERIFIED'

			);
			$this->db->where('no_scan', $id);
			$this->db->update('tbl_makar_temp', $data);

			$this->tambah_data_keluarga();
			$this->tambah_data_pengalaman_kerja();


			// KIRIM EMAIL KARYAWAN BARU
			$noscan = $this->input->post('no_scan', true);
			$dept = $this->input->post('dept', true);

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
                                            LEFT JOIN dept_mail_2 dm ON dm.code = makar.dept 
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
			$mail->SMTPSecure = 'TLS';
			$mail->Port = 587;

			$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
			$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

			if ($dept == 'MKT') {
				// Menambahkan penerima
				$mail->addAddress('bunbun@indotaichen.com');
				$mail->addAddress('bambang@indotaichen.com');
				$mail->addAddress('frans@indotaichen.com');
				$mail->addAddress('suhemi@indotaichen.com');
				$mail->addAddress('stefanus.pranjana@indotaichen.com');
				$mail->addAddress('Iso.hrd@indotaichen.com');
				$mail->addAddress('Hrd@indotaichen.com');
				$mail->addAddress('meyliana@indotaichen.com');
				// $mail->addAddress('bintoro.dy@indotaichen.com');/
				$mail->addAddress('asep.pauji@indotaichen.com');
				$mail->addAddress('prs.absensi@indotaichen.com');
				$mail->addAddress('prs01@indotaichen.com');
				$mail->addAddress($dept_mail1);
				$mail->addAddress($dept_mail2);
				$mail->addAddress($dept_mail3);
				$mail->addAddress($dept_mail4);
				$mail->addAddress($dept_mail5);
			} else {
				// Menambahkan penerima
				$mail->addAddress('stefanus.pranjana@indotaichen.com');
				$mail->addAddress('Iso.hrd@indotaichen.com');
				$mail->addAddress('Hrd@indotaichen.com');
				$mail->addAddress('prs.absensi@indotaichen.com');
				$mail->addAddress('prs01@indotaichen.com');
				$mail->addAddress('meyliana@indotaichen.com');
				// $mail->addAddress('bintoro.dy@indotaichen.com');
				$mail->addAddress('asep.pauji@indotaichen.com');
				$mail->addAddress($dept_mail1);
				$mail->addAddress($dept_mail2);
				$mail->addAddress($dept_mail3);
				$mail->addAddress($dept_mail4);
				$mail->addAddress($dept_mail5);
			}

			$mail->Subject = 'Informasi Karyawan baru';
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

			// Script log new employee 1
			$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
			$log = array(
				'username' => $username,
				'no_scan' => $this->input->post('no_scan', true),
				'tgl' => time(),
				'keterangan' => gethostbyaddr($ipaddress)
			);
			$this->db->insert('log_new_employee_1', $log);

			if (!$mail->send()) {
				echo 'Pesan tidak dapat dikirim.';
				echo 'Mailer Error: ' .
					$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been created and Email not successfully sent.</b>' . $mail->ErrorInfo . '</center>');
			} else {
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Employee has been created and Email successfully sent.</b></center>');
			}
			redirect('data_karyawan');
		}
	}
	// END ADD NEW EMPLOYEE


	public function tampil($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'

		$data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row(); //Select * from tbl_makar where no_scan = '$no_scan'
		$data['no_scan'] = $no_scan;

		$data['title'] = 'Edit Employed';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/tampil', $data);
		$this->load->view('template/footer');
	}


	// START EDIT NEW EMPLOYEE
	public function edit($username)
	{
		$no_scan = $this->input->post('no_scan', true);
		$tgl_tetap = $this->input->post('tgl_tetap', true);
		$data = array(
			'no_ktp' => $this->input->post('no_ktp', true),
			'nama' => $this->input->post('nama', true),
			'tempat_lahir' => $this->input->post('tempat_lahir', true),
			'tgl_lahir' => $this->input->post('tgl_lahir', true),
			'alamat_ktp' => $this->input->post('alamat_ktp', true),
			'alamat_domisili' => $this->input->post('alamat_domisili', true),
			'RT' => $this->input->post('RT', true),
			'RW' => $this->input->post('RW', true),
			'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
			'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
			'kode_pos' => $this->input->post('kode_pos', true),
			'status_rumah' => $this->input->post('status_rumah', true),
			'agama' => $this->input->post('agama', true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
			'status_kel' => $this->input->post('status_kel', true),
			'nama_sekolah' => $this->input->post('nama_sekolah', true),
			'pendidikan' => $this->input->post('pendidikan', true),
			'jurusan' => $this->input->post('jurusan', true),
			'ipk' => $this->input->post('ipk', true),
			'gol_darah' => $this->input->post('gol_darah', true),
			'email_pribadi' => $this->input->post('email_pribadi', true),
			'no_hp' => $this->input->post('no_hp', true),
			'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
			'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
			'tgl_resign' => $this->input->post('tgl_resign', true),
			'status_seragam' => $this->input->post('status_seragam', true),
			'tgl_evaluasi' => $this->input->post('tgl_evaluasi', true)

		);
		$this->db->where('no_scan', $this->input->post('no_scan', true));
		$this->db->update('tbl_makar', $data);

		$data2 = array(
			'tgl_tetap' => $tgl_tetap
		);
		$this->dual_db_model->update_data_in_second_database('tblkrynhrd', 'idk', $no_scan, $data2);

		$this->tambah_data_keluarga();
		$this->tambah_data_pengalaman_kerja();
		$this->edit_data_keluarga();
		$this->edit_data_pengalaman_kerja();

		// Script log edit employee 1
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log = array(
			'username' => $username,
			'no_scan' => $this->input->post('no_scan', true),
			'tgl' => time(),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_update_employee_1', $log);

		$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Editing Success.</b></center>');
		redirect($this->agent->referrer());
	}
	// END EDIT NEW EMPLOYEE    

	// START ADD EMPLOYEE
	public function edit_employee($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'

		$data['makar'] = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row();
		$tbl_makar = $this->db->get_where('tbl_makar', array('no_scan' => $no_scan))->row();
		$data['kontrak'] = $this->db->query("SELECT count(*) as id, no_scan, kontrak_awal, kontrak_akhir FROM `tbl_kontrak` WHERE no_scan = '$no_scan' AND keterangan = '$tbl_makar->status_karyawan' ORDER BY id DESC LIMIT 1")->row();
		$data['no_scan'] = $no_scan;

		$data['title'] = 'Edit Employed';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/edit', $data);
		$this->load->view('template/footer');
	}

	public function addEmployed($username, $id)
	{
		if ($this->input->post('duplicate') == 1) {
			// DUPLICATE
			$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|trim|is_unique[tbl_makar.no_ktp]', array(
				'is_unique' => 'This nomor KTP has already used!'
			));
			$this->form_validation->set_rules('no_scan', 'Nomor Scan', 'required|trim|is_unique[tbl_makar.no_scan]', array(
				'is_unique' => 'This nomor scan has already used!'
			));

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>This Nomor KTP or Nomor Scan has already used.</b></center>');
				redirect($this->agent->referrer());
			} else {
				$data = array(
					'no_ktp' => $this->input->post('no_ktp', true),
					'no_scan' => $this->input->post('no_scan', true),
					'nama' => $this->input->post('nama', true),
					'tempat_lahir' => $this->input->post('tempat_lahir', true),
					'tgl_lahir' => $this->input->post('tgl_lahir', true),
					'alamat_ktp' => $this->input->post('alamat_ktp', true),
					'alamat_domisili' => $this->input->post('alamat_domisili', true),
					'RT' => $this->input->post('RT', true),
					'RW' => $this->input->post('RW', true),
					'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
					'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
					'kode_pos' => $this->input->post('kode_pos', true),
					'status_rumah' => $this->input->post('status_rumah', true),
					'agama' => $this->input->post('agama', true),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
					'status_kel' => $this->input->post('status_kel', true),
					'nama_sekolah' => $this->input->post('nama_sekolah', true),
					'pendidikan' => $this->input->post('pendidikan', true),
					'jurusan' => $this->input->post('jurusan', true),
					'ipk' => $this->input->post('ipk', true),
					'gol_darah' => $this->input->post('gol_darah', true),
					'email_pribadi' => $this->input->post('email_pribadi', true),
					'no_hp' => $this->input->post('no_hp', true),
					'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
					'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
					'tgl_masuk' => $this->input->post('tgl_masuk', true),
					'status_karyawan' => $this->input->post('status_karyawan', true),
					'tgl_tetap' => $this->input->post('tgl_tetap', true),
					'golongan' => $this->input->post('golongan', true),
					'jabatan' => $this->input->post('jabatan', true),
					'dept' => $this->input->post('dept', true),
					'bagian' => $this->input->post('bagian', true),
					'atasan1' => $this->input->post('atasan1', true),
					'atasan2' => $this->input->post('atasan2', true),
					'no_bpjs_tk' => $this->input->post('no_bpjs_tk', true),
					'no_bpjs_kes' => $this->input->post('no_bpjs_kes', true),
					'kode_jabatan' => $this->input->post('kode_jabatan', true),
					'status_aktif' => $this->input->post('status_aktif', true),
					'kode_jabatan' => $this->input->post('kode_jabatan', true),
					'npwp' => $this->input->post('npwp', true),
					'alamat_npwp' => $this->input->post('alamat_npwp', true),
					'kartu_keluarga' => $this->input->post('kartu_keluarga', true),
					'masa_berlaku_ktp' => $this->input->post('masa_berlaku_ktp', true),
					// 'tgl_seragam'           => $this->input->post('tgl_seragam', true),
					'status_seragam' => $this->input->post('status_seragam', true),
					'ukuran_baju_polo' => $this->input->post('ukuran_baju_polo', true),
					'ukuran_baju_shirt' => $this->input->post('ukuran_baju_shirt', true),
					'tgl_evaluasi' => $this->input->post('tgl_evaluasi', true)

				);
				$this->db->insert('tbl_makar', $data);
				$this->tambah_data_keluarga_duplicate();
				$this->tambah_data_pengalaman_kerja_duplicate();
			}
		} else {
			// EDIT DATA
			// ----------------------PROSES SIMPAN DATA EMPLOYEE---------------------------------
			$data = array(
				'no_ktp' => $this->input->post('no_ktp', true),
				'no_scan' => $this->input->post('no_scan', true),
				'nama' => $this->input->post('nama', true),
				'tempat_lahir' => $this->input->post('tempat_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'alamat_ktp' => $this->input->post('alamat_ktp', true),
				'alamat_domisili' => $this->input->post('alamat_domisili', true),
				'RT' => $this->input->post('RT', true),
				'RW' => $this->input->post('RW', true),
				'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
				'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
				'kode_pos' => $this->input->post('kode_pos', true),
				'status_rumah' => $this->input->post('status_rumah', true),
				'agama' => $this->input->post('agama', true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'status_kel' => $this->input->post('status_kel', true),
				'nama_sekolah' => $this->input->post('nama_sekolah', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'jurusan' => $this->input->post('jurusan', true),
				'ipk' => $this->input->post('ipk', true),
				'gol_darah' => $this->input->post('gol_darah', true),
				'email_pribadi' => $this->input->post('email_pribadi', true),
				'no_hp' => $this->input->post('no_hp', true),
				'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
				'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
				'tgl_masuk' => $this->input->post('tgl_masuk', true),
				'status_karyawan' => $this->input->post('status_karyawan', true),
				'tgl_tetap' => $this->input->post('tgl_tetap', true),
				'golongan' => $this->input->post('golongan', true),
				'jabatan' => $this->input->post('jabatan', true),
				'dept' => $this->input->post('dept', true),
				'bagian' => $this->input->post('bagian', true),
				'atasan1' => $this->input->post('atasan1', true),
				'atasan2' => $this->input->post('atasan2', true),
				'no_bpjs_tk' => $this->input->post('no_bpjs_tk', true),
				'no_bpjs_kes' => $this->input->post('no_bpjs_kes', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'status_aktif' => $this->input->post('status_aktif', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'npwp' => $this->input->post('npwp', true),
				'alamat_npwp' => $this->input->post('alamat_npwp', true),
				'kartu_keluarga' => $this->input->post('kartu_keluarga', true),
				'masa_berlaku_ktp' => $this->input->post('masa_berlaku_ktp', true),
				// 'tgl_seragam'           => $this->input->post('tgl_seragam', true),
				'tgl_resign' => $this->input->post('tgl_resign', true),
				'status_seragam' => $this->input->post('status_seragam', true),
				'ukuran_baju_polo' => $this->input->post('ukuran_baju_polo', true),
				'ukuran_baju_shirt' => $this->input->post('ukuran_baju_shirt', true),
				'tgl_evaluasi' => $this->input->post('tgl_evaluasi', true)

			);
			$this->db->where('id', $id);
			$update = $this->db->update('tbl_makar', $data);

			$this->tambah_data_keluarga();
			$this->tambah_data_pengalaman_kerja();
			$this->edit_data_keluarga();
			$this->edit_data_pengalaman_kerja();

			// -----------------------------SCRIPT LOG EMPLOYEE------------------------------------
			$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
			$log = array(
				'username' => $username,
				'no_scan' => $this->input->post('no_scan', true),
				'tgl' => time(),
				'keterangan' => gethostbyaddr($ipaddress)
			);
			$this->db->insert('log_new_employee_2', $log);
		}
		$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Employed Success.</b></center>');
		redirect('data_karyawan');
	}
	// END EMPLOYEE

	// START RESIGN EMPLOYEE
	public function resign($username)
	{
		$data = array(
			// 'tgl_pengajuan_resign'        => $this->input->post('tgl_pengajuan_resign'),
			'tgl_resign' => $this->input->post('tgl_resign'),
			'keterangan_resign' => $this->input->post('ket_resign'),
			'status_karyawan' => 'Resigned'
			// 'status_aktif'      => 0
		);
		$this->db->where('no_scan', $this->input->post('no_scan', true));
		$this->db->update('tbl_makar', $data);

		$noscan = $this->input->post('no_scan', true);
		$query = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();

		// KIRIM EMAIL KARYAWAN resign
		$noscan = $this->input->post('no_scan', true);
		$dept = $this->input->post('dept', true);
		$queryemail = $this->db->query("SELECT 
                            makar.no_scan,
                            makar.nama,
                            makar.dept,
                            makar.jabatan,
                            makar.tgl_masuk,
                            makar.tgl_evaluasi,
                            dm.dept_email1 as dept_email1,
                            dm.dept_email2 as dept_email8,
                            dm.dept_email3 as dept_email9
                        FROM tbl_makar makar
                        LEFT JOIN dept_mail_2 dm ON dm.code = makar.dept 
                        WHERE makar.dept = '$dept'
                ")->row();

		$dept_mail1 = $queryemail->dept_email1;
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
		$mail->addAddress('stefanus.pranjana@indotaichen.com');
		$mail->addAddress('Iso.hrd@indotaichen.com');
		$mail->addAddress('Hrd@indotaichen.com');
		$mail->addAddress('prs.absensi@indotaichen.com');
		$mail->addAddress('prs01@indotaichen.com');
		$mail->addAddress('meyliana@indotaichen.com');
		$mail->addAddress('bintoro.dy@indotaichen.com');
		$mail->addAddress('asep.pauji@indotaichen.com');
		$mail->addAddress($dept_mail1);
		$mail->Subject = 'Informasi Karyawan Resign';
		// Mengatur format email ke HTML
		$mail->isHTML(true);
		$mailContent = "<html>
                                <head>
                                </head>
                                <body>
                                    Data karyawan resign, sebagai berikut : <br>
                                    Nama Absen : $query->no_scan <br>
                                    Nama karyawan : $query->nama <br>
                                    Departemen : $query->dept <br>
                                    Tanggal Resign : $query->tgl_resign <br>
                                    Jabatan : $query->jabatan
                                </body>
                            </html>";
		$mail->Body = $mailContent;

		// Script log resign
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log = array(
			'username' => $username,
			'no_scan' => $this->input->post('no_scan', true),
			'tgl' => time(),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_resign', $log);

		if (!$mail->send()) {
			echo 'Pesan tidak dapat dikirim.';
			echo 'Mailer Error: ' .
				$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been resigned and Email not successfully sent.</b>' . $mail->ErrorInfo . '</center>');
		} else {
			$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert"><b>Your Employee resigned proses has been successfully.</b></center>');
		}
		redirect('data_karyawan');
	}
	// END RESIGN EMPLOYEE

	// START DELETE EMPLOYEE
	// public function delete($username)
	// {
	//     // Script log delete
	//     $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
	//     $log = array(
	//         'username'      => $username,
	//         'no_scan'       => $this->input->post('no_scan', true),
	//         'tgl'           => time(),
	//         'keterangan'    => gethostbyaddr($ipaddress)
	//     );
	//     $this->db->insert('log_delete_employee', $log);

	//     $this->db->where('no_scan', $this->input->post('no_scan', true));
	//     $this->db->delete('tbl_makar');

	//     $this->db->where('no_scan', $this->input->post('no_scan', true));
	//     $this->db->delete('tbl_training');
	//     $this->db->where('no_scan', $this->input->post('no_scan', true));
	//     $this->db->delete('data_keluarga');
	//     $this->db->where('no_scan', $this->input->post('no_scan', true));
	//     $this->db->delete('data_pengalaman_kerja');
	//     $this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your Employee has been deleted in data employee and data training.</b></center>');
	//     redirect('data_karyawan');
	// }

	public function delete($username)
	{
		// Script log delete
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log = array(
			'username' => $username,
			'no_scan' => $this->input->post('no_scan', true),
			'tgl' => time(),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_delete_employee', $log);

		// Start transaction
		$this->db->trans_begin();

		try {
			// Delete from tbl_makar
			$this->db->where('no_scan', $this->input->post('no_scan', true));
			$this->db->delete('tbl_makar');

			// Delete from tbl_training
			$this->db->where('no_scan', $this->input->post('no_scan', true));
			$this->db->delete('tbl_training');

			// Delete from data_keluarga
			$this->db->where('no_scan', $this->input->post('no_scan', true));
			$this->db->delete('data_keluarga');

			// Delete from data_pengalaman_kerja
			$this->db->where('no_scan', $this->input->post('no_scan', true));
			$this->db->delete('data_pengalaman_kerja');

			// Commit transaction
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				throw new Exception('Error occurred while deleting employee data.');
			} else {
				$this->db->trans_commit();
				$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Your Employee has been deleted in data employee and data training.</b></center>');
			}
		} catch (Exception $e) {
			$this->db->trans_rollback();
			$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Failed to delete employee due to existing references.</b></center>');
		}

		redirect('data_karyawan');
	}
	// END DELETE EMPLOYEE

	//START DATA KELUARGA
	public function tambah_data_keluarga()
	{
		if ($this->input->post('nama_keluarga[]', true)) {
			$this->db->trans_start();
			$nama_keluarga = $this->input->post('nama_keluarga[]', true);
			$hubungan_keluarga = $this->input->post('hubungan_keluarga[]', true);
			$tempat = $this->input->post('tempat[]', true);
			$tgl_lahir_keluarga = $this->input->post('tgl_lahir_keluarga[]', true);
			$pekerjaan = $this->input->post('pekerjaan[]', true);
			$value_keluarga = array();
			$index_keluarga = 0;
			foreach ($nama_keluarga as $key) {
				array_push($value_keluarga, array(
					'no_scan' => $this->input->post('no_scan', true),
					'nama' => $key,
					'hubungan' => $hubungan_keluarga[$index_keluarga],
					'tempat' => $tempat[$index_keluarga],
					'tgl_lahir' => $tgl_lahir_keluarga[$index_keluarga],
					'pekerjaan' => $pekerjaan[$index_keluarga]
				));
				$index_keluarga++;
			}
			$this->db->insert_batch('data_keluarga', $value_keluarga);
			$this->db->trans_complete();
		}
	}

	public function tambah_data_keluarga_duplicate()
	{
		$this->db->trans_start();
		$no_scan = $this->input->post('no_scan', true);
		$nama_keluarga_edit = $this->input->post('nama_keluarga_edit', true);
		$hubungan_keluarga_edit = $this->input->post('hubungan_keluarga_edit', true);
		$tempat_edit = $this->input->post('tempat_edit', true);
		$tgl_lahir_keluarga_edit = $this->input->post('tgl_lahir_keluarga_edit', true);
		$pekerjaan_edit = $this->input->post('pekerjaan_edit', true);

		$value_keluarga_edit = array();
		$index_keluarga_edit = 0;
		foreach ($nama_keluarga_edit as $key_edit) {
			array_push($value_keluarga_edit, array(
				'nama' => $key_edit,
				'no_scan' => $no_scan,
				'hubungan' => $hubungan_keluarga_edit[$index_keluarga_edit],
				'tempat' => $tempat_edit[$index_keluarga_edit],
				'tgl_lahir' => $tgl_lahir_keluarga_edit[$index_keluarga_edit],
				'pekerjaan' => $pekerjaan_edit[$index_keluarga_edit]
			));
			$index_keluarga_edit++;
		}
		$this->db->insert_batch('data_keluarga', $value_keluarga_edit);
		$this->db->trans_complete();
	}

	public function edit_data_keluarga()
	{
		$id_keluarga_edit = $this->input->post('id_keluarga_edit', true);
		$no_scan = $this->input->post('no_scan', true);
		$nama_keluarga_edit = $this->input->post('nama_keluarga_edit', true);
		$hubungan_keluarga_edit = $this->input->post('hubungan_keluarga_edit', true);
		$tempat_edit = $this->input->post('tempat_edit', true);
		$tgl_lahir_keluarga_edit = $this->input->post('tgl_lahir_keluarga_edit', true);
		$pekerjaan_edit = $this->input->post('pekerjaan_edit', true);

		$value_keluarga_edit = array();
		$index_keluarga_edit = 0;
		foreach ($nama_keluarga_edit as $key_edit) {
			array_push($value_keluarga_edit, array(
				'id' => isset($id_keluarga_edit[$index_keluarga_edit]) ? $id_keluarga_edit[$index_keluarga_edit] : null,
				'nama' => isset($key_edit) ? $key_edit : null,
				'no_scan' => isset($no_scan) ? $no_scan : null,
				'hubungan' => isset($hubungan_keluarga_edit[$index_keluarga_edit]) ? $hubungan_keluarga_edit[$index_keluarga_edit] : null,
				'tempat' => isset($tempat_edit[$index_keluarga_edit]) ? $tempat_edit[$index_keluarga_edit] : null,
				'tgl_lahir' => isset($tgl_lahir_keluarga_edit[$index_keluarga_edit]) ? $tgl_lahir_keluarga_edit[$index_keluarga_edit] : null,
				'pekerjaan' => isset($pekerjaan_edit[$index_keluarga_edit]) ? $pekerjaan_edit[$index_keluarga_edit] : null
			));
			$index_keluarga_edit++;
		}
		$this->db->update_batch('data_keluarga', $value_keluarga_edit, 'id');
	}

	public function delete_data_keluarga($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data_keluarga');
		$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Data keluarga berhasil di hapus.</b></center>');
		redirect($this->agent->referrer());
	}
	//END DATA KELUARGA

	// START PENGALAMAN KERJA s
	public function tambah_data_pengalaman_kerja()
	{
		if ($this->input->post('nama_perusahaan[]', true)) {
			$this->db->trans_start();
			$nama_perusahaan = $this->input->post('nama_perusahaan[]', true);
			$bagian = $this->input->post('dept_perusahaan[]', true);
			$jabatan = $this->input->post('jabatan_perusahaan[]', true);
			$masa_kerja = $this->input->post('masa_kerja_perusahaan[]', true);
			$value_pengalaman_kerja = array();
			$index_pengalaman_kerja = 0;
			foreach ($nama_perusahaan as $key) {
				array_push($value_pengalaman_kerja, array(
					'no_scan' => $this->input->post('no_scan', true),
					'nama_perusahaan' => $key,
					'bagian' => $bagian[$index_pengalaman_kerja],
					'jabatan' => $jabatan[$index_pengalaman_kerja],
					'masa_kerja' => $masa_kerja[$index_pengalaman_kerja]
				));
				$index_pengalaman_kerja++;
			}
			$this->db->insert_batch('data_pengalaman_kerja', $value_pengalaman_kerja);
			$this->db->trans_complete();
		}
	}

	public function tambah_data_pengalaman_kerja_duplicate()
	{
		$no_scan = $this->input->post('no_scan', true);
		$nama_perusahaan = $this->input->post('nama_perusahaan_edit', true);
		$bagian = $this->input->post('dept_perusahaan_edit', true);
		$jabatan = $this->input->post('jabatan_perusahaan_edit', true);
		$masa_kerja = $this->input->post('masa_kerja_perusahaan_edit', true);

		$value_data_pengalaman_kerja = array();
		$index_data_pengalaman_kerja = 0;
		foreach ($nama_perusahaan as $key) {
			array_push($value_data_pengalaman_kerja, array(
				'nama_perusahaan' => $key,
				'no_scan' => $no_scan,
				'bagian' => $bagian[$index_data_pengalaman_kerja],
				'jabatan' => $jabatan[$index_data_pengalaman_kerja],
				'masa_kerja' => $masa_kerja[$index_data_pengalaman_kerja],
			));
			$index_data_pengalaman_kerja++;
		}
		$this->db->insert_batch('data_pengalaman_kerja', $value_data_pengalaman_kerja);
		$this->db->trans_complete();
	}

	public function edit_data_pengalaman_kerja()
	{
		$id_pengalaman_edit = $this->input->post('id_pengalaman_edit', true);
		$no_scan = $this->input->post('no_scan', true);
		$nama_perusahaan = $this->input->post('nama_perusahaan_edit', true);
		$bagian = $this->input->post('dept_perusahaan_edit', true);
		$jabatan = $this->input->post('jabatan_perusahaan_edit', true);
		$masa_kerja = $this->input->post('masa_kerja_perusahaan_edit', true);

		$value_data_pengalaman_kerja = array();
		$index_data_pengalaman_kerja = 0;
		foreach ($nama_perusahaan as $key) {
			array_push($value_data_pengalaman_kerja, array(
				'id' => isset($id_pengalaman_edit[$index_data_pengalaman_kerja]) ? $id_pengalaman_edit[$index_data_pengalaman_kerja] : null,
				'nama_perusahaan' => isset($key) ? $key : null,
				'no_scan' => isset($no_scan) ? $no_scan : null,
				'bagian' => isset($bagian[$index_data_pengalaman_kerja]) ? $bagian[$index_data_pengalaman_kerja] : null,
				'jabatan' => isset($jabatan[$index_data_pengalaman_kerja]) ? $jabatan[$index_data_pengalaman_kerja] : null,
				'masa_kerja' => isset($masa_kerja[$index_data_pengalaman_kerja]) ? $masa_kerja[$index_data_pengalaman_kerja] : null,
			));
			$index_data_pengalaman_kerja++;
		}
		$this->db->update_batch('data_pengalaman_kerja', $value_data_pengalaman_kerja, 'id');
	}

	public function delete_data_pengalaman_kerja($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data_pengalaman_kerja');
		$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>Data Pengalaman Kerja berhasil di hapus.</b></center>');
		redirect($this->agent->referrer());
	}
	// END PENGALAMAN KERJA

	// SERAGAM
	public function seragam()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Employee | Data Seragam';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/seragam');
		$this->load->view('template/footer');
	}
	public function seragam2()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array();

		$data['title'] = 'Employee | Data Seragam';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/seragam2');
		$this->load->view('template/footer');
	}


	public function data_employee_seragam($dept)
	{
		if ($dept == "HRD") {
			$data = $this->db->query('SELECT * FROM tbl_makar WHERE NOT status_karyawan = "Resigned" AND NOT status_karyawan = "perubahan_status" ORDER BY nama ASC')->result_array();
			echo json_encode($data);
		} else {
			$data = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status' AND dept='$dept' ORDER BY nama ASC")->result_array();
			echo json_encode($data);
		}
	}

	public function addseragam()
	{
		$data = array(
			'ukuran_baju_polo' => $this->input->post('ukuran_baju_polo', true),
			'ukuran_baju_shirt' => $this->input->post('ukuran_baju_shirt', true)
			// 'disabled_ub'   => "disabled"
		);
		$this->db->where('no_scan', $this->input->post('no_scan', true));
		$this->db->update('tbl_makar', $data);
		$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Data seragam berhasil diinput.</b></center>');
		redirect($this->agent->referrer());
	}

	public function updateseragam()//disabled status edit
	{
		$enabledSeragam = $this->input->post('disabled_ub', true);
		$data = array(
			'disabled_ub' => $enabledSeragam
		);
		$this->db->update('tbl_makar', $data);
		$this->db->update('status_disabled_sragam', $data);
		if ($enabledSeragam == 'enabled') {
			$message = '<center class="alert alert-warning" role="alert"><b>Status Edit Data seragam berhasil dibuka.</b></center>';
		} else {
			$message = '<center class="alert alert-warning" role="alert"><b>Status Edit Data seragam berhasil ditutup.</b></center>';
		}

		$this->session->set_flashdata('message', $message);
		redirect($this->agent->referrer());
	}



	public function ExportSeragam()
	{
		$this->load->view('data_karyawan/export_seragam');
	}
	// SERAGAM

	// START ADD EMPLOYEE
	public function edit_employee_temp($no_scan)
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'

		$data['makar'] = $this->db->get_where('tbl_makar_temp', array('no_scan' => $no_scan))->row();
		$tbl_makar = $this->db->get_where('tbl_makar_temp', array('no_scan' => $no_scan))->row();
		//  $data['kontrak'] = $this->db->query("SELECT count(*) as id, no_scan, kontrak_awal, kontrak_akhir FROM `tbl_kontrak` WHERE no_scan = '$no_scan' AND keterangan = '$tbl_makar->status_karyawan' ORDER BY id DESC LIMIT 1")->row();
		$data['no_scan'] = $no_scan;

		$data['title'] = 'Edit Employed';
		$this->load->view('template/header', $data);
		$this->load->view('data_karyawan/edit_temp', $data);
		$this->load->view('template/footer');
	}
	public function addEmployed_temp($username, $id)
	{
		if ($this->input->post('duplicate') == 1) {
			// DUPLICATE
			$this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|trim|is_unique[tbl_makar.no_ktp]', array(
				'is_unique' => 'This nomor KTP has already used!'
			));
			$this->form_validation->set_rules('no_scan', 'Nomor Scan', 'required|trim|is_unique[tbl_makar.no_scan]', array(
				'is_unique' => 'This nomor scan has already used!'
			));

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert"><b>This Nomor KTP or Nomor Scan has already used.</b></center>');
				redirect($this->agent->referrer());
			} else {
				$data = array(
					'no_ktp' => $this->input->post('no_ktp', true),
					'no_scan' => $this->input->post('no_scan', true),
					'nama' => $this->input->post('nama', true),
					'tempat_lahir' => $this->input->post('tempat_lahir', true),
					'tgl_lahir' => $this->input->post('tgl_lahir', true),
					'alamat_ktp' => $this->input->post('alamat_ktp', true),
					'alamat_domisili' => $this->input->post('alamat_domisili', true),
					'RT' => $this->input->post('RT', true),
					'RW' => $this->input->post('RW', true),
					'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
					'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
					'kode_pos' => $this->input->post('kode_pos', true),
					'status_rumah' => $this->input->post('status_rumah', true),
					'agama' => $this->input->post('agama', true),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
					'status_kel' => $this->input->post('status_kel', true),
					'nama_sekolah' => $this->input->post('nama_sekolah', true),
					'pendidikan' => $this->input->post('pendidikan', true),
					'jurusan' => $this->input->post('jurusan', true),
					'ipk' => $this->input->post('ipk', true),
					'gol_darah' => $this->input->post('gol_darah', true),
					'email_pribadi' => $this->input->post('email_pribadi', true),
					'no_hp' => $this->input->post('no_hp', true),
					'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
					'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
					'tgl_masuk' => $this->input->post('tgl_masuk', true),
					'status_karyawan' => $this->input->post('status_karyawan', true),
					'tgl_tetap' => $this->input->post('tgl_tetap', true),
					'golongan' => $this->input->post('golongan', true),
					'jabatan' => $this->input->post('jabatan', true),
					'dept' => $this->input->post('dept', true),
					'bagian' => $this->input->post('bagian', true),
					'atasan1' => $this->input->post('atasan1', true),
					'atasan2' => $this->input->post('atasan2', true),
					'no_bpjs_tk' => $this->input->post('no_bpjs_tk', true),
					'no_bpjs_kes' => $this->input->post('no_bpjs_kes', true),
					'kode_jabatan' => $this->input->post('kode_jabatan', true),
					'status_aktif' => $this->input->post('status_aktif', true),
					'kode_jabatan' => $this->input->post('kode_jabatan', true),
					'npwp' => $this->input->post('npwp', true),
					'alamat_npwp' => $this->input->post('alamat_npwp', true),
					'kartu_keluarga' => $this->input->post('kartu_keluarga', true),
					'masa_berlaku_ktp' => $this->input->post('masa_berlaku_ktp', true),
					// 'tgl_seragam'           => $this->input->post('tgl_seragam', true),
					'status_seragam' => $this->input->post('status_seragam', true)

				);
				$this->db->insert('tbl_makar', $data);

			}
		} else {
			// EDIT DATA
			// ----------------------PROSES SIMPAN DATA EMPLOYEE---------------------------------
			$data = array(
				'no_ktp' => $this->input->post('no_ktp', true),
				'no_scan' => $this->input->post('no_scan', true),
				'nama' => $this->input->post('nama', true),
				'tempat_lahir' => $this->input->post('tempat_lahir', true),
				'tgl_lahir' => $this->input->post('tgl_lahir', true),
				'alamat_ktp' => $this->input->post('alamat_ktp', true),
				'alamat_domisili' => $this->input->post('alamat_domisili', true),
				'RT' => $this->input->post('RT', true),
				'RW' => $this->input->post('RW', true),
				'kabupaten_domisili' => $this->input->post('kabupaten_domisili', true),
				'kecamatan_domisili' => $this->input->post('kecamatan_domisili', true),
				'kode_pos' => $this->input->post('kode_pos', true),
				'status_rumah' => $this->input->post('status_rumah', true),
				'agama' => $this->input->post('agama', true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'status_kel' => $this->input->post('status_kel', true),
				'nama_sekolah' => $this->input->post('nama_sekolah', true),
				'pendidikan' => $this->input->post('pendidikan', true),
				'jurusan' => $this->input->post('jurusan', true),
				'ipk' => $this->input->post('ipk', true),
				'gol_darah' => $this->input->post('gol_darah', true),
				'email_pribadi' => $this->input->post('email_pribadi', true),
				'no_hp' => $this->input->post('no_hp', true),
				'pengalaman_kerja' => $this->input->post('pengalaman_kerja', true),
				'keterampilan_khusus' => $this->input->post('keterampilan_khusus', true),
				'tgl_masuk' => $this->input->post('tgl_masuk', true),
				'status_karyawan' => $this->input->post('status_karyawan', true),
				'tgl_tetap' => $this->input->post('tgl_tetap', true),
				'golongan' => $this->input->post('golongan', true),
				'jabatan' => $this->input->post('jabatan', true),
				'dept' => $this->input->post('dept', true),
				'bagian' => $this->input->post('bagian', true),
				'atasan1' => $this->input->post('atasan1', true),
				'atasan2' => $this->input->post('atasan2', true),
				'no_bpjs_tk' => $this->input->post('no_bpjs_tk', true),
				'no_bpjs_kes' => $this->input->post('no_bpjs_kes', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'status_aktif' => $this->input->post('status_aktif', true),
				'kode_jabatan' => $this->input->post('kode_jabatan', true),
				'npwp' => $this->input->post('npwp', true),
				'alamat_npwp' => $this->input->post('alamat_npwp', true),
				'kartu_keluarga' => $this->input->post('kartu_keluarga', true),
				'masa_berlaku_ktp' => $this->input->post('masa_berlaku_ktp', true),
				// 'tgl_seragam'           => $this->input->post('tgl_seragam', true),
				'status_seragam' => $this->input->post('status_seragam', true)

			);
			$this->db->where('id', $id);
			$update = $this->db->update('tbl_makar', $data);

			$id = $this->input->post('no_scan', true);
			// var_dump($no_scan);

			$data = array(
				'status_verifikasi' => 'VERIFIED'
			);
			$this->db->where('no_scan', $id);
			$this->db->update('tbl_makar_temp', $data);

			$this->tambah_data_keluarga();
			$this->tambah_data_pengalaman_kerja();


			// -----------------------------SCRIPT LOG EMPLOYEE------------------------------------
			$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
			$log = array(
				'username' => $username,
				'no_scan' => $this->input->post('no_scan', true),
				'tgl' => date(),
				'keterangan' => gethostbyaddr($ipaddress)
			);
			$this->db->insert('log_new_employee_2', $log);
		}
		$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Employed Success.</b></center>');
		redirect('users/index');
	}

	// END EMPLOYEE
}