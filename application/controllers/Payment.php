<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Payment extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('pages/payment');
        $this->load->view('templates/footer');
	}

    public function savePaymentDetail(){ //insert record method
        $insertUser = $this->Payment_model->insertPaymentDetail();
        return $insertUser;
      }
      // public function checkroomavaiableBookingDetail(){
      //   $data = $this->Booking_model->checkroomavaiableBookingDetail();
      //    echo json_encode($data);
      // }
      public function add_payment(){
          $data['title'] = 'Add New Guest';
          // $data['payment']= $this->Payment_model->getPaymentDetail();
          $data['customer'] = $this->Payment_model->getCustomerType();
          $data['paymentType'] = $this->Payment_model->getPaymentType();
          $this->load->view('templates/header');
          $this->load->view('pages/add_payment',$data);
          $this->load->view('templates/footer');
      }
      public function getPaymentDetail(){
            $bookingId = $this->input->post('BookingName');
            $data = $this->Payment_model->getPaymentDetail($bookingId);
            echo json_encode($data);
      }
      public function getPaymentDetailCustomer(){
            $customerId = $this->input->post('BookingName');
            $data = $this->Payment_model->getPaymentDetailCustomer($customerId);
            echo json_encode($data);
      }
      public function getOrderDetailCustomer(){
            $customerId = $this->input->post('BookingName');
            $data = $this->Payment_model->getOrderDetailCustomer($customerId);
            echo json_encode($data);
      }
      // public function get_booking(){
      //     $data = $this->Booking_model->get_bookingdetails();
      //     echo json_encode($data);
      // }
      // public function remove_booking(){
      //     $bookingId = $this->input->post('bookingId');
      //     $this->Booking_model->remove_booking($bookingId);
      //     redirect('booking');
      // }
      // public function edit_booking($bookingId){
      //   $data['customername'] = $this->Booking_model->getCustomername();
      //   $data['roomname'] = $this->Booking_model->getRoomname();
      //   $data['bookid'] = $bookingId;
      //     $this->load->view('templates/header');
      //     $this->load->view('pages/edit_booking',$data);
      //     $this->load->view('templates/footer');
      // }
      //
      // public function get_customer(){
      //     $data = $this->Customer_model->get_customers();
      //     echo json_encode($data);
      // }
      // public function bookingDetail(){
      //     $bookingId = $this->input->post('bookingId');
      //     $data = $this->Booking_model->get_bookingdetails($bookingId);
      //     echo json_encode($data);
      // }
      // public function updateBookingDetail(){
      //     $bookingId = $this->input->post('bookingId');
      //     $this->Booking_model->update_booking($bookingId);
      //      $this->load->helper('url');
      //     // redirect('Booking');
      //     // redirect('booking');
      //     // redirect('http://localhost/Hotel/index.php/Booking/index');
      // }
}


?>
