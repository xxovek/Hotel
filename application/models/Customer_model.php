<?php 
class Customer_model extends CI_Model{

    public function __construct(){
         $this->load->database();
    }

    public function get_customers(){
        $query = $this->db->get('Customers');
        return $query->result_array();
    }
    public function add_customer(){
        $data = array(
            'FirstName' => $this->input->post('fname'),
            'lastName'  => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('emailid'),
            'contactNumber' => $this->input->post('contactNumber')
        );
        // $query = $this->db->get('Customers');
        // return $query->result_array();
        $this->db->insert('Customers',$data);
        // // echo $result;
    }
}

?>