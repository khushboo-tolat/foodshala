<?php
	defined('BASEPATH') or exit('Error');

	class Menu extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Menu_m');
			$this->load->library('form_validation','','fv');

			$set['upload_path']='./resources/images/';
			$set['allowed_types']='jpg|png|gif|jpeg';

			$this->load->library('upload',$set,'up');
		}

		function index(){
			$data['rest'] = $this->Menu_m->get_all_restaurant();
          	$this->load->view('restaurant', $data);
		}
		
		function view_menu($id = 0){
			if($id == 0){
				$id = $this->uri->segment(3);
			}
			$data['id'] = $id;
			$data['items'] = $this->Menu_m->get_menu_items($id);
          	$this->load->view('menu', $data);
		}

		function view_add_menu_item(){
			$data['cuisine'] = $this->Menu_m->get_cuisine();
          	$this->load->view('add_menu_item', $data);
		}

		function add_menu_item(){
			$this->fv->set_rules('item-name','Menu Item Name','trim|required|max_length[200]|min_length[5]|alpha_numeric_spaces');
               $this->fv->set_rules('item-price','Price','trim|required|is_natural_no_zero');
			$this->fv->set_rules('item-desc','Description','trim|max_length[1000]');
			$this->fv->set_rules('item-cuisine','Select Cuisine','trim|required|greater_than[0]',['greater_than'=>'You Must Select A Cuisine']);

               if($this->fv->run()==FALSE)
               {
				$this->view_add_menu_item();
               }
               else
               {
				$nonVeg = 0;
				if($this->session->userdata('veg') == 1){
					$nonVeg = 1;
				}elseif($this->session->userdata('veg') == 2){
					$nonVeg = $this->input->post('item-radio');
				}

                    $item_data=[
                         'itemName'=>$this->input->post('item-name'),
                         'price'=>$this->input->post('item-price'),
                         'description'=>$this->input->post('item-desc'),
                         'nonVeg'=>$nonVeg,
					'cuisineId'=>$this->input->post('item-cuisine'),
					'restId'=>$this->session->userdata('id')
				];
				
				if($this->up->do_upload('item-image')){
					$id=$this->up->data();
					$item_data['image'] = $id['file_name'];
				}

				$this->Menu_m->add_menu_item_m($item_data);
				
				$this->view_menu($this->session->userdata('id'));
               }
		}

		function delete_menu_item($id){
			$rest_id = $this->uri->segment(4);

			$item_data = [
				'itemId' => $id
			];

			$this->Menu_m->delete_menu_item_m($item_data);

			$this->view_menu($rest_id);
		}
     }
?>