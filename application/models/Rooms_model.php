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
            'roomType' => $this->input->post('roomtypeName')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('RoomTypes', $data);
    }

    public function update_type(){
        $data = array(
            'roomType' => $this->input->post('roomtypeName1')

          );

          $this->db->where('roomId',$this->input->post('id'));
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
}
?>