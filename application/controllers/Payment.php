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
      public function add_payment($customerId=FALSE){
          $data['customerId'] = $customerId;
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

      public function getPaymentTable(){
          $data = $this->Payment_model->getPaymentTable();
          echo json_encode($data);
      }
      public function showPdfPage($PaymentId=FALSE){
      $data['companyinformation'] = $this->Payment_model->getCompanyInformation($PaymentId);
      $data['customer'] = $this->Payment_model->getCustomerDetailPayment($PaymentId);
      $data['bookings'] = $this->Payment_model->getPaymentIdBookings($PaymentId);
      $data['orders'] = $this->Payment_model->getPaymentIdOrders($PaymentId);
      //  $data['paymentId'] = $paymentId;
        $this->load->view('templates/header');
        $this->load->view('pages/showreceipt',$data);
        $this->load->view('templates/footer');
      }
}


?>
