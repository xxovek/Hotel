<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Payments extends CI_Controller{

    public function index()
	{
	    $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
    
        $this->load->view('templates/header');
        $this->load->view('pages/paymentstypes',$data);
        $this->load->view('templates/footer');
    }
	
	
    	//Check type exists
		public function check_type_exists($typeName){

			$this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
			if($this->Payment_model->check_type_exists($typeName)){
				return true;
			} else {
				return false;
			}
		}

		public function getTypes(){
			$data = $this->Payment_model->get_paymentstypes();
			echo json_encode($data);
		}

	    public function create(){
          
			$type = $this->input->post('typename');
			$ret = $this->check_type_exists($type);
				if($ret === false){
				$response['msg'] = false; 
				echo json_encode($response);
			} else {
				$this->Payment_model->create_paymentstypes();
				$response['msg'] = true; 
				echo json_encode($response);
			     
			}

        }
		
		public function update(){
				$this->Payment_model->update_type();//call to model function update_post
				$response['msg'] = true; 
				echo json_encode($response);
			}
       
  		  public function delete(){
			$typeid = $this->input->post('typeid');
			$this->Payment_model->delete_type($typeid);
			redirect('Payments');
		}
}

?>