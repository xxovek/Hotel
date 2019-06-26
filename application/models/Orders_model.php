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

  public function get_orderdetails($orderId=FALSE){
      if($orderId==FALSE){
          $this->db->select("Orders.orderId,Customers.FirstName,
          Customers.lastName,Customers.contactNumber,Orders.Quantity,Products.productName,RoomDetails.roomNumber,RoomTypes.roomType,Orders.orderDate");
          $this->db->from('Orders');
          // $this->db->from('Bookings');
          $this->db->join('Customers', 'Customers.customerId = Orders.customerId','left');
          $this->db->join('Products', 'Products.ProductId = Orders.productId','left');
          $this->db->join('RoomDetails', 'RoomDetails.roomId = Orders.roomId','left');
          $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

          $query = $this->db->get();
          return $query->result_array();
      }

      $this->db->select("Orders.orderId,Orders.customerId,Orders.productId,Orders.roomId,Orders.Quantity,Customers.FirstName,
      Customers.lastName,Customers.contactNumber,Products.productName,RoomDetails.roomNumber,RoomTypes.roomType,Orders.orderDate");
      $this->db->from('Orders');
      $this->db->where('Orders.orderId',$orderId);
      $this->db->join('Customers', 'Customers.customerId = Orders.customerId','left');
      $this->db->join('Products', 'Products.ProductId = Orders.productId','left');
      $this->db->join('RoomDetails', 'RoomDetails.roomId = Orders.roomId','left');
      $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');
      $query = $this->db->get();
      return $query->row_array();
  }
  public function remove_order($bookingId){
    $this->db->where('orderId',$bookingId);
    $this->db->delete('Orders');
    return true;
  }
  public function update_order($bookingId){
    $data = array(
        'productId' => $this->input->post('productName'),
        'customerId'  => $this->input->post('customerName'),
        'roomId' => $this->input->post('roomNo'),
        'Quantity' => $this->input->post('quantity')
    );
    $this->db->where('orderId',$bookingId);
   return $this->db->update('Orders',$data);
  }

}
?>
