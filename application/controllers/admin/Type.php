<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends Admin_Controller{

  public function __construct(){
    parent::__construct();

    if(!$this->session->userdata('logged_in')['level'] == 1)
    {
      redirect('admin/Dashboard', 'refresh');
    }

    $this->load->model('model_type');
  }

  function index()
  {
    // load data
    $data['types']          = $this->model_type->select_all();

    // load content
    $data['content']       = $this->load->view('admin/type/index', $data, TRUE);
    // load template
    $data['title']         = "Type";
    $data['desc']		       = "Type";
    $data['breadcrumb']    = array('Dashboard', 'Type');
    $this->load->view('admin/template', $data);
  }

  public function create()
  {
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load content
    $data['content']        = $this->load->view('admin/type/create', $data, TRUE);
    // load template
    $data['title']          = "Type";
    $data['desc']		        = "New Type";
    $data['breadcrumb']     = array('Dashboard', 'Type', 'New');
    $this->load->view('admin/template', $data);
  }

  public function store()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      // /form validation
      $this->form_validation->set_rules('name', 'Neme', 'required|xss_clean');
      $this->form_validation->set_rules('short_name', 'Short Name', 'required|xss_clean');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/type/create', 'refresh');
      }
      else
      {
        $this->model_type->insert();
        $this->session->set_flashdata('message', 'Success ! Type has been added');
        redirect('admin/type', 'refresh');
      }
    }
  }

public function edit($id)
{
  //error handling
  $data = array();
  if(!empty($this->session->flashdata('error')))
  {
    $data['error'] = $this->session->flashdata('error');
  }
  // load data
  $data['type'] = $this->model_type->select_by_id($id);
  // load page
  $data['content']        = $this->load->view('admin/type/edit', $data, TRUE);

  // load template
  $data['title']          = "Type";
  $data['desc']		        = "Edir Type";
  $data['breadcrumb']     = array('Dashboard', 'Type', 'Edit');
  $this->load->view('admin/template', $data);
}

  public function update($id)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('name', 'Neme', 'required|xss_clean');
      $this->form_validation->set_rules('short_name', 'Short Name', 'required|xss_clean');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/type/edit/' . $id, 'refresh');
      }
      else
      {
        $data['name']    = $this->input->post('name');
        $data['short_name']  = $this->input->post('short_name');

        $this->model_type->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! Type has been edited');
        redirect('admin/type', 'refresh');
      }
    }
  }

  public function delete($id)
  {
    $this->model_type->delete($id);
    $this->session->set_flashdata('message', 'Success ! Type has been deleted');
    redirect('admin/type', 'refresh');
  }
}
