<?php

class Roomdetails_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_roomDetails(){

        $query = $this->db->query(
            "select RoomDetails.roomId,RoomDetails.roomNumber,
            RoomDetails.roomTypeId,RoomDetails.pricePerNight,
            RoomDetails.maxPersons,RoomDetails.status,
            RoomDetails.isAvailable,RoomDetails.created_at,
            RoomTypes.roomType from RoomDetails left join RoomTypes
            on RoomDetails.roomTypeId = RoomTypes.roomId"
        );

        return $query->result_array();
    }

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
          
        );
            $tblArr =   $this->input->post('TableDataArr');
       // echo count($tblArr);

        // $tblArr = (
        //     [0] => Array
        //         (
        //             [item] => 86
        //             [qty] => 2
        //         )

        //     [1] => Array
        //         (
        //             [item] => 87
        //             [qty] => 3
        //         )

        //     [2] => Array
        //         (
        //             [item] => 89
        //             [qty] => 3
        //         )

        // )

        $sql_insRoomDetali = $this->db->insert('RoomDetails', $data);
        $last_insert_id = $this->db->insert_id();

        // $sql = "INSERT INTO Room_amenties (parameter, value)values (?, ?)";
        $sql = "insert into Room_amenties (roomId, parameter, value)
        values (?, ?, ?)";
            for($i = 0; $i < count($tblArr);$i++){

                $TblData = array(
                    'roomId'    => $last_insert_id,
                    'parameter' => $tblArr[$i]['item'],
                    'value'     =>  $tblArr[$i]['qty']
                );
                $this->db->query($sql,$TblData);
            }

        // print_r($tblArr);

        // print_r($tblArr[0]['item']) ;
        return true;
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

     public function update_roomDetails($roomid){
         $data = array(
            'roomNumber' => $this->input->post('roomno_input'),
            'roomTypeId' => $this->input->post('roomtype_input') ,
            'pricePerNight' =>$this->input->post('roomprice_input') ,
            'maxPersons' => $this->input->post('roomlimit_input'),
            'isAvailable' => $this->input->post('checkbox_input')
         );
         $this->db->where('roomId',$roomid);
       return $this->db->update('RoomDetails',$data);
     }

     public function fetch_roomdetails($roomid){
        $query = $this->db->query("SELECT * FROM RoomDetails WHERE roomId = '$roomid'");
        return $query->row_array();
     }

     //fetch amenities using room id //

     public function showtbldataforroomdetail($roomid){
       // $this->db->where('roomId',$roomid);
       // $query = $this->db->get('Amenities');
       // $query = $this->db->query("SELECT * FROM Room_amenties WHERE roomId = '$roomid'");
       // $query = $this->db->get_where('Room_amenties', array('roomId' => $roomid));
       // return $query->row_array();

       $query = $this->db->query("SELECT * FROM Room_amenties WHERE roomId = '$roomid'");
       return $query->result_array();
     }


}


?>
