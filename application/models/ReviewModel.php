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

    public function comments()
    {
        $this->db->select('*, comments.id as id');
        $this->db->join('review', 'review.id=comments.review_id');
        $this->db->join('users', 'users.id=comments.user_id');
        $query = $this->db->get('comments');
        return $query->result_array();
    }

    public function review()
    {
        $this->db->select('*, review.status as status, review.id as rev_id');
        $this->db->join('users', 'users.id=review.user_id', 'right');
        $this->db->limit(8);
        $query = $this->db->get('review');
        return $query->result_array();
    }




    public function myreview($id)
    {
        $this->db->select('*, review.status as status, review.status as rev_id');
        $this->db->join('establishment', 'establishment.id=review.estab_id');
        $this->db->where('review.user_id ', $id);
        $query = $this->db->get('review');
        return $query->result_array();
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

    public function delete_comment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('comments');
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('review');
        return $this->db->affected_rows();
    }
}
