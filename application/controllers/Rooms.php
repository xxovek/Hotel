<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Rooms extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');
        $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
		// $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('pages/roomtypes',$data);
        $this->load->view('templates/footer');
    }
    
   
		public function create(){
            // echo "in create" ;
			// Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }

			// $data['title'] = 'Create Category';

			$this->form_validation->set_rules('roomtypeName', 'Room Type', 'required');

			if($this->form_validation->run() === FALSE){
            $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
                
                $this->load->view('templates/header');
				$this->load->view('pages/roomtypes',$data);
				$this->load->view('templates/footer');
			} else {
				$this->Rooms_model->create_roomtype();

			// 	// Set message
			// 	// $this->session->set_flashdata('category_created', 'Your category has been created');

				redirect('Rooms');
			}
		}
}


?>