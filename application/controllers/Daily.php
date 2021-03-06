<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily extends CI_Controller {

	public function index()
	{
		$this->load->model(['Model_shop']);

		$inData['reports'] = $this->Model_shop->select_all(10);

		$data['content'] = $this->load->view('home/reports/daily', $inData, TRUE);
		$this->load->view('home/layouts/template', $data);
	}
}
