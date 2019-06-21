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
       return $this->db->insert('Customers',$data);
    }
    public function remove_customer($customerId){
        $this->db->where('customerId',$customerId);
        $this->db->delete('Customers');
        return true;
    }
}

?>