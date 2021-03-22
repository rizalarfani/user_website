<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Monitoring extends CI_Controller
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
        $params = [
            'title' => 'Monitoring Cameea Real Time',
            'page' => 'v_monitoring_camera'
        ];
        template($params, 1);
    }
    public function peta()
    {
        $params = [
            'title' => 'Monitoring Peta',
            'page' => 'v_monitoring_peta'
        ];
        template($params, 1);
    }
    public function getDataKebakaran()
    {
        $data = $this->universal->getMulti(['status' => 1], 'kebakaran');
        if ($data) {
            $response = [
                'status' => true,
                'Berhasil get data',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => false,
                'Gagal get data',
            ];
        }
        echo json_encode($response, true);
    }
}

/* End of file Monitoring.php */
