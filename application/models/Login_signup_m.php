<?php
     defined('BASEPATH') or exit('Error');
     
	class Login_signup_m extends CI_Model{
		function __construct(){
               parent::__construct();
          }

          function login_as_customer($cust_data){
               return $this->db->where($cust_data)
			               ->get('tblcustomer')
			               ->result();
          }

          function login_as_restaurant($rest_data){
               return $this->db->where($rest_data)
                              ->get('tblrestaurant')
                              ->result();
          }

          function signup_as_customer($cust_data){
               $this->db->insert('tblcustomer', $cust_data);
          }

          function signup_as_restaurant($rest_data){
               $this->db->insert('tblrestaurant', $rest_data);
          }
     }
?>