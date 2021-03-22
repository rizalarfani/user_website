<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'api');
    }
    public function index()
    {
        $get_data = $this->api->get_data();
        if ($get_data) {
            if ($get_data->status == 1) {
                if ($get_data->suhu >= 34) {
                    $response = 1;
                } else {
                    $response = 0;
                }
            } else {
                $response = 0;
            }
        } else {
            $response = 0;
        }
        echo $response;
    }
}
/* End of file Api.php */