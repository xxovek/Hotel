<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Roomdetails extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('pages/roomdetails');
        $this->load->view('templates/footer');
	}
}


?>