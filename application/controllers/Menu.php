<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu extends CI_Controller
{
	public function index()
	{
		$data['user'] = $this->db->get_where('user', array(
			'name' =>
				$this->session->userdata('name')
		))->row_array(); //Select * from user where name = '$name'
		// echo 'selemat datang ' . $data['user']['name'];
		$data['title'] = 'Menu Management';
		$this->load->view('template/header', $data);
		$this->load->view('setting/menuSetting', $data);
		$this->load->view('menu/index');
		$this->load->view('template/footer');
	}
	public function edit_Password($no_scan)
	{
		$name = $this->input->post('name1');
		$password = $this->input->post('old_password');
		$email_user = $this->input->post('email');
		$password_default = $this->input->post('password1');
		$user = $this->db->get_where('user', array('name' => $name, 'ket' => 'HRIS'))->row_array();

		if (password_verify($password, $user['password'])) {
			$email = $this->input->post('email', true);
			$password_default1 = $this->input->post('password1');
			//array
			$data = array(
				'email' => $email,
				'password' => password_hash($password_default1, PASSWORD_DEFAULT)
			);
			$this->db->where('no_scan', $no_scan);
			$this->db->update('user', $data);

			$this->sendPasswordUpdateEmail($email_user, $name, $password_default);
			$this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Email dan password berhasil diperbarui.</center>');
			redirect('menu/index');
		} else {
			$this->session->set_flashdata('message', '<center class="alert alert-danger" role="alert">Old Password Incorrect!</center>');
			redirect('menu/index');
		}
	}
	private function sendPasswordUpdateEmail($email_user, $name, $password_default)
	{
		$email_user = $this->input->post('email');
		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'mail.indotaichen.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'dept.it@indotaichen.com';
		$mail->Password = 'Xr7PzUWoyPA';
		$mail->SMTPSecure = 'TLS';
		$mail->Port = 587;

		// Email sender and reply-to details
		$mail->setFrom('dept.it@indotaichen.com', 'Dept IT');
		$mail->addReplyTo('dept.it@indotaichen.com', 'Dept IT');

		// Recipient email
		$mail->addAddress($email_user);

		$mail->Subject = 'Informasi Akun HRIS Baru';
		$mail->isHTML(true);

		// Compose email content
		$mailContent = "<html>
                            <head></head>
                            <body>
                                Data Akun HRIS baru, sebagai berikut: <br>                              
                                Email: $email_user <br>
                                Username: $name <br>
                                Password: $password_default <br>
                                <br>
                                Dimohon untuk login menggunakan username dan password tersebut, dan merubah password di <a href='https://online.indotaichen.com/personalia'>https://online.indotaichen.com/personalia</a> <br>
                                <br>
                                Terimakasih
                            </body>
                        </html>";

		$mail->Body = $mailContent;

		// Send email and handle errors
		if (!$mail->send()) {
			$this->session->set_flashdata('message', '<center class="alert alert-warning" role="alert"><b>Your Employee has been Verified but the email was not successfully sent.</b>' . $mail->ErrorInfo . '</center>');
		}
	}
}