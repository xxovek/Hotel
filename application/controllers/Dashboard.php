<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['Rooms'] = $this->Dashboard_model->get_room_details();
		$data['Customers'] =  $this->Dashboard_model->get_total_customers();
        $this->load->view('templates/header');
        $this->load->view('pages/dashboard',$data);
        $this->load->view('templates/footer');
	}
}
