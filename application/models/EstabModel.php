<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EstabModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function estabishment($id = '')
    {
        if (!$id) {
            $query = $this->db->get('establishment');
        } else {
            $this->db->where('user_id', $id);
            $query = $this->db->get('establishment');
        }

        return $query->result_array();
    }

    public function estabs()
    {
        $this->db->select('*, establishment.name as name, category.name as cat_name,  category.id as cat_id, establishment.description as desc, establishment.id as id');
        $this->db->join('category', 'category.id=establishment.category_id');
        $this->db->where('establishment.status ', 'Active');
        $query = $this->db->get('establishment');

        return $query->result_array();
    }

    public function getestabs()
    {
        $this->db->select('*, establishment.name as name, category.name as cat_name,  category.id as cat_id, establishment.description as desc, establishment.id as id');
        $this->db->join('category', 'category.id=establishment.category_id');
        $this->db->where('establishment.status ', 'Active');
        $this->db->limit(4);
        $query = $this->db->get('establishment');

        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('establishment', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('establishment', $data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function getestab($id)
    {
        $this->db->select('*, establishment.id as id, establishment.name as name, establishment.description as description, category.name as cat_name');
        $this->db->from('establishment');
        $this->db->join('category', 'establishment.category_id=category.id');
        $this->db->where('establishment.id', $id);
        return $this->db->get()->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('establishment');
        return $this->db->affected_rows();
    }
}
