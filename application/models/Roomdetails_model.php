<?php

class Roomdetails_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_roomDetails(){
        $query = $this->db->get('RoomDetails');
        return $query->result_array();
    }

    // public function getroomtypes(){
    //     $query = $this->db->get('RoomTypes');
    //     return $query->result_array();
    // }

  

    public function check_type_exists($roomNo){
        $query = $this->db->get_where('RoomDetails', array('roomNumber' => $roomNo));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function create_roomDetails(){
        $data = array(
            'roomNumber' => $this->input->post('roomno_input'),
            'roomTypeId' => $this->input->post('roomtype_input') ,
            'pricePerNight' =>$this->input->post('roomprice_input') ,
            'maxPersons' => $this->input->post('roomlimit_input'),
            'isAvailable' => $this->input->post('checkbox_input')
            // 'status'     => $this->input->post('typename')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('RoomDetails', $data);
    }

    public function delete_room($id){
        $this->db->where('roomId',$id);
        $this->db->delete('RoomDetails');
      return true;
    }

    public function fetch_roomtypeid($roomid){
       
        $query = $this->db->query("select RoomDetails.roomTypeId,RoomTypes.roomType from RoomDetails left join RoomTypes on RoomDetails.roomTypeId = RoomTypes.roomId where RoomDetails.roomId = '$roomid'");
        return $query->row_array();
        
     }



}
?>