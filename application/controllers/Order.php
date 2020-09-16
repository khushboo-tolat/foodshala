<?php
	defined('BASEPATH') or exit('Error');

	class Order extends CI_Controller{
		function __construct(){
			parent::__construct();
               $this->load->model('Order_m');
               $this->load->library('form_validation','','fv');
		}
			
		function index(){
               if($this->session->userdata('type') != NULL){
                    if($this->session->userdata('type') == 1){
                         $data["data"] = $this->Order_m->get_rest_order($this->session->userdata('id'));
                    }
                    elseif($this->session->userdata('type') == 2){
                         $data["data"] = $this->Order_m->get_cust_order($this->session->userdata('id'));
                    }
                    $this->load->view('view_orders', $data);
               }
			else{
                    redirect('Menu');
               }
          }
          
          function place_order_view($item_id = 0){
               if($item_id == 0){
                    $item_id = $this->uri->segment(3);
               }
               $data['item'] = $this->Order_m->place_order_view_m($item_id);
               $this->load->view('place_order', $data);
          }

          function place_order(){
               $order_data = [
                    'custId'=> $this->session->userdata('id'),
                    'restId'=> $this->input->post('rest_id'),
                    'address'=> $this->input->post('address')
               ];
               

               $this->Order_m->place_order_m($order_data);
               
               $id = $this->db->insert_id();

               $order_item_data = [
                    'itemId'=> $this->input->post('item_id'),
                    'orderId'=> $id,
                    'quantity'=> $this->input->post('qty'),
                    'total'=> $this->input->post('total')
               ];

               $this->Order_m->place_order_item_m($order_item_data);
          }

          function change_status(){
               $id = $this->uri->segment(3);
               $this->Order_m->change_status_m($id);
          }
     }
?>