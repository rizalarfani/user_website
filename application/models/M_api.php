<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_api extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('kebakaran')->row();
        return (count((array)$data) > 0) ? $data : false;
    }
}
/* End of file M_api.php */
