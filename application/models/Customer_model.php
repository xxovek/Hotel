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
       return $this->db->insert('Customers',$data);
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
}

?>