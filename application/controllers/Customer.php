<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Customer extends CI_Controller{

    public function index()
	{

        $data['title'] ='Customer';
        $data['customers'] = $this->Customer_model->get_customers();
        $this->load->view('templates/header');
        $this->load->view('pages/customers',$data);
        $this->load->view('templates/footer');
	}
}


?>