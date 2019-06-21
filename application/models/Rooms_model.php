<?php 

class Rooms_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    // public function create_category(){
    //     $data = array(
    //         'name' => $this->input->post('name'),
    //         'user_id' => $this->session->userdata('user_id')
    //     );

    //     return $this->db->insert('categories', $data);
    // }

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
}
?>