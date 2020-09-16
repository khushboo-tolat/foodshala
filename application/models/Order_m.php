<?php
     defined('BASEPATH') or exit('Error');
     
	class Order_m extends CI_Model{
		function __construct(){
			parent::__construct();
          }

          function place_order_view_m($id){
               return $this->db->select('*')
                    ->from('tblmenuitem t1')
                    ->join('tblrestaurant t2','t1.restId = t2.restId')
                    ->where('t1.itemId', $id)
                    ->get()
                    ->result(); 
          }

          function place_order_m($order_data){
               $this->db->insert('tblorder', $order_data);
          }

          function place_order_item_m($order_item_data){
               $this->db->insert('tblorderitem', $order_item_data);
          }

          function get_rest_order($id){
               return $this->db->select('*')
                         ->from('tblorder t1')
                         ->join('tblorderitem t2','t1.orderId = t2.orderId')
                         ->join('tblcustomer t3','t1.custId = t3.custId')
                         ->join('tblmenuitem t4','t2.itemId = t4.itemId')
                         ->join('tblcuisine t5','t4.cuisineId = t5.cuisineId')
                         ->where('t1.restId', $id)
                         ->order_by('t1.dateTime','desc')
                         ->get()
                         ->result();
          }

          function get_cust_order($id){
               return $this->db->select('*')
                         ->from('tblorder t1')
                         ->join('tblorderitem t2','t1.orderId = t2.orderId')
                         ->join('tblrestaurant t3','t1.restId = t3.restId')
                         ->join('tblmenuitem t4','t2.itemId = t4.itemId')
                         ->join('tblcuisine t5','t4.cuisineId = t5.cuisineId')
                         ->where('t1.custId', $id)
                         ->order_by('t1.dateTime','desc')
                         ->get()
                         ->result();
          }

          function change_status_m($id){
               $this->db->set('status','status+1', false)
                         ->where('orderId', $id)
                         ->update('tblorder');
          }
     }
?>