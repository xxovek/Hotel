<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Orders extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];
    $data['productname'] = $this->Orders_model->getProductsname();
    $data['customername'] = $this->Booking_model->getCustomername();
    $data['roomname'] = $this->Booking_model->getRoomname();
        $this->load->view('templates/header');
        $this->load->view('pages/orders',$data);
        $this->load->view('templates/footer');
	}

  public function saveOrderDetail(){ //insert record method
      $insertUser = $this->Orders_model->insertOrderDetail();
      return $insertUser;
    }
}


?>
