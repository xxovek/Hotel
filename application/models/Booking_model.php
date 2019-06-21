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
    
        'customerId'        => $this->input->post('customerName'),
        'roomId'        => $this->input->post('roomNo'),
        'FromDate'       => $this->input->post('FromDate'),
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
}
?>
