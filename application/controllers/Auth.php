<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
        $name       = $this->input->post('name');
        $password   = $this->input->post('password');

        $user = $this->db->get_where('user', array('name' => $name))->row_array(); //Select * from user where name = '$name'
        // var_dump($user);
        // die; //supaya scriptnya tidak berjalan lagi

        // Script Log Login
        $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
        $log_login = array(
            'username'      => $this->input->post('name'),
            'date_login'    => time(),
            'keterangan'    => gethostbyaddr($ipaddress)
        );
        $this->db->insert('log_login', $log_login);

        // Script logged
        $dataLogged = array(
            'logged'    => '1'
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
                        'role_id' => $user['role_id']
                    );
                    $this->session->set_userdata($data);
                    // if ($user['role_id'] == 1) {
                    redirect('home');
                    // } elseif ($user['role_id'] == 2) {
                    // redirect('home');
                    // } elseif ($user['role_id'] == 3) {
                    // redirect('home');
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
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[user.name]', array(
            'is_unique' => 'This Name has been used!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', array(
            'is_unique' => 'This email has already registered!'
        ));
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
                        'name',
                        true
                    )),
                    'email'  => $this->input->post(
                        'email',
                        true
                    ),
                    'image' => 'profile1.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'is_active' => 0,
                    'date_created' => time()
                );
                $this->db->insert('user', $data);
            } else {
                $data = array(
                    'name' => htmlspecialchars(
                        $this->input->post('name', true)
                    ),
                    'email' => $this->input->post(
                        'email',
                        true
                    ),
                    'image' => 'profile2.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'is_active' => 0,
                    'date_created' => time()
                );
                $this->db->insert('user', $data);
            }

            $this->session->set_flashdata('message', '<center class="alert alert-success" role="alert">Your account has been created.</center>');
            redirect('menu');
        }
    }

    public function logout($username = 'NOT FOUND')
    {
        // Script Log Login
        $ipaddress = $_SERVER['REMOTE_ADDR']; //ip server
        $log_login = array(
            'username'      => $username,
            'date_logout'    => time(),
            'keterangan'    => gethostbyaddr($ipaddress)
        );
        $this->db->insert('log_logout', $log_login);

        // Script logged
        $dataLogged = array(
            'logged'    => '0'
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
            'username'      => $username,
            'date_logout'    => time(),
            'keterangan'    => gethostbyaddr($ipaddress)
        );
        $this->db->insert('log_logout', $log_login);

        // Script logged
        $dataLogged = array(
            'logged'    => '0'
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
}
