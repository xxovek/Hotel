
<?php
class Admin_model extends CI_Model{
 
    public function __construct(){
        $this->load->database();
    }

    public function fetch_admininfo($id){
        $query = $this->db->query("SELECT UserId,userName,HotelName FROM UserMaster WHERE UserId = '$id'");
        return $query->result_array();
    }


}

?>