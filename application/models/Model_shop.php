<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop extends CI_Model
{

  var $table = "shop";

  public function select_all()
  {
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

  // public function insert()
  // {
  //   $data['name']    = $this->input->post('name');
  //   $data['type_id'] = $this->input->post('type_id');
  //   $data['created_at'] = date("Y-m-d h:i:s");

  //   $this->db->insert($this->table, $data);
  // }

  public function update($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id', $id);

    if($this->db->delete($this->table))
    {
        return true;
    }else {
      return false;
    }
  }
}