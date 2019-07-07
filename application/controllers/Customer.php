<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Customer';
        $this->load->view('templates/header');
        $this->load->view('pages/customers');
        $this->load->view('templates/footer');
    }
    public function get_customer()
    {
        $data = $this->Customer_model->get_customers();
        echo json_encode($data);
    }

    public function add_customer()
    {
        $data['title'] = 'Add New Guest';
        $this->load->view('templates/header');
        $this->load->view('pages/add_customer', $data);
        $this->load->view('templates/footer');
    }

    public function save_customer($customerId)
    {
        $filename = 'pic_' . $customerId . '.jpeg';
        if (move_uploaded_file($_FILES['webcam']['tmp_name'], 'upload/' . $filename)) { }
    }
    public function add_details()
    {
        $data = $this->Customer_model->add_customer();
        echo json_encode($data);
    }
    public function remove_customer()
    {
        $customerId = $this->input->post('customerId');
        $this->Customer_model->remove_customer($customerId);
        redirect('Customer');
    }
    public function edit_customer($customerId)
    {
        $data['customer'] = $this->Customer_model->get_customers($customerId);
        $this->load->view('templates/header');
        $this->load->view('pages/edit_customer', $data);
        $this->load->view('templates/footer');
    }
    public function update_details()
    {
        $customerId = $this->input->post('customerId');
        $this->Customer_model->update_customer($customerId);
        redirect('Customer');
    }
    public function add_documents($customerId)
    {
        $uploadDir = 'Documents';
        $rowId = $this->Customer_model->get_doc_id($customerId);
        if (!empty($_FILES)) {
            $tmpFile  = $_FILES['file']['tmp_name'];
            $filename = $uploadDir . '/Doc_' . $customerId . '_' . $rowId . '.jpeg';
            $this->Customer_model->add_doc_file($customerId, $filename);
            move_uploaded_file($tmpFile, $filename);
        }
    }
    public function add_documents_D($customerId)
    {
        $uploadDir = 'Documents';
        $rowId = $this->Customer_model->get_doc_id($customerId);
        if (!empty($_FILES)) {
            $tmpFile  = $_FILES['webcam']['tmp_name'];
            $filename = $uploadDir . '/Doc_' . $customerId . '_' . $rowId . '.jpeg';
            $this->Customer_model->add_doc_file($customerId, $filename);
            move_uploaded_file($tmpFile, $filename);
        }
    }
    public function checkAvailablity()
    {
        $email = $this->input->post('emailId');
        $response = [];
        $userId = $this->Customer_model->checkAvailablity($email);
        if ($userId) {
            $response['flag'] = true;
        } else {
            $response['flag'] = false;
        }
        echo json_encode($response);
    }
    public function checkAvailablityContact()
    {
        $email = $this->input->post('contactNumber');
        $response = [];
        $userId = $this->Customer_model->checkAvailablityContact($email);
        if ($userId) {
            $response['flag'] = true;
        } else {
            $response['flag'] = false;
        }
        echo json_encode($response);
    }
    public function fetch($customerId)
    {
        $data = $this->Customer_model->fetch_customer_doc($customerId);
        $result  = array();
        foreach ($data as $file) {
            $obj['name'] = $file['attachement'];
            $obj['size'] = filesize($file['attachement']);
            $result[] = $obj;
        }
        header('Content-type: text/json');
        header('Content-type: application/json');
        echo json_encode($result);
    }
    public function remove_customer_doc()
    {
        $filename = $this->input->post('name');
        $file = $this->Customer_model->remove_customer_doc($filename);
        if ($file)
            unlink($filename);
    }
}
