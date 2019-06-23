<?php
class Orders_model extends CI_Model{
  public function __construct(){
       $this->load->database();
  }
  function getProductsname(){
    $this->db->select('ProductId,productName,productPrice');
    $query = $this->db->get('Products');
    return $query->result();
  }
  function insertOrderDetail(){
    $data=array(
      'ProductId'        => $this->input->post('productName'),
      'customerId'        => $this->input->post('customerName'),
      'roomId'       => $this->input->post('roomNo'),
      'Quantity'       => $this->input->post('quantity')
    );
    $result=$this->db->insert('Orders', $data);
    return $result;
  }

}
?>
