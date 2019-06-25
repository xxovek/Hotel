<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Roomdetails extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');

		// $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('pages/roomdetails');
        $this->load->view('templates/footer');
    }
    
    public function get_roomDetails(){
        $data = $this->Roomdetails_model->get_roomDetails();
        echo json_encode($data);
    }

    // public function add_roomForm(){
    //     $data['title'] = 'Add New Guest';
    //     $this->load->view('templates/header');
    //     $this->load->view('pages/add_roomForm',$data);
    //     $this->load->view('templates/footer');
    // }

    public function create(){
        // echo "inserted";
        // $type = $this->input->post('roomno_input');
		// $ret = $this->check_type_exists($type);
		// 	if($ret === false){
		// 	$response['msg'] = false; 
		// 	echo json_encode($response);
		// } else {
        // url:base_url+'index.php/Roomdetails/create',
			$this->Roomdetails_model->create_roomDetails();
			// $response['msg'] = true; 
			echo json_encode($response);
			 // 	// Set message
			 // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

		// }
            return true;
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function check_roomNo_exists(){
        
    }

}


?>