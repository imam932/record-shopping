<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{

  var $table = "users";

  public function __construct()
  {
    parent::__construct();
  }

  public function login_admin($data)
	{
		$condition = "email = '" . $data['email'] . "' AND password = '" . $data['password'] . "'";

		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where($condition); //kondisi login sesuai dengan data di database
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

  public function select_all()
  {
    $this->db->where('level', 1);
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return array();
    }
  }

  public function select_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->table);

    if($query->num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }

  public function insert()
  {
    $data['id'] = random_string('alnum', 6) . date('dm') . random_string('alnum', 5);
    $data['nama']    = $this->input->post('nama');
    $data['email']  = $this->input->post('email');
    $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
    $data['tgl_lahir'] = $this->input->post('tgl_lahir');
    $data['password']  = md5($this->input->post('password'));
    $data['level'] = $this->input->post('level');

    var_dump($data);
    // $this->db->insert($this->table, $data);
  }

  public function update($data, $id)
  {
    $this->db->where('id_user', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_user', $id);

    if($this->db->delete($this->table))
    {
        return true;
    }else {
      return false;
    }
  }
}
