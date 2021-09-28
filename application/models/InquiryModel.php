<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InquiryModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function inquiry()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('inquiry');
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('inquiry', $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inquiry');
        return $this->db->affected_rows();
    }
}
