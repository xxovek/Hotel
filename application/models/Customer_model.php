<?php 
class Customer_model extends CI_Model{

    public function __construct(){
         $this->load->database();
    }

    public function get_customers(){
        $query = $this->db->get('Customers');
        return $query->result_array();
    }
}

?>