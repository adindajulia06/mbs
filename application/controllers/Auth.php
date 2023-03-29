<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('M_website');
    }

    public function index()
    {
        redirect(base_url('auth/signin'));
    }

    public function signin()
    {
        $onlogin = $this->session->userdata('status', 'login');
        if ($onlogin) {
            redirect(base_url());
            return;
        }

        $dataweb = new M_website();
        $data = [
            'title' => $dataweb->website()->title,
            'titleweb' => $dataweb->website()->logo_text,
            'author' => $dataweb->website()->author,
        ];
        $this->load->view('auth/signin', $data);
    }
    public function do_signin()
    {
        $username = htmlspecialchars($this->input->POST('username'));
        $password = $this->input->POST('password');


        $user = $this->db->where('username', $username)
            ->get('users')->row_array();
        if ($user) {
            if ($user['level'] == 'Admin') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'level' => $user['level'],
                        'status' => "login",
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('router/setting'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah !</div>');
                    $this->session->set_flashdata('message_err', 'Password Salah !');

                    redirect(base_url('auth/signin'));
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username tidak terdaftar !</div>');
                $this->session->set_flashdata('message_err', 'Username tidak terdaftar !');

                redirect(base_url('auth/signin'));
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username tidak terdaftar !</div>');
            $this->session->set_flashdata('message_err', 'Username tidak terdaftar !');
            redirect(base_url('auth/signin'));
        }
    }

    public function signout()
    {
        session_destroy();
        redirect(base_url('auth/signin'));
    }
}
