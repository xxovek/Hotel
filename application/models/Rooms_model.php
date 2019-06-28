<?php 

class Rooms_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_roomtypes(){
        $query = $this->db->get('RoomTypes');
        return $query->result_array();
    }

    public function create_roomtype(){
        $data = array(
            'roomType' => $this->input->post('typename')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('RoomTypes', $data);
    }
 

    // public function fetch_roomtypes(){
    //     $query = $this->db->get('RoomTypes');
    //     $output = '<option value="">Select Room Type</option>';
    //     foreach ($query -> result() as $row){
    //         $output .= '<option value="'.$row->roomId.'">'.$row->roomType.'</option>';
    //     }
    //     return $output;
    // }
    

    function fetch_roomtypes() {
        $this->db->select('roomId,roomType');
        $query = $this->db->get('RoomTypes');
        return $query->result();
}

    public function update_type(){
        $typeid = $this->input->post('typeid');
        $data = array(
            'roomType' => $this->input->post('typename')
          );
          $this->db->where('roomId',$typeid);
          return $this->db->update('RoomTypes',$data);
    }

    // Check username exists
		public function check_type_exists($typeName){
			$query = $this->db->get_where('RoomTypes', array('roomType' => $typeName));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
        }
        
        public function delete_type($id){
            $this->db->where('roomId',$id);
            $this->db->delete('RoomTypes');
          return true;
        }

    //     public function fetch_roomtypename($roomid){
    //         $this->db->select('roomId,roomType');
    //         $this->db->where('roomId',$roomid);
    //         $query = $this->db->get('RoomTypes');
    //         // $query = $this->db->get('RoomTypes');
    //        return $query->result_array();
    //    }
       public function fetch_roomtypename($id){
        //    echo $id ;
           $sql = 'SELECT roomId,roomType FROM RoomTypes WHERE roomId = "$id"';
        $query = $this->db->query($sql);
         return $query->result_array();
        }
       


    //    function getRoomname(){
    //     $this->db->select('roomId,roomNumber');
    //     $query = $this->db->get('RoomDetails');
    //     return $query->result();
    //   }

}
?>