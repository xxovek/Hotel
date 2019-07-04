<?php

class Payment_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_paymentstypes(){
        $query = $this->db->get('PaymentTypes');
        return $query->result_array();
    }

    public function get_paymentstype_byId($id){
        $query = $this->db->get('PaymentTypes');
        return $query->result_array();
    }


    public function create_paymentstypes(){
        $data = array(
            'paymentType' => $this->input->post('typename')
        );

        return $this->db->insert('PaymentTypes', $data);
    }

    public function update_type(){
        $typeid = $this->input->post('typeid');
        $data = array(
            'paymentType' => $this->input->post('typename')
          );
          $this->db->where('paymentTypeId',$typeid);
          return $this->db->update('PaymentTypes',$data);
    }

    // Check username exists
		public function check_type_exists($typeName){
			$query = $this->db->get_where('PaymentTypes', array('paymentType' => $typeName));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
    public function delete_type($id){
        $this->db->where('paymentTypeId',$id);
        $this->db->delete('PaymentTypes');
      return true;
    }

    // kunal created function
    public function getPaymentDetail($bookingId=FALSE){
        if($bookingId==FALSE){
      $this->db->select("Bookings.BookingId,Customers.customerId,Bookings.Nights,Bookings.FromDate,Bookings.UptoDate,Customers.FirstName,
      Customers.lastName,Customers.contactNumber,RoomDetails.pricePerNight,RoomDetails.maxPersons,RoomDetails.roomNumber,RoomTypes.roomType");
      $this->db->from('Bookings');
      $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
      $this->db->join('RoomDetails', 'RoomDetails.roomId = Bookings.roomId','left');
      $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

      $query = $this->db->get();
      return $query->result();
    }
    $this->db->select("Bookings.BookingId,Customers.customerId,Bookings.Nights,Bookings.FromDate,Bookings.UptoDate,Customers.FirstName,
    Customers.lastName,Customers.contactNumber,RoomDetails.pricePerNight,RoomDetails.maxPersons,RoomDetails.roomNumber,RoomTypes.roomType");
    $this->db->from('Bookings');
    $this->db->where('Bookings.BookingId',$bookingId);
    $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
    $this->db->join('RoomDetails', 'RoomDetails.roomId = Bookings.roomId','left');
    $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

    $query = $this->db->get();
    return $query->row_array();
    }

    function getPaymentType(){
      $this->db->select('paymentTypeId,paymentType');
      $query = $this->db->get('PaymentTypes');
      return $query->result();
    }
    function getCustomerType(){
      $this->db->select("Bookings.BookingId,Customers.customerId,Customers.FirstName,Customers.lastName");
      $this->db->from('Bookings');
      $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
      $this->db->where('Bookings.Status !=', '1');
      $this->db->group_by('Bookings.customerId');
      $query = $this->db->get();
      return $query->result();
    }

    function getPaymentDetailCustomer($customerId=FALSE){
      $this->db->select("Bookings.BookingId,Bookings.Nights,Customers.customerId,Bookings.Nights,Bookings.FromDate,Bookings.UptoDate,Customers.FirstName,
      Customers.lastName,Customers.contactNumber,RoomDetails.pricePerNight,RoomDetails.maxPersons,RoomDetails.roomNumber,RoomTypes.roomType");
      $this->db->from('Bookings');
      $this->db->where('Bookings.customerId',$customerId);
      $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
      $this->db->join('RoomDetails', 'RoomDetails.roomId = Bookings.roomId','left');
      $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

      $query = $this->db->get();
      return $query->result();
    }

    function getOrderDetailCustomer($customerId=FALSE){
      $this->db->select("Orders.orderId,Customers.FirstName,
      Customers.lastName,Customers.contactNumber,Orders.Quantity,Products.productName,Products.productPrice,RoomDetails.roomNumber,RoomTypes.roomType,Orders.orderDate");
      $this->db->from('Orders');
      $this->db->where('Orders.customerId',$customerId);
      $this->db->join('Customers', 'Customers.customerId = Orders.customerId','left');
      $this->db->join('Products', 'Products.ProductId = Orders.productId','left');
      $this->db->join('RoomDetails', 'RoomDetails.roomId = Orders.roomId','left');
      $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

      $query = $this->db->get();
      return $query->result_array();
    }
    public function getPaymentTable(){
      
    }
    function insertPaymentDetail(){
      $data=array(


        'customerId'        => $this->input->post('customerid'),
        'paymentTypeId'       => $this->input->post('paymentType'),
        'amount'       => $this->input->post('amount')
      );
      $result=$this->db->insert('Payment', $data);
      $last_id = $this->db->insert_id();
      $bookingId    = $this->input->post('bookingId');

      $lenbookingId = count($bookingId);
      for($i=0;$i<$lenbookingId;$i++){
        $data1=array(
             'paymentId' => $last_id,
             'bookingsOrderId' => $bookingId[$i]
        );
        $this->db->insert('BookingOrders', $data1);
        $data2 = array(
            'Status' => 1
        );
        $this->db->where('BookingId',$bookingId[$i]);
        $this->db->update('Bookings',$data2);
      }
      $orderId   = $this->input->post('orderId');
      $lenorderId = count($orderId);
      for($i=0;$i<$lenorderId;$i++){
        $data1=array(
          'paymentId' => $last_id,
          'bookingsOrderId' => $orderId[$i]
        );
        $this->db->insert('BookingOrders', $data1);
        $data2 = array(
            'Status' => 1
        );
        $this->db->where('orderId',$orderId[$i]);
        $this->db->update('Orders',$data2);
      }

      return $result;
    }


}

?>
