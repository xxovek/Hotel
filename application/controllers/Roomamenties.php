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

    public function create(){
        
    }

}

?>