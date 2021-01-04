<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->log_admin = $this->session->userdata('log_admin');
        $this->load->model('M_user', 'user');
        if (!$this->log_admin) {
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->uri->segment(2) == 'non_active') {
            $id_user = dekrip($this->uri->segment(3));
            echo $id_user;
            die;
            if (empty($id_user)) {
                redirect('user');
            }
            $update = $this->universal->update(['status' => 0], ['id' => $id_user], 'user');
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil non activkan');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal non activekan');
                redirect('user');
            }
        } else if ($this->uri->segment(2) == 'active') {
            $id_user = dekrip($this->uri->segment(3));
            if (empty($id_user)) {
                redirect('user');
            }
            $update = $this->universal->update(['status' => 1], ['id' => $id_user], 'user');
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil activkan');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal activekan');
                redirect('user');
            }
        } else if ($this->uri->segment(2) == 'create') {
            $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
            $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
            $this->form_validation->set_rules('wa', 'Nomor WA', 'required|trim|numeric|min_length[12]|max_length[13]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('level', 'Level', 'required|trim');
            $this->form_validation->set_rules('status', 'Status', 'required|trim');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'no_wa' => htmlspecialchars($this->input->post('wa', true)),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
                    'id_level' => dekrip($this->input->post('level')),
                    'foto' => 'default.png',
                    'status' => $this->input->post('status', true)
                ];
                $insert = $this->universal->insert($data, 'user');
                if ($insert) {
                    $this->session->set_flashdata('info', 'Berhasil tambah user');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Gagal tambah user');
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('infoGagal', validation_errors());
                redirect('user');
            }
        } else if ($this->uri->segment(2) == 'edit') {
            $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
            $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
            $this->form_validation->set_rules('wa', 'Nomor WA', 'required|trim|numeric|min_length[12]|max_length[13]');
            $this->form_validation->set_rules('status', 'Status', 'required|trim');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'no_wa' => htmlspecialchars($this->input->post('wa', true)),
                    'status' => $this->input->post('status', true)
                ];
                $update = $this->universal->update($data, ['id' => dekrip($this->input->post('id_user'))], 'user');
                if ($update) {
                    $this->session->set_flashdata('info', 'Berhasil update user');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Gagal update user');
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('infoGagal', validation_errors());
                redirect('user');
            }
        } else if ($this->uri->segment(2) == 'delete') {
            $id_user = dekrip($this->uri->segment(3));
            if (empty($id_user)) {
                redirect('user');
            }
            $delete = $this->universal->delete(['id' => $id_user], "user");
            if ($delete) {
                $this->session->set_flashdata('info', 'Berhasil hapus user');
                redirect('user');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal hapus user');
                redirect('user');
            }
        } else {
            $user = $this->user->get_user();
            $params = [
                'title' => 'Data User',
                'page' => 'v_user',
                'user' => $user,
                'level' => $this->universal->getMulti(['status' => 1], 'level'),
            ];
            template($params, 1);
        }
    }
}

/* End of file User.php */
