<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Products extends CI_Controller{

    public function index()
	{
		// $this->load->view('dashboard');
		// $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('pages/products');
        $this->load->view('templates/footer');
    }
    
    public function create(){
        $this->Product_model->create();
        $response['msg'] = true; 
		echo json_encode($response);
    }

    public function getproducts(){
        $data = $this->Product_model->getproducts();
        echo json_encode($data);
    }

    public function edit_product(){
        
        $productid = $this->input->post('productid');

        $this->Product_model->update($productid);
        $response['msg'] = true; 
		echo json_encode($response);
    }

    public function delete(){
        $productid = $this->input->post('productid');
        $this->Product_model->delete($productid);
       // redirect('Roomdetails');
    }


}


?>
