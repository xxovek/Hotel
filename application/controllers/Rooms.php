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
	//Check type exists
	public function check_type_exists($typeName){
		$this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
		if($this->Rooms_model->check_type_exists($typeName)){
			return true;
		} else {
			return false;
		}
	}
   
		public function create(){
            // echo "in create" ;
			// Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }


			$this->form_validation->set_rules('roomtypeName', 'Room Type', 'required|callback_check_type_exists');

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


		public function update(){
            // if(!$this->session->userdata('logged_in')){
            //   redirect('users/login');
            // }
            // echo "Updated";


            $this->form_validation->set_rules('roomtypeName1', 'Room Type', 'required|callback_check_type_exists');

			if($this->form_validation->run() === FALSE){
            $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
                
                $this->load->view('templates/header');
				$this->load->view('pages/roomtypes',$data);
				$this->load->view('templates/footer');
			} else {
				$this->Rooms_model->update_type();//call to model function update_post
           // $this->session->set_flashdata('post_updated', 'Your Post has been updated');
      
                  redirect('Rooms');
			}
       
            
		  }
		  
		  public function delete($id){
            // if(!$this->session->userdata('logged_in')){
            //   redirect('users/login');
            // }
      
            $this->Rooms_model->delete_type($id);
            // $this->session->set_flashdata('post_deleted', 'Your Post has been Deleted');
      
            redirect('Rooms');
          }

		
}


?>