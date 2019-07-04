<?php
class Dashboard_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_room_details(){
        $query = $this->db->query('select count(RoomDetails.roomTypeId) AS Total,RoomTypes.roomType as RoomType 
        from RoomDetails left join RoomTypes on RoomDetails.roomTypeId = RoomTypes.roomId group by RoomDetails.roomTypeId');
        return $query->result_array();
    }
    public function get_total_customers(){
        $query = $this->db->query('select count(Customers.customerId) as c from Customers');
        return $query->row(0)->c;
    }
}