<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CatModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function category($id = '')
    {
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('category');
            return $query->row();
        } else {
            $query = $this->db->get('category');
            return $query->result_array();
        }
    }

    public function getcategory()
    {
        $this->db->limit(8);
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function category_info($id)
    {
        $this->db->select('*, establishment.name as name, category.name as cat_name,  category.id as cat_id, establishment.description as desc, establishment.id as id');
        $this->db->join('category', 'category.id=establishment.category_id');
        $this->db->where('category_id ', $id);
        $this->db->where('establishment.status ', 'Active');
        $query = $this->db->get('establishment');
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('category', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('category', $data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
        return $this->db->affected_rows();
    }
}
