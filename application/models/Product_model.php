<?php 

class Product_model extends CI_Model{

    public function __construct(){
        // $this->load->database();
    }

    public function getproducts(){
        $query = $this->db->get('Products');
        return $query->result_array();
    }

    public function create(){
      $data = array(
        'productName' => $this->input->post('productname_input'),
        'productPrice' => $this->input->post('productprice_input') 
      );

        return $this->db->insert('Products', $data);
    }

    public function delete($pid){
        $this->db->where('ProductId',$pid);
        $this->db->delete('Products');
        return true;
    }

    public function update($pid){
        $data = array(

            'productName' => $this->input->post('productname_input'),
            'productPrice' => $this->input->post('productprice_input') 
          );
         $this->db->where('ProductId',$pid);
       return $this->db->update('Products',$data);
    }

}
?>