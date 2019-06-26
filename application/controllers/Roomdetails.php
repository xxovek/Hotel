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
    
    // public function loadForm 

    public function get_roomDetails(){
        $data = $this->Roomdetails_model->get_roomDetails();
        echo json_encode($data);
   }



    // public function add_roomForm(){
    //     // $data['title'] = 'Add New Guest';
    //     $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
    //     $this->load->view('templates/header');
    //     $this->load->view('pages/roomdetails',$data);
    //     $this->load->view('templates/footer');
    // }
    
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
        // echo "inserted";
        // $data['roomtypes'] = $this->Rooms_model->get_roomtypes();

        $roomNo = $this->input->post('roomno_input');
		$ret = $this->check_type_exists($roomNo);
			if($ret === false){
			$response['msg'] = false; 
		// 	echo json_encode($response);
		} else {
        // url:base_url+'index.php/Roomdetails/create',
			$this->Roomdetails_model->create_roomDetails();
            $response['msg'] = true; 
        }
			echo json_encode($response);
			 // 	// Set message
			 // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

		// }
            // return true;
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function check_roomNo_exists(){
        
    }

}


?>