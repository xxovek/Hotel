<?php
class Documents_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_documenttypes(){
        $query = $this->db->get('Documents');
        return $query->result_array();
    }

    public function create_documentstypes(){
        $data = array(
            'DocumentType' => $this->input->post('typename')
        );

        return $this->db->insert('Documents', $data);
    }

 
    public function update_type(){
        $typeid = $this->input->post('typeid');
        $data = array(
            'DocumentType' => $this->input->post('typename')
          );
          $this->db->where('DocumentId',$typeid);
          return $this->db->update('Documents',$data);
    }


    // Check username exists
		public function check_type_exists($typeName){
			$query = $this->db->get_where('Documents', array('DocumentType' => $typeName));
			if($query->num_rows() == 1){
				return true;
			} else {
				return false;
			}
		}

        public function delete_type($id){
            $this->db->where('DocumentId',$id);
            $this->db->delete('Documents');
          return true;
        }

}

?>
