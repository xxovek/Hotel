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
		public function check_type_exists($typeName){
			$this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
			if($this->Payment_model->check_type_exists($typeName)){
				return true;
			} else {
				return false;
			}
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
            
            //$this->form_validation->set_rules('paymenttypeName', 'Payment Type', 'required|callback_check_type_exists');
				if($this->form_validation->run() === FALSE){
            $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
                
                $this->load->view('templates/header');
				$this->load->view('pages/paymentstypes',$data);
				$this->load->view('templates/footer');
			} else {
				$this->Payment_model->create_paymentstypes();

			     // 	// Set message
			     // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

				redirect('Payments');
			}

        }
        
       
        public function update(){
            // if(!$this->session->userdata('logged_in')){
            //   redirect('users/login');
            // }
            // echo "Updated";


            $this->form_validation->set_rules('paymenttypeName1', 'Payment Type', 'required|callback_check_type_exists');

			if($this->form_validation->run() === FALSE){
            $data['paymenttypes'] = $this->Payment_model->get_paymentstypes();
                
                $this->load->view('templates/header');
				$this->load->view('pages/paymentstypes',$data);
				$this->load->view('templates/footer');
			} else {
				$this->Payment_model->update_type();//call to model function update_post
           // $this->session->set_flashdata('post_updated', 'Your Post has been updated');
      
                  redirect('Payments');
			}
       
            
          }


          public function delete($id){
            // if(!$this->session->userdata('logged_in')){
            //   redirect('users/login');
            // }
      
            $this->Payment_model->delete_type($id);
            // $this->session->set_flashdata('post_deleted', 'Your Post has been Deleted');
      
            redirect('Payments');
          }
}

?>