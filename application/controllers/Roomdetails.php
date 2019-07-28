<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Roomdetails extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Rooms_model');
        // $this->load->modal('Roomamenties_model');
    }

    public function index(){
       $data['roomtypes'] = $this->Rooms_model->get_roomtypes();

        $this->load->view('templates/header');
        $this->load->view('pages/roomdetails');
        $this->load->view('templates/footer');
    }

    public function showtbldata(){
      $roomid = $this->input->post('roomid');
      $data = $this->Roomdetails_model->showtbldataforroomdetail($roomid);
      echo json_encode($data);
    }

    public function get_roomDetails(){
        $data = $this->Roomdetails_model->get_roomDetails();
        echo json_encode($data);
   }

   public function add_roomdetails(){
    $data['roomtypes'] = $this->Rooms_model->fetch_roomtypes();
    $data['amenities'] = $this->Roomamenties_model->fetch_amienities();
    $this->load->view('templates/header');
    $this->load->view('pages/add_roomdetails',$data);
    $this->load->view('templates/footer');
}



  public function edit_roomdetails($roomid){
      $data['roomid'] = $roomid;
      $data['roomtypes'] = $this->Rooms_model->fetch_roomtypes();
      $data['amenities'] = $this->Roomamenties_model->fetch_amienities();

      $this->load->view('templates/header');
      $this->load->view('pages/edit_roomdetails',$data);
      $this->load->view('templates/footer');
  }


    public function getroomtypes(){
        // $data = $this->Rooms_model->fetch_roomtypes();
        echo  $this->Rooms_model->fetch_roomtypes();
    }

    	//Check type exists
	// public function check_type_exists($roomNo){
	// 	if($this->Roomdetails_model->check_type_exists($roomNo)){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

    public function create(){
        $roomNo = $this->input->post('roomno_input');

        if($this->Roomdetails_model->check_type_exists($roomNo)){
            $response['msg'] = false;
        }else{
            $this->Roomdetails_model->create_roomDetails();
            $response['msg'] = true;
        }


		echo json_encode($response);
    }

    public function fetch_roomdetails(){
        $roomid = $this->input->post('roomid');
		$data = $this->Roomdetails_model->fetch_roomdetails($roomid);
        echo json_encode($data);
    }

    public function update(){
            $roomid = $this->input->post('roomid');
			$this->Roomdetails_model->update_roomDetails($roomid);
            $response['msg'] = true;
			echo json_encode($response);
    }

    public function delete(){
        $roomid = $this->input->post('roomid');
        $this->Roomdetails_model->delete_room($roomid);
        redirect('Roomdetails');
    }


      // public function loadForm

      public function fetchRoomtypename(){
        $roomid = $this->input->post('roomid');
        $data = $this->Roomdetails_model->fetch_roomtypeid($roomid);
        echo json_encode($data);
    }

    

}


?>
