<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kebakaran extends CI_Controller
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
            'title' => 'Data kebakaran',
            'page' => 'v_kebakaran',
            'kebakaran' => $this->universal->getMulti('', 'kebakaran')
        ];
        template($params, 1);
    }
}

/* End of file Kebakaran.php */
