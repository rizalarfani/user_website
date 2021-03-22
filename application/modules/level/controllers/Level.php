<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->log_admin = $this->session->userdata('log_admin');
        if (!$this->log_admin) {
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->uri->segment(2) == 'create') {
            $this->form_validation->set_rules('nama', 'Nama level', 'required|trim');
            $this->form_validation->set_rules('status', 'Status', 'required|trim|numeric');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'status' => $this->input->post('status', true)
                ];
                $insert = $this->universal->insert($data, 'level');
                if ($insert) {
                    $this->session->set_flashdata('info', 'Berhasil tambah data');
                    redirect('level');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Gagal tambah data');
                    redirect('level');
                }
            } else {
                $this->session->set_flashdata('infoGagal', validation_errors());
                redirect('level');
            }
        } else if ($this->uri->segment(2) == 'non_active') {
            $id = dekrip($this->uri->segment(3));
            if (empty($id)) {
                redirect('level');
            }
            $update = $this->universal->update(['status' => 0], ['id' => $id], 'level');
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil non active');
                redirect('level');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal non active');
                redirect('level');
            }
        } else if ($this->uri->segment(2) == 'active') {
            $id = dekrip($this->uri->segment(3));
            if (empty($id)) {
                redirect('level');
            }
            $update = $this->universal->update(['status' => 1], ['id' => $id], 'level');
            if ($update) {
                $this->session->set_flashdata('info', 'Berhasil active');
                redirect('level');
            } else {
                $this->session->set_flashdata('infoGagal', 'Gagal active');
                redirect('level');
            }
        } else if ($this->uri->segment(2) == 'edit') {
            $id_level = dekrip($this->input->post('id_level', true));
            if (empty($id_level)) {
                redirect('level');
            }
            $this->form_validation->set_rules('nama', 'Nama level', 'required|trim');
            $this->form_validation->set_rules('status', 'Status', 'required|trim|numeric');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'status' => $this->input->post('status', true)
                ];
                $update = $this->universal->update($data, ['id' => $id_level], 'level');
                if ($update) {
                    $this->session->set_flashdata('info', 'Berhasil edit data');
                    redirect('level');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Gagal edit data');
                    redirect('level');
                }
            } else {
                $this->sessiont->set_flashdata('infoGagal', validation_errors());
                redirect('level');
            }
        } else {
            $params = [
                'title' => 'Level user',
                'page' => 'v_level',
                'level' => $this->universal->getMulti('', 'level')
            ];
            template($params, 1);
        }
    }
}
/* End of file Level.php */
