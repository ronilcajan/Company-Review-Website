<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inquiry extends CI_Controller
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

        $data['title'] = 'Inquiry Management';
        $data['cat'] = $this->inquiryModel->inquiry();

        $this->base->load('admin', 'admin/inquiry/manage', $data);
    }
    public function create()
    {
        $this->session->set_flashdata('success', 'danger');

        $this->form_validation->set_rules('name', 'FullName', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
            );

            $insert = $this->inquiryModel->save($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Message has been sent!');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
            }
        }

        redirect("contact", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->inquiryModel->delete($id);
        $this->session->set_flashdata('success', 'danger');
        if ($delete) {
            $this->session->set_flashdata('message', 'Inquiry has been deleted!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('admin/inquiry', 'refresh');
    }
}
