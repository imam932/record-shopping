<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop extends CI_Model
{

  var $table = "shop";

  public function select_all($limit=null)
  {
    $this->db->select('shop.id as id, shop.name as product_name, type.name as type_name, type.short_name, st.quantity, st.price, st.created_at');
    $this->db->from($this->table); 
    $this->db->limit($limit);
    $this->db->order_by('st.created_at', 'desc');
    $this->db->join('type', 'type.id=shop.type_id', 'left');
    $this->db->join('shop_transaction st', 'st.shop_id=shop.id', 'left');
    $query = $this->db->get();

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
    $this->db->select('shop.id as id, shop.name as product_name, type.name as type_name, type.short_name, st.quantity, st.price, st.created_at');
    $this->db->from($this->table);
    $this->db->join('type', 'type.id=shop.type_id', 'left');
    $this->db->join('shop_transaction st', 'st.shop_id=shop.id', 'left');
    $this->db->where('shop.id', $id);
    $query = $this->db->get();

    if($query->num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
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
