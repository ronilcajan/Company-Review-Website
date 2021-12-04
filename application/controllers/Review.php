<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if (!$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $data['title'] = 'Reviews Management';
        $data['review'] = $this->reviewModel->getreview();

        $this->base->load('admin', 'admin/review/manage', $data);
    }

    public function comments()
    {
        if (!$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $data['title'] = 'Comment Management';
        $data['comments'] = $this->reviewModel->comments();

        $this->base->load('admin', 'admin/comments/manage', $data);
    }

    public function add_review()
    {
        $user = $this->ion_auth->user()->row();

        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->logged_in()) {

            // $this->form_validation->set_rules('title', 'Review Title', 'required|trim');
            $this->form_validation->set_rules('ratings', 'Ratings', 'required|trim');
            $this->form_validation->set_rules('review', 'Review', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                $data = array(
                    'estab_id' => $this->input->post('estab'),
                    // 'title' => $this->input->post('title'),
                    'details' => $this->input->post('review'),
                    'ratings' => $this->input->post('ratings'),
                    'ratings' => $this->input->post('ratings'),
                    'user_id' => $user->id
                );

                $insert = $this->reviewModel->save($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Your review has been sent!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your are not log in!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    public function add_comment()
    {
        $user = $this->ion_auth->user()->row();

        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->logged_in()) {

            $this->form_validation->set_rules('comments', 'Review Title', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                $data = array(
                    'comments' => $this->input->post('comments'),
                    'review_id' => $this->input->post('rev_id'),
                    'user_id' => $user->id,
                );

                $insert = $this->reviewModel->addcomment($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Your comment has been sent!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your are not log in!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function published($id)
    {
        $data = array(
            'status' => 'Published',
            'timestamp' => date("Y-m-d h:i:sa")
        );

        $publish = $this->reviewModel->publish($data, $id);

        if ($publish) {
            $this->session->set_flashdata('success', 'success');
            $this->session->set_flashdata('message', 'Review has been published!');
        } else {
            $this->session->set_flashdata('success', 'danger');
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('admin/reviews', 'refresh');
    }
    public function delete_comment($id)
    {

        $this->session->set_flashdata('success', 'danger');
        $delete = $this->reviewModel->delete_comment($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Comment has been deleted!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    public function delete($id)
    {

        $delete = $this->reviewModel->delete($id);
        $this->session->set_flashdata('success', 'danger');
        if ($delete) {
            $this->session->set_flashdata('message', 'Review has been deleted!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
