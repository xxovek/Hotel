<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Customer extends CI_Controller{

    public function index()
	{
        $data['title'] ='Customer';
        $this->load->view('templates/header');
        $this->load->view('pages/customers');
        $this->load->view('templates/footer');
    }
    public function get_customer(){
        $data = $this->Customer_model->get_customers();
        echo json_encode($data);
    }
    
    public function add_customer(){
        $data['title'] = 'Add New Guest';
        $this->load->view('templates/header');
        $this->load->view('pages/add_customer',$data);
        $this->load->view('templates/footer');
    }

    public function save_customer($customerId){
        $filename = 'pic_'.date('YmdHis') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
}
}
public function add_details(){
    $this->Customer_model->add_customer();
    redirect('Customer');
}
public function remove_customer(){
    $customerId = $this->input->post('customerId');
    $this->Customer_model->remove_customer($customerId);
    redirect('Customer');
}
public function edit_customer($customerId){
    $data['customer'] = $this->Customer_model->get_customers($customerId);
    $this->load->view('templates/header');
    $this->load->view('pages/edit_customer',$data);
    $this->load->view('templates/footer');
}
public function update_details(){
    $customerId = $this->input->post('customerId');
    $this->Customer_model->update_customer($customerId);
    redirect('Customer');
}
}
