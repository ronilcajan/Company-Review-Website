<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReviewModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $this->db->insert('review', $data);
        return $this->db->affected_rows();
    }

    public function addcomment($data)
    {
        $this->db->insert('comments', $data);
        return $this->db->affected_rows();
    }

    public function getratings($id)
    {
        $this->db->select('COUNT(review.id) as reviews');
        $this->db->select_avg('ratings');
        $this->db->where('estab_id ', $id);
        $this->db->where('review.status', 'Published');
        $query = $this->db->get('review');
        return $query->row();
    }

    public function getreview($id = '')
    {
        if ($id) {
            $this->db->select('*, review.id as rev_id');
            $this->db->join('users', 'users.id=review.user_id', 'right');
            $this->db->where('estab_id ', $id);
            $this->db->where('review.status', 'Published');
        } else {
            $this->db->select('*, establishment.name as name, review.status as status, review.id as rev_id');
            $this->db->join('users', 'users.id=review.user_id', 'right');
            $this->db->join('establishment', 'establishment.id=review.estab_id');
        }

        $query = $this->db->get('review');
        return $query->result_array();
    }
    public function publish($data, $id)
    {
        $this->db->update('review', $data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('review');
        return $this->db->affected_rows();
    }
}
