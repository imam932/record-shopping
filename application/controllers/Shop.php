<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function index()
	{
		$this->load->model('Model_type');

		$inData['types'] = $this->Model_type->select_all();
		$data['content'] = $this->load->view('home/shop/create', $inData, TRUE);
		$this->load->view('home/layouts/template', $data);
	}

	public function store()
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$data = array(
			'name'  => $this->input->post('name'),
			'type_id' => $this->input->post('type_id'),
			'created_at' => date("Y-m-d h:i:s"),
		);

		$this->db->insert('shop', $data);
		$shop_id = $this->db->insert_id();

		$data_trans = array(
			'quantity'  => $this->input->post('quantity'),
			'month'  => date('m'),
			'shop_id' => $shop_id,
			'created_at' => date("Y-m-d h:i:s"),
		);

		$this->db->insert('shop_transaction', $data_trans);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return redirect('shop');
		} 
		else {
			$this->db->trans_commit();
			return redirect('home');
		}
	}
}
