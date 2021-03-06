<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model(['Model_shop']);
		
		$inData['shops'] = $this->Model_shop->select_all();

		$data['content'] = $this->load->view('home/home/index', $inData, TRUE);
		$this->load->view('home/layouts/template', $data);
	}
}
