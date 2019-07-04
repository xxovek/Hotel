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
        );
        return $this->db->insert('RoomTypes', $data);
    }
  

    function fetch_roomtypes(){
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
 



}

?>