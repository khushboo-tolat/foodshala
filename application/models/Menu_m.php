<?php
     defined('BASEPATH') or exit('Error');
     
	class Menu_m extends CI_Model{
		function __construct(){
			parent::__construct();
          }

          function get_all_restaurant(){
               return $this->db->select('*')
                    ->from('tblrestaurant')
                    ->order_by("restName")
                    ->get()
                    ->result(); 
          }

          function get_menu_items($id){
               if($this->session->userdata('type') != null){
                    if($this->session->userdata('type') == 2){
                         if($this->session->userdata('veg') == 0){
                              $this->db->where('t1.nonVeg', 0);
                         }
                    }
               }

               return $this->db->select('*')
                              ->from('tblmenuitem t1')
                              ->join('tblcuisine t2','t1.cuisineId = t2.cuisineId')
                              ->where('t1.restId', $id)
                              ->order_by("t1.itemName")
                              ->get()
                              ->result();
          }

          function get_cuisine(){
               return $this->db->select('*')
                    ->from('tblcuisine')
                    ->order_by("cuisineName")
                    ->get()
                    ->result(); 
          }

          function add_menu_item_m($item_data){
               $this->db->insert('tblmenuitem', $item_data);
          }

          function delete_menu_item_m($item_id){
               $this->db->where($item_id)
                         ->delete('tblmenuitem');
          }
     }
?>