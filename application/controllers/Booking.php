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
          redirect('booking');
      }
      public function edit_booking($bookingId){
        $data['customername'] = $this->Booking_model->getCustomername();
        $data['roomname'] = $this->Booking_model->getRoomname();
        $data['bookid'] = $bookingId;
          $this->load->view('templates/header');
          $this->load->view('pages/edit_booking',$data);
          $this->load->view('templates/footer');
      }

      public function get_customer(){
          $data = $this->Customer_model->get_customers();
          echo json_encode($data);
      }
      public function bookingDetail(){
          $bookingId = $this->input->post('bookingId');
          $data = $this->Booking_model->get_bookingdetails($bookingId);
          echo json_encode($data);
      }
      public function updateBookingDetail(){
          $bookingId = $this->input->post('bookingId');
          $this->Booking_model->update_booking($bookingId);
           $this->load->helper('url');
          // redirect('Booking');
          // redirect('booking');
          // redirect('http://localhost/Hotel/index.php/Booking/index');
      }
}


?>
