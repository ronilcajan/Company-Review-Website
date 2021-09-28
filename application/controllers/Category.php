<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

        $data['title'] = 'Category Management';
        $data['cat'] = $this->catModel->category();

        $this->base->load('admin', 'admin/category/manage', $data);
    }
    public function create()
    {
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->is_admin()) {

            $this->form_validation->set_rules('name', 'Category Name', 'required|trim|is_unique[category.name]');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                );

                $insert = $this->catModel->save($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Category has been created!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your not an admin!');
        }
        redirect("admin/category", 'refresh');
    }

    public function update()
    {
        $this->session->set_flashdata('success', 'danger');
        $id = $this->input->post('id');

        if ($this->ion_auth->is_admin()) {

            $this->form_validation->set_rules('name', 'Category Name', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                );

                $update = $this->catModel->update($data, $id);

                if ($update) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Category has been updated!');
                } else {
                    $this->session->set_flashdata('message', 'No changes has been made!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your not an admin!');
        }
        redirect("admin/category", 'refresh');
    }

    public function delete($id)
    {

        $delete = $this->catModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Category has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect('admin/category', 'refresh');
    }
}
