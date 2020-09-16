<?php
	defined('BASEPATH') or exit('Error');

	class Login_signup extends CI_Controller{
		function __construct(){
			parent::__construct();
               $this->load->model('Login_signup_m');
               $this->load->model('Menu_m');
               $this->load->library('form_validation','','fv');
          }

          function index(){
               $this->load->view('signup_rest');
          }

          function login_as_customer(){
               $data['rest'] = $this->Menu_m->get_all_restaurant();
          	
               $this->fv->set_rules('login-email','Email','trim|required|max_length[50]|min_length[5]|valid_email');
			$this->fv->set_rules('login-pass','Password','trim|required|max_length[100]|min_length[5]|alpha_dash');

			if($this->fv->run()==FALSE)
			{
                    $data['login_email'] = 0;
                    $data['login_pass'] = 0;

                    if(form_error('login-email') != NULL){
                         $data['login_email'] = 1;
                    }

                    if(form_error('login-pass') != NULL){
                         $data['login_pass'] = 1;
                    }

				$this->load->view('restaurant', $data);
			}
			else
			{
				$cust_data=[
					'emailId'=>$this->input->post('login-email'),
					'password'=>$this->input->post('login-pass')
				];	

                    $cust=$this->Login_signup_m->login_as_customer($cust_data);

				if(count($cust)==1)
				{
                         $this->session->set_userdata('id',$cust[0]->custId);
                         $this->session->set_userdata('name',$cust[0]->custName);
                         $this->session->set_userdata('type', 2);
                         $this->session->set_userdata('veg',$cust[0]->nonVeg);
                         redirect('Menu');

				}
				else
				{
                         $data['login_cust']="Invalid Email OR Password";
                         $this->load->view('restaurant', $data);
				}
			}
          }

          function login_as_restaurant(){
               $data['rest'] = $this->Menu_m->get_all_restaurant();
          	
               $this->fv->set_rules('login-rest-email','Restaurant Email','trim|required|max_length[100]|min_length[5]|valid_email');
			$this->fv->set_rules('login-rest-pass','Restaurant Password','trim|required|max_length[100]|min_length[5]|alpha_dash');

			if($this->fv->run()==FALSE)
			{
                    $data['login_rest_email'] = 0;
                    $data['login_rest_pass'] = 0;

                    if(form_error('login-rest-email') != NULL){
                         $data['login_rest_email'] = 1;
                    }

                    if(form_error('login-rest-pass') != NULL){
                         $data['login_rest_pass'] = 1;
                    }
                    
				$this->load->view('restaurant', $data);
			}
			else
			{
				$rest_data=[
					'restEmail'=>$this->input->post('login-rest-email'),
					'password'=>$this->input->post('login-rest-pass')
				];	

                    $rest=$this->Login_signup_m->login_as_restaurant($rest_data);

				if(count($rest)==1)
				{
                         $this->session->set_userdata('id',$rest[0]->restId);
                         $this->session->set_userdata('name',$rest[0]->restName);
                         $this->session->set_userdata('veg',$rest[0]->nonVeg);
                         $this->session->set_userdata('type', 1);
                         redirect('Menu');

				}
				else
				{
                         $data['login_rest']="Invalid Restaurant Email OR Password";
                         $this->load->view('restaurant', $data);
				}
			}
          }

          function signup_as_customer(){
               $data['rest'] = $this->Menu_m->get_all_restaurant();

               $this->fv->set_rules('signup-name','Name','trim|required|max_length[50]|min_length[5]|alpha_numeric_spaces');
               $this->fv->set_rules('signup-email','Email Id','trim|required|max_length[50]|min_length[5]|valid_email');
               $this->fv->set_rules('signup-pass','Password','trim|required|max_length[100]|min_length[5]|alpha_dash');
               $this->fv->set_rules('signup-confirm-pass','Confirm Password','trim|required|max_length[100]|min_length[5]|alpha_dash|matches[signup-pass]');
               $this->fv->set_rules('radio', 'Radio button', 'required');

               if($this->fv->run()==FALSE)
               {
                    $data['signup_name'] = 0;
                    $data['signup_email'] = 0;
                    $data['signup_pass'] = 0;
                    $data['signup_confirm_pass'] = 0;
                    $data['radio'] = 0;

                    if(form_error('signup-name') != NULL){
                         $data['signup_name'] = 1;
                    }

                    if(form_error('signup-email') != NULL){
                         $data['signup_email'] = 1;
                    }

                    if(form_error('signup-pass') != NULL){
                         $data['signup_pass'] = 1;
                    }

                    if(form_error('signup-confirm-pass') != NULL){
                         $data['signup_confirm_pass'] = 1;
                    }

                    if(form_error('radio') != NULL){
                         $data['radio'] = 1;
                    }
                    
				$this->load->view('restaurant', $data);
               }
               else
               {
                    $cust_data=[
                         'custName'=>$this->input->post('signup-name'),
                         'emailId'=>$this->input->post('signup-email'),
                         'password'=>$this->input->post('signup-pass'),
                         'nonVeg'=>$this->input->post('radio')
                    ];

                    $this->Login_signup_m->signup_as_customer($cust_data);

                    $this->session->set_userdata('id', $this->db->insert_id());
                    $this->session->set_userdata('name', $this->input->post('signup-name'));
                    $this->session->set_userdata('type', 2);
                    $this->session->set_userdata('veg', $this->input->post('radio'));
                    redirect('Menu');

               }
          }

          function signup_as_restaurant(){
               $this->fv->set_rules('signup-rest-name','Restaurant Name','trim|required|max_length[100]|min_length[5]|alpha_numeric_spaces');
               $this->fv->set_rules('signup-rest-email','Restaurant Email Id','trim|required|max_length[100]|min_length[5]|valid_email');
               $this->fv->set_rules('signup-rest-phno','Restaurant Contact Number','trim|required|exact_length[10]|numeric');
               $this->fv->set_rules('signup-rest-website','Restaurant Website','trim|required|max_length[100]|min_length[5]|regex_match[/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/]');
               $this->fv->set_rules('signup-rest-pass','Password','trim|required|max_length[100]|min_length[5]|alpha_dash');
               $this->fv->set_rules('signup-rest-confirm-pass','Confirm Password','trim|required|max_length[100]|min_length[5]|alpha_dash|matches[signup-rest-pass]');
               $this->fv->set_rules('signup-radio', 'Radio button', 'required');
               $this->fv->set_rules('signup-owner-name','Owner Name','trim|required|max_length[100]|min_length[5]|alpha_numeric_spaces');
               $this->fv->set_rules('signup-owner-email','Owner Email Id','trim|required|max_length[100]|min_length[5]|valid_email');
               $this->fv->set_rules('signup-owner-phno','Owner Contact Number','trim|required|exact_length[10]|numeric');

               if($this->fv->run()==FALSE)
               {
				$this->load->view('signup_rest');
               }
               else
               {
                    $rest_data=[
                         'restName'=>$this->input->post('signup-rest-name'),
                         'restEmail'=>$this->input->post('signup-rest-email'),
                         'restContactNo'=>$this->input->post('signup-rest-phno'),
                         'restWebsite'=>$this->input->post('signup-rest-website'),
                         'password'=>$this->input->post('signup-rest-pass'),
                         'nonVeg'=>$this->input->post('signup-radio'),
                         'ownerName'=>$this->input->post('signup-owner-name'),
                         'ownerEmail'=>$this->input->post('signup-owner-email'),
                         'ownerContactNo'=>$this->input->post('signup-owner-phno')
                    ];

                    $this->Login_signup_m->signup_as_restaurant($rest_data);

                    $this->session->set_userdata('id', $this->db->insert_id());
                    $this->session->set_userdata('name', $this->input->post('signup-rest-name'));
                    $this->session->set_userdata('veg', $this->input->post('signup-radio'));
                    $this->session->set_userdata('type', 1);
                    redirect('Menu');
               }
          }

          function logout(){
               $this->session->sess_destroy();
               redirect('Menu');
          }
     }
?>