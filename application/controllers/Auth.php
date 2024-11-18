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
	public function forgot_password()
	{
		$data['title'] = 'Login Page - PT. Indo Taichen Textile Industry';
		$this->load->view('template/header_Auth', $data);
		$this->load->view('auth/forgot_password');
		$this->load->view('template/footer_Auth');
	}

	public function aktivasi_akun()
	{
		$data['title'] = 'Login Page - PT. Indo Taichen Textile Industry';
		$this->load->view('template/header_Auth', $data);
		$this->load->view('auth/activation_form');
		$this->load->view('template/footer_Auth');
	}

	public function edit_password()
	{
		if ($this->input->post()) {
			// Mengambil data dari form
			$id = $this->input->post('id_', true);
			$nama = $this->input->post('Searchname1', true);
			$email = $this->input->post('email', true);
			$password1 = $this->input->post('password1', true);
			$password2 = $this->input->post('password2', true);
			$activation_code = rand(100000, 999999); // Kode aktivasi 6 digit

			// Validasi apakah password1 dan password2 cocok
			if ($password1 !== $password2) {
				$this->session->set_flashdata('message', 'Password dan konfirmasi password tidak cocok.');
				redirect('auth/forgot_password');
			}

			// Cari user berdasarkan id
			$this->db->where('id', $id);
			$user = $this->db->get('user')->row();

			if ($user) {
				// Update password baru ke database jika user ditemukan
				$data = new stdClass();
				$data->password = password_hash($password1, PASSWORD_DEFAULT);
				$data->aktivasi_kode = $activation_code;
				$data->is_active = 0;
				$this->db->where('id', $id);
				if ($this->db->update('user', $data)) {

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
					$mail->addAddress($email);

					//  body email
					$mail->Subject = 'Kode Aktivasi Akun HRIS';
					$mail->isHTML(true);

					$mailContent = "<html>
                        <head></head>
                        <body>
                            <br>
                           	Hello, $nama <br>
							berikut kode aktivasi akun HRIS anda:<br>
							$activation_code. <br>                            
                            Terimakasih
                            <br>
                        </body>
                    </html>";
					$mail->Body = $mailContent;
					$mail->send();
					$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Password berhasil diubah. silahkan cek email untuk medapatkan kode aktivasi</center>');
					redirect('auth/aktivasi_akun');
				} else {
					// Jika terjadi kesalahan saat update
					$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Terjadi kesalahan, coba lagi.</center>');
					redirect('auth/forgot_password');
				}
			} else {
				// Jika email tidak ditemukan
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Email tidak ditemukan.</center>');
				redirect('auth/forgot_password');
			}
		}
		// Jika tidak ada post data, tampilkan halaman form
		$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">tidak ada data yang terkirim</center>');
		$this->load->view('auth/forgot_password');
	}

	public function search_user($username)
	{
		$dataSearch = $this->db->query("SELECT *
												from `user` a
												WHERE a.name = '$username'")->result();
		echo json_encode($dataSearch);
	}

	public function activate()
	{
		if ($this->input->post()) {
			$activation_code = $this->input->post('activation_code', true);

			if (empty($activation_code)) {
				$this->session->set_flashdata('message', 'Kode aktivasi tidak boleh kosong.');
				redirect('auth/aktivasi_akun');
			}

			// Periksa apakah kode aktivasi ada di database
			$this->db->where('aktivasi_kode', $activation_code);
			$user = $this->db->get('user')->row();

			if ($user) {
				$this->db->where('aktivasi_kode', $activation_code);
				$this->db->update('user', ['is_active' => 1, 'aktivasi_kode' => NULL]);

				// Set pesan sukses
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Akun Anda berhasil diaktivasi.</center>');
				redirect('auth');
			} else {
				// Jika tidak ditemukan, tampilkan pesan error
				$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Kode aktivasi salah atau tidak ditemukan.</center>');
				redirect('auth/aktivasi_akun');
			}
		} else {
			// Jika tidak ada data POST, redirect ke halaman aktivasi akun
			redirect('auth/aktivasi_akun');
		}
	}


}