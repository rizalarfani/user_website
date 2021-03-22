<?php
defined('BASEPATH') or exit('No direct script access allowed');
class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->log_admin = $this->session->userdata('log_admin');
    }
    public function index()
    {
        $params = [
            'title' => 'About aplikasi',
            'page' => 'v_about',
        ];
        template($params, 1);
    }
}

/* End of file About.php */
