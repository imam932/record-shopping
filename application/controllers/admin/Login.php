<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['error_message'] = $this->session->flashdata('error_message');

		$this->load->view("admin/login", $data);
	}

	public function process_login()
	{
		$this->load->model('Model_user');

		// form validation
		$this->form_validation->set_rules('email', 'E-mail', 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != TRUE)
		{
			$data = array( // data dari form login
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->Model_user->login_admin($data);

			if($result != FALSE) //kondisi jika login berhasil
			{
				$admin = $this->Model_user->select_by_id($result[0]->id);

				$session_data = array(
					'id' => $result[0]->id,
					'nama' => $result[0]->nama,
					'level' => $result[0]->level
				);

				$this->session->set_userdata('logged_in', $session_data);
				redirect('admin/Dashboard','refresh');
			}
			else
			{
				$message['invalid_user'] = 'invalid username or password';
				$this->session->set_flashdata('error_message', $message);
				redirect('/','refresh');
			}
		}
		else
		{ //apabila form masih dalam keadaan kosong
			$message = array();

			if(form_error('email') != "")
			{
				$message['email'] = form_error('email');
			}
			if(form_error('password') != "")
			{
				$message['password'] = form_error('password');
			}

			$this->session->set_flashdata('error_message', $message);
			redirect('/','refresh');
		}
	}

// proses logout dari SI
	public function process_logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('/','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */
?>
