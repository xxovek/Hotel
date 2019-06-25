<?php

class Roomdetails_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_roomDetails(){
        $query = $this->db->get('RoomDetails');
        return $query->result_array();
    }

    public function create_roomDetails(){
        $data = array(
            'roomNumber' => $this->input->post('typename')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('RoomDetails', $data);
    }

}
?>