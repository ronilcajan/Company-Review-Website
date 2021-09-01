<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		$data['title'] = 'Home';

		$this->base->load('default', 'customer/home', $data);
	}

	public function about()
	{

		$data['title'] = 'About Us';

		$this->base->load('default', 'customer/about', $data);
	}
	public function contact()
	{

		$data['title'] = 'Contact Us';

		$this->base->load('default', 'customer/contact', $data);
	}
	public function reviews()
	{

		$data['title'] = 'All Reviews';

		$this->base->load('default', 'customer/reviews', $data);
	}
	public function category()
	{

		$data['title'] = 'All Categories';

		$this->base->load('default', 'customer/category', $data);
	}
}
