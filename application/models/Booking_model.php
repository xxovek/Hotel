<?php
class Booking_model extends CI_Model{

    public function __construct(){
         $this->load->database();
    }
    function getCustomername() {
              $this->db->select('customerId,FirstName,lastName');
              $query = $this->db->get('Customers');
              return $query->result();
    }
    function getRoomname(){
      $this->db->select('roomId,roomNumber');
      $query = $this->db->get('RoomDetails');
      return $query->result();
    }
    function insertBookingDetail(){
      $data=array(

        'customerId'    => $this->input->post('customerName'),
        'roomId'        => $this->input->post('roomNo'),
        'FromDate'       => $this->input->post('FromDate'),
        'Nights'        => $this->input->post('diffDays'),
        'Status'       => $this->input->post('Status'),
        'UptoDate'       => $this->input->post('UptoDate')
      );
      $result=$this->db->insert('Bookings', $data);
      return $result;
    }
    function checkroomavaiableBookingDetail(){
      $roomId       = $this->input->post('roomNo');
      $FromDate       = $this->input->post('FromDate');
      $UptoDate       = $this->input->post('UptoDate');
      $this->db->where('roomId',$roomId);
      $this->db->where('FromDate <',$UptoDate);
      $this->db->where('UptoDate >',$FromDate);

      $result = $this->db->get('Bookings');
      if($result->num_rows()>0){
          return $result->row(0)->BookingId;
      }else{
          return 0;
      }
    }
    public function get_bookingdetails($bookingId=FALSE){
        if($bookingId==FALSE){
            $this->db->select("Bookings.BookingId,Bookings.FromDate,Bookings.UptoDate,Customers.FirstName,
            Customers.lastName,Customers.contactNumber,RoomDetails.roomNumber,RoomTypes.roomId,RoomTypes.roomType");
            $this->db->from('Bookings');
            $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
            $this->db->join('RoomDetails', 'RoomDetails.roomId = Bookings.roomId','left');
            $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');

            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select("Bookings.BookingId,Bookings.FromDate,Bookings.UptoDate,Customers.FirstName,
        Customers.lastName,Customers.customerId,RoomDetails.roomId,Customers.contactNumber,RoomDetails.roomNumber,RoomTypes.roomType");
        $this->db->from('Bookings');
        $this->db->where('Bookings.BookingId',$bookingId);
        $this->db->join('Customers', 'Customers.customerId = Bookings.customerId','left');
        $this->db->join('RoomDetails', 'RoomDetails.roomId = Bookings.roomId','left');
        $this->db->join('RoomTypes', 'RoomTypes.roomId = RoomDetails.roomId','left');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function remove_booking($bookingId){
      $this->db->where('BookingId',$bookingId);
      $this->db->delete('Bookings');
      return true;
    }
    public function update_booking($bookingId){
      $data = array(
          'customerId' => $this->input->post('customerName'),
          'FromDate'  => $this->input->post('FromDate'),
          'UptoDate' => $this->input->post('UptoDate'),
          'roomId' => $this->input->post('roomNo')
      );
      $this->db->where('BookingId',$bookingId);
     return $this->db->update('Bookings',$data);
    }
}
?>
