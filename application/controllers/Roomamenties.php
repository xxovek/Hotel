<?php


defined('BASEPATH') OR exit('No direct script access allowed');

Class Roomamenties extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
    //    $data['roomtypes'] = $this->Rooms_model->get_roomtypes();

        $this->load->view('templates/header');
        $this->load->view('pages/roomamenity');
        $this->load->view('templates/footer');
    }

    public function check_type_exists($name){
        if($this->Roomamenties_model->check_type_exists($name)){
			return true;
		} else {
			return false;
		}
    }

    public function showtbldata(){
        $data = $this->Roomamenties_model->showtbldata();
        // echo $this->Roomamenties_model->showtbldata();
        echo json_encode($data);                
    }

    public function create(){
        $Amenity_name = $this->input->post('amenityName');
        $ret = $this->check_type_exists($Amenity_name);
			if($ret === false){
			$response['msg'] = false; 
		} else {
			$this->Roomamenties_model->create();
            $response['msg'] = true; 
        }
            echo json_encode($response);        
    }

    public function delete_row(){
        $id = $this->input->post('id');
        $this->Roomamenties_model->delete_row($id);
        redirect('Roomamenties');

    }

    public function updateForm(){
        $Amenity_id = $this->input->post('id');

        $Amenity_name = $this->input->post('amenityName');
        $ret = $this->check_type_exists($Amenity_name);
			if($ret === false){
			$response['msg'] = false; 
		} else {
			$this->Roomamenties_model->updaterow($Amenity_id);
            $response['msg'] = true; 
        }
            echo json_encode($response);   
    }


}

?>