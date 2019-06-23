<?php
class Authentication_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function authenticate($username,$password){
        $this->db->where('userName',$username);
        $this->db->where('password',$password);
        // $this->db->where('Flag',0);
        $result = $this->db->get('UserMaster');
        if($result->num_rows()==1){
            return $result->row(0)->UserId;
        }else{
            return false;
        }

    }
    public function logoutmodel($username){
        $data=array('Flag'=>1);

        $this->db->where('UserId',$username);
        $result = $this->db->update('UserMaster',$data);
        return $result;

    }
}
