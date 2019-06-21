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
            'DocumentType' => $this->input->post('documenttypeName')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('Documents', $data);
    }

    public function update_type(){
        $data = array(
            'DocumentType' => $this->input->post('documenttypeName1')
          );

          $this->db->where('DocumentId',$this->input->post('id'));
          return $this->db->update('Documents',$data);
    }

    // Check username exists
		public function check_type_exists($typeName){
			$query = $this->db->get_where('Documents', array('DocumentType' => $typeName));
			if(empty($query->row_array())){
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