<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Roomdetails extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // $this->Rooms_model->get_roomtypes();
        $this->load->model('Rooms_model');
    }

    public function index()
	{
		// $this->load->view('dashboard');
       $data['roomtypes'] = $this->Rooms_model->get_roomtypes();

		// $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('pages/roomdetails');
        $this->load->view('templates/footer');
    }
    
    public function get_roomDetails(){
        $data = $this->Roomdetails_model->get_roomDetails();
        echo json_encode($data);
   }

   public function add_roomdetails(){
    // $data['title'] = 'Add New Guest';
    $data['roomtypes'] = $this->Rooms_model->fetch_roomtypes();
    // $data['roomname'] = $this->Booking_model->getRoomname();
    $this->load->view('templates/header');
    $this->load->view('pages/add_roomdetails',$data);
    $this->load->view('templates/footer');
}


public function edit_roomdetails($roomid){
    // $data['title'] = 'Add New Guest';
    // $roomid = $this->input->post('roomid');
    $data['roomid'] = $roomid;
    $data['roomtypes'] = $this->Rooms_model->fetch_roomtypes();
    
    // $data['roomtypes'] = $this->Rooms_model->fetch_roomtypes();
    // $data['roomname'] = $this->Booking_model->getRoomname();
    $this->load->view('templates/header');
    $this->load->view('pages/edit_roomdetails',$data);
    $this->load->view('templates/footer');
}


    public function getroomtypes(){
        // $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
      
        // $data = $this->Rooms_model->get_roomtypes();
        // echo json_encode($data);

        $data = $this->Rooms_model->fetch_roomtypes();
        echo  $this->Rooms_model->fetch_roomtypes();
        // echo json_encode($data);
    }

    	//Check type exists
	public function check_type_exists($roomNo){
		// $this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
		if($this->Roomdetails_model->check_type_exists($roomNo)){
			return true;
		} else {
			return false;
		}
	}

    public function create(){
       
        $roomNo = $this->input->post('roomno_input');
		$ret = $this->check_type_exists($roomNo);
			if($ret === false){
			$response['msg'] = false; 
		} else {
			$this->Roomdetails_model->create_roomDetails();
            $response['msg'] = true; 
        }
			echo json_encode($response);
		
    }

    public function fetch_roomdetails(){
        $roomid = $this->input->post('roomid');
		$data = $this->Roomdetails_model->fetch_roomdetails($roomid);
        echo json_encode($data);
    }

    public function update(){
             
        $roomid = $this->input->post('roomid');
		// $ret = $this->check_type_exists($roomNo);
		// 	if($ret === false){
		// 	$response['msg'] = false; 
		// } else {
			$this->Roomdetails_model->update_roomDetails($roomid);
            $response['msg'] = true; 
        // }
			echo json_encode($response);
		        
    }

    public function delete(){
        $roomid = $this->input->post('roomid');
        $this->Roomdetails_model->delete_room($roomid);
        redirect('Roomdetails');
		// echo json_encode($response);       
    }


      // public function loadForm 

      public function fetchRoomtypename(){
        $roomid = $this->input->post('roomid');
        $data = $this->Roomdetails_model->fetch_roomtypeid($roomid);
        
        echo json_encode($data);
    }



}


?>