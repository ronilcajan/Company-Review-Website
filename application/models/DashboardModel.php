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

    public function estab()
    {
        $this->db->where('status', 'Active');
        $query = $this->db->get('establishment');
        return $query->num_rows();
    }
    public function allestab()
    {
        $query = $this->db->get('establishment');
        return $query->num_rows();
    }
    public function getinactive()
    {
        $this->db->where('status !=', 'Active');
        $query = $this->db->get('establishment');
        return $query->num_rows();
    }
    public function reviews()
    {
        $this->db->where('status', 'Published');
        $query = $this->db->get('review');
        return $query->num_rows();
    }
    public function category()
    {
        $query = $this->db->get('category');
        return $query->num_rows();
    }
    public function inqui()
    {
        $query = $this->db->get('inquiry');
        return $query->num_rows();
    }
    public function allusers()
    {
        $query = $this->db->get('users_groups');
        return $query->num_rows();
    }
    public function adminusers()
    {
        $this->db->where('group_id', 1);
        $query = $this->db->get('users_groups');
        return $query->num_rows();
    }
    public function members()
    {
        $this->db->where('group_id', 2);
        $query = $this->db->get('users_groups');
        return $query->num_rows();
    }
}
