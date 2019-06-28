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
    $this->load->view('pages/order',$data);
    $this->load->view('templates/footer');
	}

  public function saveOrderDetail(){ //insert record method
      $insertUser = $this->Orders_model->insertOrderDetail();
      return $insertUser;
    }
    public function get_orders(){
        $data = $this->Orders_model->get_orderdetails();
        echo json_encode($data);
    }
    public function orderDetail(){
        $bookingId = $this->input->post('orderId');
        $data = $this->Orders_model->get_orderdetails($bookingId);
        echo json_encode($data);
    }
    public function add_orders(){
        $data['title'] = 'Add New Order';
        // $data['customername'] = $this->Booking_model->getCustomername();
        // $data['roomname'] = $this->Booking_model->getRoomname();
        $data['productname'] = $this->Orders_model->getProductsname();
        $data['customername'] = $this->Booking_model->getCustomername();
        $data['roomname'] = $this->Booking_model->getRoomname();
        $this->load->view('templates/header');
        $this->load->view('pages/add_orders',$data);
        $this->load->view('templates/footer');
        // redirect('Orders');
    }

    public function remove_order(){
        $bookingId = $this->input->post('bookingId');
        $this->Orders_model->remove_order($bookingId);
        redirect('Orders');
    }
    public function edit_order($bookingId){
      $data['productname'] = $this->Orders_model->getProductsname();
      $data['customername'] = $this->Booking_model->getCustomername();
      $data['roomname'] = $this->Booking_model->getRoomname();
      $data['bookid'] = $bookingId;
        $this->load->view('templates/header');
        $this->load->view('pages/edit_order',$data);
        $this->load->view('templates/footer');
    }
    public function updateOrderDetail(){
        $bookingId = $this->input->post('orderId');
        $this->Orders_model->update_order($bookingId);
         $this->load->helper('url');
        // redirect('Booking');
        // redirect('booking');
        // redirect('http://localhost/Hotel/index.php/Booking/index');
    }

}


?>
