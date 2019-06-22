<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Payments extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');
		// $data['title'] = $data['post']['title'];
        $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
    
        $this->load->view('templates/header');
        $this->load->view('pages/paymentstypes',$data);
        $this->load->view('templates/footer');
    }
	
		//Check type exists
		// public function check_type_exists1($typeName){
		// 	$response['status'] = '';
		// 	$typeName = $this->input->post('type');
		// 	$this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
		// 	if($this->Payment_model->check_type_exists($typeName)){
		// 		 return true;
		// 		//$response['status'] = true;
		// 	} else {
		// 		return false;
		// 		//$response['status'] = false;
		// 	}
		// 	//echo json_encode($response);
		// }

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

		// public function create(){
		// 	// Check login
		// 	// if(!$this->session->userdata('logged_in')){
		// 	// 	redirect('users/login');
		// 	// }

		// 	// $data['title'] = 'Create Category';

		// 	$this->form_validation->set_rules('paymenttypeName', 'Payment Type', 'required|callback_check_type_exists');

		// 	if($this->form_validation->run() === FALSE){
        //     $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
                
        //         $this->load->view('templates/header');
		// 		$this->load->view('pages/paymentstypes',$data);
		// 		$this->load->view('templates/footer');
		// 	} else {
		// 		$this->Payment_model->create_paymentstypes();

		// 	     // 	// Set message
		// 	     // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

		// 		redirect('Payments');
		// 	}
        // }

        public function create(){
            // $data = array(
            //     'paymentType' => $this->input->post('paymenttypeName')
            //     // 'user_id' => $this->session->userdata('user_id')
			// );
			
			// $type = $this->input->post('typename');
            // $ret = check_type_exists1($type);
           $this->form_validation->set_rules('paymenttypeName', 'Payment Type', 'required|callback_check_type_exists');
				// if($ret === FALSE){
			if($this->form_validation->run() === FALSE){

            // $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
                
            //     $this->load->view('templates/header');
			// 	$this->load->view('pages/paymentstypes',$data);
			// 	$this->load->view('templates/footer');
				// redirect('Payments');
				$this->load->view('templates/header');
				$this->load->view('pages/paymentstypes');
				$this->load->view('templates/footer');

			} else {
				$this->Payment_model->create_paymentstypes();

			     // 	// Set message
			     // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

				// redirect('Payments');
			}

        }
        
       
        public function update(){
            // if(!$this->session->userdata('logged_in')){
            //   redirect('users/login');
            // }

            $this->form_validation->set_rules('paymenttypeName1', 'Payment Type', 'required|callback_check_type_exists');

			if($this->form_validation->run() === FALSE){
			//   redirect('Payments');   
			    $this->load->view('templates/header');
				$this->load->view('pages/paymentstypes');
				$this->load->view('templates/footer');

			} else {
				$this->Payment_model->update_type();//call to model function update_post
           // $this->session->set_flashdata('post_updated', 'Your Post has been updated');
                  redirect('Payments');
			}
       
            
          }


		  public function delete(){
			$typeid = $this->input->post('typeid');
			$this->Payment_model->delete_type($typeid);
			redirect('Payments');
		}
}

?>