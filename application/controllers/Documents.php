<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Documents extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');
		// $data['title'] = $data['post']['title'];
        $data['DocumentType'] = $this->Documents_model->get_documenttypes();
        $this->load->view('templates/header');
        $this->load->view('pages/documentstypes',$data);
        $this->load->view('templates/footer');
	}
	
		//Check type exists
		public function check_type_exists($typeName){
			$this->form_validation->set_message('check_type_exists', 'That Type is already taken. Please Add different one');
			if($this->Documents_model->check_type_exists($typeName)){
				return true;
			} else {
				return false;
			}
		}
    public function create(){
        	// Check login
			// if(!$this->session->userdata('logged_in')){
			// 	redirect('users/login');
			// }

			// $data['title'] = 'Create Category';

			$this->form_validation->set_rules('documenttypeName', 'Document Type', 'required|callback_check_type_exists');

			if($this-Payment_model>form_validation->run() === FALSE){
            $data['DocumentType'] = $this->Documents_model->get_documenttypes();
                
                $this->load->view('templates/header');
				$this->load->view('pages/documentstypes',$data);
				$this->load->view('templates/footer');
			} else {
				$this->Documents_model->create_documentstypes();

			     // 	// Set message
			     // 	// $this->session->set_flashdata('category_created', 'Your category has been created');

				redirect('Documents');
			}

	}
	

	public function update(){
		// if(!$this->session->userdata('logged_in')){
		//   redirect('users/login');
		// }
		// echo "Updated";


		$this->form_validation->set_rules('documenttypeName1', 'Document Type', 'required|callback_check_type_exists');

		if($this->form_validation->run() === FALSE){
		$data['DocumentType'] = $this->Documents_model->get_documenttypes();
			
			$this->load->view('templates/header');
			$this->load->view('pages/documentstypes',$data);
			$this->load->view('templates/footer');
		} else {
			$this->Documents_model->update_type();//call to model function update_post
	   // $this->session->set_flashdata('post_updated', 'Your Post has been updated');
  
			  redirect('Documents');
		}
   
		
	  }

	  public function delete($id){
		// if(!$this->session->userdata('logged_in')){
		//   redirect('users/login');
		// }
  
		$this->Documents_model->delete_type($id);
		// $this->session->set_flashdata('post_deleted', 'Your Post has been Deleted');
  
		redirect('Documents');
	  }

}

Payment_model
?>