<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Booking extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];
        $data['customername'] = $this->Booking_model->getCustomername();
        $data['roomname'] = $this->Booking_model->getRoomname();
        $this->load->view('templates/header');
        $this->load->view('pages/booking',$data);
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
}


?>
