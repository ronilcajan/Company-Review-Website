<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function update($data)
    {
        $this->db->update('systems', $data, "id=1");
        return $this->db->affected_rows();
    }
}
