<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_user extends CI_Model
{
    public function get_user($where = null)
    {
        $this->db->select('user.id as id_user,user.nama_lengkap,user.email,user.no_wa,user.id_level,user.status as status_user,user.foto,level.*');
        $this->db->join('level', 'user.id_level=level.id', 'left');
        if (!empty($where)) {
            $this->db->where($where);
        }
        // $this->db->order_by('user.id', 'ASC');
        $data = $this->db->get('user')->result();
        return (count((array)$data) > 0) ? $data : false;
    }
}

/* End of file M_user.php */
