<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller{

  public function __construct(){
    parent::__construct();

    if(!$this->session->userdata('logged_in')['level'] == 1)
    {
      redirect('admin/Dashboard', 'refresh');
    }

    $this->load->model('model_user');
  }

  function index()
  {
    // load data
    $data['user']          = $this->model_user->select_all();

    // load content
    $data['content']       = $this->load->view('admin/users', $data, TRUE);
    // load template
    $data['title']         = "Users";
    $data['desc']		       = "Users";
    $data['breadcrumb']    = array('Dashboard', 'User');
    $this->load->view('admin/template', $data);
  }

  public function New()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Users/New', 'refresh');
      }
      else
      {
        $this->model_user->insert();

        $this->session->set_flashdata('message', 'Success ! User has been added');
        redirect('admin/Users', 'refresh');

      }
    }
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load content
    $data['content']        = $this->load->view('admin/user_new', $data, TRUE);
    // load template
    $data['title']          = "Users";
    $data['desc']		        = "New User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'New');
    $this->load->view('admin/template', $data);
  }

  public function editUsers($id)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|xss_clean');
      $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|xss_clean');
      $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');

      if(!$this->form_validation->run())
      {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Users/editUsers/' . $id, 'refresh');
      }
      else
      {
        $data['nama']    = $this->input->post('nama');
        $data['email']  = $this->input->post('email');
        $data['tgl_lahir']   = $this->input->post('tgl_lahir');

        $this->model_users->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! User has been edited');
        redirect('admin/Users', 'refresh');
      }
    }
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load data
    $data['user'] = $this->model_users->select_by_id($id);
    // load page
    $data['content']        = $this->load->view('admin/users_edit', $data, TRUE);

    // load template
    $data['title']          = "Users";
    $data['desc']		        = "Edir User";
    $data['breadcrumb']     = array('Dashboard', 'User', 'Edit');
    $this->load->view('admin/template', $data);
  }

  public function deleteUsers($id)
  {
    $this->model_users->delete($id);
    $this->session->set_flashdata('message', 'Success ! User has been deleted');
    redirect('admin/Users', 'refresh');
  }
}
