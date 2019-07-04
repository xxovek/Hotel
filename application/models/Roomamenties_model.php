<?php

class Roomamenties_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function check_type_exists($name){
        $query = $this->db->get_where('Amenities', array('name' => $name));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function fetch_amienities(){
        $this->db->select('amentyId,name');
        $query = $this->db->get('Amenities');
        return $query->result();
    }

    public function showtbldata(){
        $query = $this->db->get('Amenities');
        return $query->result_array();
    }

    public function create(){
        $data = array(
            'name' => $this->input->post('amenityName')
        );
        return $this->db->insert('Amenities', $data);
    }

    public function updaterow($id){

        $data = array(
            'name' => $this->input->post('amenityName')

         );
         $this->db->where('amentyId',$id);
       return $this->db->update('Amenities',$data);

    }

    public function delete_row($id){
        $this->db->where('amentyId',$id);
        $this->db->delete('Amenities');
      return true;
    }



}

?>
