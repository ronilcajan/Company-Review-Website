<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Establishment extends CI_Controller
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

        $data['title'] = 'Establishment Management';
        $data['cat'] = $this->catModel->category();
        $data['estab'] = $this->estabModel->estabishment();

        $this->base->load('admin', 'admin/establishment/manage', $data);
    }

    public function estab_profile($id)
    {
        $data['estab'] = $this->estabModel->getestab($id);
        $data['review'] = $this->reviewModel->getreview($id);

        $data['title'] = 'Establishment Profile';
        $this->base->load('admin', 'admin/establishment/profile', $data);
    }

    public function getEstab()
    {
        $validator = array('data' => array());

        $id = $this->input->post('id');

        $validator['data'] = $this->estabModel->getestab($id);

        echo json_encode($validator);
    }

    public function delete($id)
    {
        $delete = $this->estabModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('errors', 'Establishment has been deleted!');
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function create()
    {
        $user = $this->ion_auth->user()->row();

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->session->set_flashdata('success', 'danger');

        if ($this->ion_auth->logged_in()) {

            $this->form_validation->set_rules('category', 'Category Name', 'required|trim');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            $this->form_validation->set_rules('name', 'Establishment', 'trim|required');
            $this->form_validation->set_rules('phone', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                if (!$this->upload->do_upload('logo') && !$this->upload->do_upload('image')) {
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'user_id' =>  $user->id,
                    );
                } else if ($this->upload->do_upload('logo') && !$this->upload->do_upload('image')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'logo' => $file['file_name'],
                        'user_id' =>  $user->id,
                    );
                } else if (!$this->upload->do_upload('logo') && $this->upload->do_upload('image')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'image' => $file['file_name'],
                        'user_id' =>  $user->id,
                    );
                } else {
                    $this->upload->do_upload('logo');
                    $logo = $this->upload->data();
                    $this->upload->do_upload('image');
                    $image = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $logo['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $logo['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $image['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'image' => $logo['file_name'],
                        'logo' => $image['file_name'],
                        'user_id' =>  $user->id,
                    );
                }

                $insert = $this->estabModel->save($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Establishment has been created!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your not an admin!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function update()
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->session->set_flashdata('success', 'danger');

        if ($this->ion_auth->logged_in()) {

            $this->form_validation->set_rules('category', 'Category Name', 'required|trim');
            $this->form_validation->set_rules('name', 'Establishment', 'trim|required');
            $this->form_validation->set_rules('phone', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {


                if (!$this->upload->do_upload('logo') && !$this->upload->do_upload('image')) {
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                    );
                } else if ($this->upload->do_upload('logo') && !$this->upload->do_upload('image')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'logo' => $file['file_name'],
                    );
                } else if (!$this->upload->do_upload('logo') && $this->upload->do_upload('image')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'image' => $file['file_name'],
                    );
                } else {
                    $this->upload->do_upload('logo');
                    $logo = $this->upload->data();
                    $this->upload->do_upload('image');
                    $image = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $logo['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $logo['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $image['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'category_id' => $this->input->post('category'),
                        'name' => $this->input->post('name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'facebook_url' => $this->input->post('facebook'),
                        'website' => $this->input->post('website'),
                        'address' => $this->input->post('address'),
                        'description' => $this->input->post('description'),
                        'status' => $this->input->post('status'),
                        'image' => $logo['file_name'],
                        'logo' => $image['file_name'],
                    );
                }

                $id = $this->input->post('id');

                $update = $this->estabModel->update($data, $id);

                if ($update) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Establishment has been updated!');
                } else {
                    $this->session->set_flashdata('message', 'No changes has been made!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Please login!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
