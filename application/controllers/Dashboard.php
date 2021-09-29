<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $data['title'] = 'Dashboard';
        $data['estab'] = $this->dashboardModel->estab();
        $data['reviews'] = $this->dashboardModel->reviews();
        $data['cat'] = $this->dashboardModel->category();
        $data['inqui'] = $this->dashboardModel->inqui();

        $this->base->load('admin', 'admin/dashboard', $data);
    }

    public function getEstab()
    {
        $validator = array('total' => array(), 'active' => array(), 'inactive' => array());

        $validator['total'] = $this->dashboardModel->allestab();
        $validator['active'] = $this->dashboardModel->estab();
        $validator['inactive'] = $this->dashboardModel->getinactive();

        echo json_encode($validator);
    }

    public function getUsers()
    {
        $validator = array('total' => array(), 'admin' => array(), 'members' => array());

        $validator['total'] = $this->dashboardModel->allusers();
        $validator['admin'] = $this->dashboardModel->adminusers();
        $validator['members'] = $this->dashboardModel->members();

        echo json_encode($validator);
    }
}
