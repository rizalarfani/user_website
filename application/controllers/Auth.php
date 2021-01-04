<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('string', 'cookie'));
        $this->cookie = "qOaHm9J9lN4DvuC5hg7uJbmVuMLSeeWt";
    }
    public function index()
    {
        $cookie = get_cookie($this->cookie);
        if ($this->session->userdata('log_admin')) {
            redirect('dashboard');
        } else if ($cookie <> '') {
            $data = $this->universal->getOne('*', ['cookie' => $cookie], 'user');
            if ($data) {
                $this->DaftarSession($data);
                redirect('dashboard');
            } else {
                $data = [
                    'title' => 'Login'
                ];
                $this->load->view('backend/login', $data);
            }
        } else {
            $data = [
                'title' => 'Login'
            ];
            $this->load->view('backend/login', $data);
        }
    }

    public function proses()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $email = htmlspecialchars($this->input->post('email', true));
            $passwod = $this->input->post('password', true);
            $get_data = $this->universal->getOne('*', ['email' => $email], 'user');
            if ($get_data) {
                if (password_verify($passwod, $get_data->password)) {
                    if ($get_data->status == 1) {
                        if ($this->input->post('remember')) {
                            $set_key =  random_string('alnum', 64);
                            set_cookie($this->cookie, $set_key, 3600 * 24 * 30);
                            $this->universal->update(['cookie' => $set_key], ['id' => $get_data->id], 'user');
                        }
                        $this->DaftarSession($get_data);
                        $this->session->set_flashdata('info', 'Berhasil login');
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('infoGagal', 'Maaf user anda sudah tidak active');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('infoGagal', 'Maaf gagal login!!harap periksa email atau password anda');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('infoGagal', 'Maaf gagal login!!harap periksa email atau password anda');
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    private function DaftarSession($data)
    {
        array_merge($data, ['log_status' => true]);
        $this->session->set_userdata('log_admin', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('info', 'Berhasil login');
        redirect('login');
    }
}

/* End of file Auth.php */
