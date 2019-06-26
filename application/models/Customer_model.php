<?php
class Customer_model extends CI_Model{

    public function __construct(){
         $this->load->database();
    }

    public function get_customers($customerId=FALSE){
        if($customerId==FALSE){
            $query = $this->db->get('Customers');
            return $query->result_array();
        }
        $query = $this->db->get_where('Customers',array('customerId'=>$customerId));
        return $query->row_array();
    }
    public function add_customer(){
        $data = array(
            'FirstName' => $this->input->post('fname'),
            'lastName'  => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('emailid'),
            'contactNumber' => $this->input->post('contactNumber')
        );
       $this->db->insert('Customers',$data);
       $this->db->select("Customers.customerId");
       $this->db->from('Customers');
       $this->db->order_by('customerId',"desc");
       $this->db->limit(1);
       $query = $this->db->get();
       return $query->row_array();

    }
    public function update_customer($customerId){
        $data = array(
            'FirstName' => $this->input->post('fname'),
            'lastName'  => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('emailid'),
            'contactNumber' => $this->input->post('contactNumber')
        );
        $this->db->where('customerId',$customerId);
       return $this->db->update('Customers',$data);
    }

    public function remove_customer($customerId){
        $this->db->where('customerId',$customerId);
        $this->db->delete('Customers');
        return true;
    }
    public function checkAvailablity($email){
        $this->db->where('email',$email);
        $result = $this->db->get('Customers');
        if($result->num_rows()==1){
            return $result->row(0)->customerId;
        }else{
            return false;
        }
    }
    public function checkAvailablityContact($contactNumber){
        $this->db->where('contactNumber',$contactNumber);
        $result = $this->db->get('Customers');
        if($result->num_rows()==1){
            return $result->row(0)->customerId;
        }else{
            return false;
        }
    }
}
