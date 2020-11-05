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
			'quantity'  => 1,
			'price'  => $this->input->post('price'),
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
			return redirect('shop');
		}
	}

	public function edit($id)
	{
		$this->load->model(['Model_type','Model_shop']);

		$inData['types'] = $this->Model_type->select_all();
		$inData['shop'] = $this->Model_shop->select_by_id($id);
		
		$data['content'] = $this->load->view('home/shop/edit', $inData, TRUE);
		$this->load->view('home/layouts/template', $data);
	}

	public function update($id)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);

		$data = array(
			'name'  => $this->input->post('name'),
			'type_id' => $this->input->post('type_id'),
			'created_at' => date("Y-m-d h:i:s"),
		);

		$this->db->where('id', $id);
		$this->db->update('shop', $data);

		$data_trans = array(
			'quantity'  => $this->input->post('quantity'),
			'price'  => $this->input->post('price'),
			'created_at' => date("Y-m-d h:i:s"),
		);

		$this->db->where('shop_id', $id);
		$this->db->update('shop_transaction', $data_trans);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return redirect('shop');
		} 
		else {
			$this->db->trans_commit();
			return redirect('daily');
		}
	}
}
