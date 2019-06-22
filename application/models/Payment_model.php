<?php 

class Payment_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_paymentstypes(){
        $query = $this->db->get('PaymentTypes');
        return $query->result_array();
    }

    public function get_paymentstype_byId($id){
        $query = $this->db->get('PaymentTypes');
        return $query->result_array();
    }


    // public function create_paymentstypes(){
    //     $data = array(
    //         'paymentType' => $this->input->post('paymenttypeName')
    //         // 'user_id' => $this->session->userdata('user_id')
    //     );

    //     return $this->db->insert('PaymentTypes', $data);
    // }

    public function create_paymentstypes(){
        $data = array(
            'paymentType' => $this->input->post('typename')
            // 'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('PaymentTypes', $data);
    }

    public function update_type(){
        $data = array(
            'paymentType' => $this->input->post('paymenttypeName1')

          );

          $this->db->where('paymentTypeId',$this->input->post('id'));
          return $this->db->update('PaymentTypes',$data);
    }

    // Check username exists
		public function check_type_exists($typeName){
			$query = $this->db->get_where('PaymentTypes', array('paymentType' => $typeName));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}


        public function delete_type($id){
            $this->db->where('paymentTypeId',$id);
            $this->db->delete('PaymentTypes');
          return true;
        }
}

?>