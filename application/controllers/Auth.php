<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->user = $this->session->userdata('user');
	}

	public function index()
	{
		// 	//upadate Status Resigned
		//     $sql= "UPDATE tbl_makar set status_aktif = 0 WHERE tgl_resign between tgl_resign AND NOW() AND status_karyawan = 'Resigned'"; 
		//     $this->db->query($sql);

		//   //Generate Cuti tahunan
		//     $sql_sheet  = "SELECT *,
		//                     DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
		//                     YEAR(CURDATE()) as thn_awal,
		//                     DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
		//                     YEAR(CURDATE()+interval '1'year) as thn_akhir,
		//                     YEAR(CURDATE()-interval '1'year) as thn_awal_periode_gen,
		//                     YEAR(CURDATE()) as thn_akhir_periode_gen
		//                 FROM
		//                     tbl_makar 
		//                 WHERE
		//                     status_karyawan = 'Tetap' 
		//                     AND gaji IS NULL 
		//                     AND status_aktif = 1 
		//                     AND DATE_FORMAT( tgl_tetap, '%d %M' ) = DATE_FORMAT(CURDATE(),'%d %M') 
		//                     and not year(tgl_tetap) = year(CURDATE())
		//                     and not tgl_generate_cuti = CURDATE()
		//                 ORDER BY
		//                     ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY ) DESC";           
		//     // $sheet_gen  = $this->db->query($sql_sheet." LIMIT 1 ")->row(); 
		//     $sheet      = $this->db->query($sql_sheet)->result_array(); 
		//         foreach ($sheet AS $value){
		//         if ($value['sisa_cuti'] <= 0) {
		//         $saldosisacuti = 12 + $value['sisa_cuti'];
		//         } else {
		//         $saldosisacuti = 12;
		//         }

		//     $data = array (
		//             'no_scan'   => $value['no_scan'],
		//             'sisa_cuti' => $saldosisacuti,
		//             'sisa_cuti_th_sebelumnya' => $value['sisa_cuti'],
		//             'tgl_generate_cuti'=> DATE('Y-m-d')
		//     );
		//     $this->db->where('no_scan', $value['no_scan']);
		//     $this->db->update('tbl_makar', $data);

		//     if($value['sisa_cuti']){
		//         $alasan = "Sisa cuti ".$value['sisa_cuti']." telah dibayarkan (Periode".$value['thn_awal_periode_gen']." - ".$value['thn_akhir_periode_gen']." ).";
		//     } else {
		//         $alasan = "Tidak ada sisa cuti yang dibayarkan. Sisa cuti habis.";
		//     }

		//     // input histori izin cuti 
		//     $data_histori = array (
		//                     'kode_cuti'             => "GEN-".date('Ym'), //HISTORI IMPORT CUTI
		//                     'nip'                   => $value['no_scan'], 
		//                     'dept'                  => $value['dept'],
		//                     'saldo_cuti'            => $saldosisacuti,
		//                     'days_or_month'         => "Hari",
		//                     'ket'                   => "th.".date('Y'),
		//                     'alasan'                => $alasan
		//     );
		//     $this->db->insert('permohonan_izin_cuti', $data_histori);

		//     }

		//     //Update Data Career transition(Mitasi, Promosi, Demosi)
		//     $sql_transition = "SELECT 
		//                         no_scan,
		//                         proses,
		//                         tgl_efektif,
		//                         dept_baru,
		//                         bagian_baru,
		//                         golongan_baru,
		//                         jabatan_baru,
		//                         kode_jabatan_baru,
		//                         atasan1,
		//                         atasan2
		//                     FROM 
		//                         career_transition
		//                     WHERE 
		//                         tgl_efektif = CURDATE() ";

		//     $sheet_tran = $this->db->query($sql_transition)->result_array();

		//     foreach ($sheet_tran as $value) {
		//         if ($value['proses'] == 'mutasi'){

		//             $data = array(
		//                 'dept'         => $value['dept_baru'],
		//                 'bagian'       => $value['bagian_baru'],
		//                 );
		//         // Tambahkan kondisi if untuk memeriksa apakah atasan1 dan atasan2 tidak null
		//         } else if ($value['atasan1'] !== null && $value['atasan2'] !== null) {
		//             //update jika atasan1 dan atasan2 tidak null
		//             $data = array(
		//                 'dept'         => $value['dept_baru'],
		//                 'bagian'       => $value['bagian_baru'],
		//                 'golongan'     => $value['golongan_baru'],
		//                 'jabatan'      => $value['jabatan_baru'],
		//                 'kode_jabatan' => $value['kode_jabatan_baru'],
		//                 'atasan1'      => $value['atasan1'], 
		//                 'atasan2'      => $value['atasan2'], 
		//             );
		//         } else {
		//             //update jika atasan1 dan atasan2 null
		//             $data = array(
		//                 'dept'         => $value['dept_baru'],
		//                 'bagian'       => $value['bagian_baru'],
		//                 'golongan'     => $value['golongan_baru'],
		//                 'jabatan'      => $value['jabatan_baru'],
		//                 'kode_jabatan' => $value['kode_jabatan_baru'],
		//             );
		//         }

		//         $this->db->where('no_scan', $value['no_scan']); 
		//         $this->db->update('tbl_makar', $data);
		//     }


		//     //Update Masa Kerja Karyawan baru
		//     $masakerja = "UPDATE tbl_makar set masa_kerja = 6 where tgl_seragam between tgl_seragam  AND  now() and status_seragam ='BELUM' and status_idcard ='BELUM' AND NOT status_karyawan = 'Resigned' ";
		//     $this->db->query($masakerja);

		//     $tglseragam = "UPDATE tbl_makar set tgl_seragam = (DATE_ADD(tgl_masuk, INTERVAL 6 month )) where status_seragam = 'BELUM' and status_idcard ='BELUM' AND NOT status_karyawan = 'Resigned'";
		//     $this->db->query($tglseragam);

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page - PT. Indo Taichen Textile Industry';
			$this->load->view('template/header_Auth', $data);
			$this->load->view('auth/login');
			$this->load->view('template/footer_Auth');
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', array('name' => $name, 'ket' => 'HRIS'))->row_array();

		// Script Log Login
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log_login = array(
			'username' => $this->input->post('name'),
			'date_login' => DATE('Y-m-d H:i:s'),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_login_2', $log_login);

		// Script logged
		$dataLogged = array(
			'logged' => '1'
		);
		$this->db->where('name', $this->input->post('name', true));
		$this->db->update('user', $dataLogged);

		// usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = array(
						'name' => $user['name'],
						'role_id' => $user['role_id'],
						'dept' => $user['dept'],
						'no_scan' => $user['no_scan']
					);
					$this->session->set_userdata($data);
					// if ($user['role_id'] == 1) {
					//     redirect('home');
					// } elseif ($user['role_id'] == 6) {
					//     redirect('Home_employee');
					// } else {
					redirect('home');
					// }
				} else {
					$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">Wrong password!</center>');
					redirect('auth');
				}
				// jika usernya belum aktif
			} else {
				$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">This name has not been activated!</center>');
				redirect('auth');
			}
		} else {
			// user tidak ada
			$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">Name is not resigtered!</center>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name1', 'Name', 'required|trim|is_unique[user.name]', array(
			'is_unique' => 'This Name has been used!'
		));
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', array(
		// 	'is_unique' => 'This email has already registered!'
		// ));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', array(
			'matches' => 'Password not match!',
			'min_length' => 'Password too short! min. 5 character.'
		));
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration - PT. Indo Taichen Textile Industry';
			$this->load->view('template/header_Auth', $data);
			$this->load->view('auth/registration');
			$this->load->view('template/footer_Auth');
		} else {
			if ($this->input->post('male', true) == "M") {
				$data = array(
					'name' => htmlspecialchars($this->input->post(
						'name1',
						true
					)),
					// 'email' => $this->input->post(
					// 	'email',
					// 	true
					// ),
					'email' => '@indotaichen.com',
					'no_scan' => $this->input->post('no_scan'),
					'image' => 'profile1.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => $this->input->post('role_id'),
					'ket' => $this->input->post('application'),
					'dept' => $this->input->post('dept'),
					'is_active' => 0,
					'date_created' => time()
				);
				$this->db->insert('user', $data);
			} else {
				$data = array(
					'name' => htmlspecialchars(
						$this->input->post('name1', true)
					),
					'email' => $this->input->post(
						'email',
						true
					),
					'no_scan' => $this->input->post('no_scan'),
					'image' => 'profile2.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => $this->input->post('role_id'),
					'ket' => $this->input->post('application'),
					'dept' => $this->input->post('dept'),
					'is_active' => 0,
					'date_created' => time()
				);
				$this->db->insert('user', $data);
			}

			$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Your account has been created.</center>');
			redirect('menu');
		}
	}

	public function tampil_username()
	{
		$user_data = array(
			'id' => $id->id,
			'name' => $id->name,
			'name' => $username,
			'logged_in' => true
		);
	}
	public function logout($username = 'NOT FOUND')
	{
		// Script Log Login
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log_login = array(
			'username' => $username,
			'date_logout' => time(),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_logout', $log_login);

		// Script logged
		$dataLogged = array(
			'logged' => '0'
		);
		$this->db->where('name', $username);
		$this->db->update('user', $dataLogged);

		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Your have been logged out!</center>');
		redirect('auth');
	}

	public function out($username = 'NOT FOUND')
	{
		// Script Log Login
		$ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
		$log_login = array(
			'username' => $username,
			'date_logout' => time(),
			'keterangan' => gethostbyaddr($ipaddress)
		);
		$this->db->insert('log_logout', $log_login);

		// Script logged
		$dataLogged = array(
			'logged' => '0'
		);
		$this->db->where('name', $username);
		$this->db->update('user', $dataLogged);

		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Your have been logged out!</center>');
		redirect('auth');
	}

	public function activated($id)
	{
		$data = array(
			'is_active' => '1'
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		redirect('menu');
	}

	public function nonActivated($id)
	{
		$data = array(
			'is_active' => '0'
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Account have been Activated!</center>');
		redirect('menu');
	}

	public function download()
	{
		force_download('Panduan/Penduan Penggunaan Aplikasi V1.pdf', NULL);
	}
}