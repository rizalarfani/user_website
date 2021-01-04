<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
            'title' => 'Dashboard',
            'page' => 'v_dashboard',
            'sum_user' => $this->universal->getMulti('', 'user'),
            'sum_kebakaran' => $this->universal->getMulti('', 'kebakaran'),
            'level' => $this->universal->getMulti('', 'level'),
        ];
        template($params, 1);
    }
}

/* End of file Dashboard.php */
