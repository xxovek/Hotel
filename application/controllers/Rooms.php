<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Rooms extends CI_Controller{

    public function index()
	{
        $data['roomtypes'] = $this->Rooms_model->get_roomtypes();
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
   

		public function getTypes(){
			$data = $this->Rooms_model->get_roomtypes();
			echo json_encode($data);
		}


		public function create(){
			$type = $this->input->post('typename');
			$ret = $this->check_type_exists($type);
				if($ret === false){
				$response['msg'] = false; 
				echo json_encode($response);
			} else {
				$this->Rooms_model->create_roomtype();
				$response['msg'] = true; 
				echo json_encode($response);
			    
			}

		}
		
		  public function update(){
			$this->Rooms_model->update_type();//call to model function update_post
			$response['msg'] = true; 
			echo json_encode($response);
		}
   

			  
		  public function delete(){
			$typeid = $this->input->post('typeid');
			$this->Rooms_model->delete_type($typeid);
			redirect('Rooms');
		}

		
}


?>