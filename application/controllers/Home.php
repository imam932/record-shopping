<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['content'] = $this->load->view('home/home/index', array(), TRUE);
		$this->load->view('home/layouts/template', $data);
	}
}
