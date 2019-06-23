<?php
class Authentication_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function authenticate($username,$password){
        $this->db->where('userName',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('UserMaster');
        if($result->num_rows()==1){
            return $result->row(0)->UserId;
        }else{
            return false;
        }

    }
}
