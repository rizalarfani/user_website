<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengaturan extends CI_Controller
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
        if ($this->uri->segment(2) == 'update') {
            $this->form_validation->set_rules('damkar', 'No Damkar', 'required|trim|numeric|min_length[12]|max_length[13]');
            $this->form_validation->set_rules('polisi', 'No polisi', 'required|trim|numeric|min_length[12]|max_length[13]');
            $this->form_validation->set_rules('rumah_sakit', 'No rumah_sakit', 'required|trim|numeric|min_length[12]|max_length[13]');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'no_damkar' => htmlspecialchars($this->input->post('damkar', true)),
                    'no_polisi' => htmlspecialchars($this->input->post('polisi', true)),
                    'no_rm' => htmlspecialchars($this->input->post('rumah_sakit', true))
                ];
                $update = $this->universal->update($data, ['id' => 1], 'informasi');
                if ($update) {
                    $this->session->set_flashdata('info', 'Berhasil update data');
                    redirect('pengaturan');
                } else {
                    $this->session->set_flashdata('infoGagal', 'Gagal update data');
                    redirect('pengaturan');
                }
            } else {
                $this->session->set_flashdata('infoGagal', validation_errors());
                redirect('pengaturan');
            }
        } else {
            $params = [
                'title' => 'Pengaturan',
                'page' => 'v_pengaturan',
                'no_wa' => $this->universal->getOne('*', ['id' => 1], 'informasi'),
            ];
            template($params, 1);
        }
    }
}

/* End of file Pengaturan.php */
