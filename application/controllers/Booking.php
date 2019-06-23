<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Booking extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('pages/booking');
        $this->load->view('templates/footer');
	}
  public function customerDetails(){ //insert record method
       $data = $this->Booking_model->getCustomername();
        echo json_encode($data);
    }
    public function saveBookingDetail(){ //insert record method
        $insertUser = $this->Booking_model->insertBookingDetail();
        return $insertUser;
      }
      public function checkroomavaiableBookingDetail(){
        $data = $this->Booking_model->checkroomavaiableBookingDetail();
         echo json_encode($data);
      }
      public function add_booking(){
          $data['title'] = 'Add New Guest';
          $data['customername'] = $this->Booking_model->getCustomername();
          $data['roomname'] = $this->Booking_model->getRoomname();
          $this->load->view('templates/header');
          $this->load->view('pages/add_booking',$data);
          $this->load->view('templates/footer');
      }
      public function get_booking(){
          $data = $this->Booking_model->get_bookingdetails();
          echo json_encode($data);
      }
      public function remove_booking(){
          $bookingId = $this->input->post('bookingId');
          $this->Booking_model->remove_booking($bookingId);
          redirect('Booking');
      }
      public function edit_booking($bookingId){
        $data['customername'] = $this->Booking_model->getCustomername();
        $data['roomname'] = $this->Booking_model->getRoomname();
        $data['bookingid'] = $this->Booking_model->get_bookingdetails($bookingId);
          $this->load->view('templates/header');
          $this->load->view('pages/edit_booking',$data);
          $this->load->view('templates/footer');
      }
      // public function update_details(){
      //     $customerId = $this->input->post('customerId');
      //     $this->Customer_model->update_customer($customerId);
      //     redirect('Customer');
      // }
}


?>
