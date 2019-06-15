<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
        $this->load->view('login');
	}
	public function authentication(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userId = $this->authentication_model->authenticate($username,$password);
		if($userId){
			$user_data = array(
				'user_id' => $userId,
				'logged_in' => true
			);
			$this->session->set_userdata($user_data);
			redirect('Dashboard');
		}else{
			redirect('Login');
		}
	}
	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('logged_in');
		redirect('Login');
	}
}
