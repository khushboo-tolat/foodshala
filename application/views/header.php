<html>
<head>
     <title>Foodshala</title>

     <!-- CDN -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- CSS -->
     <link rel="stylesheet" href="<?=base_url("resources/css")?>/header.css">
     <link rel="stylesheet" href="<?=base_url("resources/css")?>/menu.css">
     <link rel="stylesheet" href="<?=base_url("resources/css")?>/order.css">
</head>
<body>
     <header class="header">
          <div class="logo col-md-5 col-md-offset-1 col-sm-11 col-sm-offset-1"><a class="login_link" href="<?=base_url()?>"><i class="fa fa-cutlery"></i> foodshala </a></div>

          <?php
               if($this->session->userdata('type') != NULL){
                    if($this->session->userdata('type') == 2){
          ?>
          <div class="login col-md-6 col-sm-12">
               <div class="col-md-4 col-sm-4">
                    <a class="login_link" href="<?=site_url('/Order')?>"> My Orders </a>
               </div>
               <div class="col-md-4 col-sm-4"> <?=$this->session->userdata('name')?> </div>
               <div class="dropdown col-md-4 col-sm-4">
                    <button class="dropdown-toggle btn_design" data-toggle="dropdown">
                         <i class="fa fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                         <li class="li_rest"> <a class="link_design_dropdown" href="<?=site_url('/Login_signup/logout')?>"> LogOut </a></li>
                    </ul>
               </div>
          </div>
          <?php
                    }
                    else if($this->session->userdata('type') == 1){
          ?>
          <div class="login col-md-6 col-sm-12">
               <div class="col-md-3 col-sm-3">
                    <a class="login_link" href="<?=site_url('/Menu/view_menu/'.$this->session->userdata('id'))?>"> Menu </a>
               </div>
               <div class="col-md-3 col-sm-3">
                    <a class="login_link" href="<?=site_url('/Order')?>"> View Orders </a>
               </div>
               <div class="col-md-3 col-sm-3"> <?=$this->session->userdata('name')?> </div>
               <div class="dropdown col-md-3 col-sm-3">
                    <button class="dropdown-toggle btn_design" data-toggle="dropdown">
                         <i class="fa fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                         <li class="li_rest"> <a class="link_design_dropdown" href="<?=site_url('/Login_signup/logout')?>"> LogOut </a></li>
                    </ul>
               </div>
          </div>
          <?php
                    }
               }
               else{
          ?>
          <div class="login col-md-6 col-sm-12">
               <div class="col-md-4 col-sm-4">
                    <a class="login_link" data-toggle="modal" data-target="#login_modal"> Login </a>
               </div>
               <div class="col-md-4 col-sm-4">
                    <a class="login_link" data-toggle="modal" data-target="#signup_modal"> SignUp </a>
               </div>
               <div class="dropdown col-md-4 col-sm-4">
                    <button class="dropdown-toggle btn_design" data-toggle="dropdown">
                         <i class="fa fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                         <li class="li_rest">
                              <a class="link_design_dropdown" data-toggle="modal" data-target="#login_rest_modal"> Login as a Resturant </a>
                         </li>
                         <li class="divider"></li>
                         <li class="li_rest"> <a href="<?=site_url('/Login_signup')?>"> SignUp as a Resturant </a></li>
                    </ul>
               </div>
          </div>
          <?php
               }
          ?>

          <!-- login as customer modal -->
          <div class="modal fade" id="login_modal" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <form action="<?=site_url('/Login_signup/login_as_customer');?>" method="post">
                              <div class="modal-body">
                                   <div class="col-md-12 modal_top">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Email:</p>
                                        <input type="email" class="form-control" name="login-email" value="<?=set_value('login-email');?>">
                                        <div style="color: red;"><?=form_error('login-email');?></div>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Password:</p>
                                        <input type="password" class="form-control" name="login-pass">
                                        <div style="color: red;"><?=form_error('login-pass');?></div>
                                   </div>
                                   <div style="color: red;">
					  		     <?php
                                        if(isset($login_cust))
                                        {
                                             echo $login_cust;
                                        }
                                        ?>
                                   </div>
                                   <p>New to Foodshala? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signup_modal"> Create Account </a> </p>
                              </div>
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-success modal_btn col-md-6 col-md-offset-3"> Login </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>

          <!-- signup as customer modal -->
          <div class="modal fade" id="signup_modal" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <form action="<?=site_url('/Login_signup/signup_as_customer');?>" method="post"> 
                              <div class="modal-body">
                                   <div class="col-md-12 modal_top">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Name:</p>
                                        <input type="text" class="form-control" name="signup-name" value="<?=set_value('signup-name');?>">
                                        <div style="color: red;"><?=form_error('signup-name');?></div>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Email:</p>
                                        <input type="email" class="form-control" name="signup-email" value="<?=set_value('signup-email');?>">
                                        <div style="color: red;"><?=form_error('signup-email');?></div>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Password:</p>
                                        <input type="password" class="form-control" name="signup-pass">
                                        <div style="color: red;"><?=form_error('signup-pass');?></div>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Confirm Password:</p>
                                        <input type="password" class="form-control" name="signup-confirm-pass">
                                        <div style="color: red;"><?=form_error('signup-confirm-pass');?></div>
                                   </div>
                                   <div class="radio">
                                        <label class="modal_heading"><input type="radio" name="radio" value="0" checked>Veg</label>
                                   </div>
                                   <div class="radio">
                                        <label class="modal_heading"><input type="radio" name="radio" value="1">Non-Veg</label>
                                   </div>
                                   <div style="color: red;"><?=form_error('radio');?></div>
                                   <p>Already have account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#login_modal"> Login </a> </p>
                              </div>
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-success modal_btn col-md-6 col-md-offset-3"> SignUp </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>

          <!-- login as restaurant modal -->
          <div class="modal fade" id="login_rest_modal" role="dialog">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <form action="<?=site_url('/Login_signup/login_as_restaurant');?>" method="post">
                              <div class="modal-body">
                                   <div class="col-md-12 modal_top">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Resturant Email:</p>
                                        <input type="email" class="form-control" name="login-rest-email" value="<?=set_value('login-rest-email');?>">
                                        <div style="color: red;"><?=form_error('login-rest-email');?></div>
                                   </div>
                                   <div class="form-group">
                                        <p class="modal_heading">Password:</p>
                                        <input type="password" class="form-control" name="login-rest-pass">
                                        <div style="color: red;"><?=form_error('login-rest-pass');?></div>
                                   </div>
                                   <div style="color: red;">
					  		     <?php
                                        if(isset($login_rest))
                                        {
                                             echo $login_rest;
                                        }
                                        ?>
                                   </div>
                              </div>
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-success modal_btn col-md-6 col-md-offset-3"> Login as Resturant </button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </header>

<script type="text/javascript">
     $(function(){
          <?php
               if(isset($login_email)){
                    if($login_email == 1){
          ?>
          $('#login_modal').modal('show');
          <?php
                    }
               }

               if(isset($login_pass)){
                    if($login_pass == 1){
          ?>
          $('#login_modal').modal('show');
          <?php
                    }
               }

               if(isset($login_cust)){
          ?>
          $('#login_modal').modal('show');
          <?php
               }

               if(isset($login_rest_email)){
                    if($login_rest_email == 1){
          ?>
          $('#login_rest_modal').modal('show');
          <?php
                    }
               }

               if(isset($login_rest_pass)){
                    if($login_rest_pass == 1){
          ?>
          $('#login_rest_modal').modal('show');
          <?php
                    }
               }

               if(isset($login_rest)){
          ?>
          $('#login_rest_modal').modal('show');
          <?php
               }

               if(isset($signup_name)){
                    if($signup_name == 1){
          ?>
          $('#signup_modal').modal('show');
          <?php
                    }
               }

               if(isset($signup_email)){
                    if($signup_email == 1){
          ?>
          $('#signup_modal').modal('show');
          <?php
                    }
               }

               if(isset($signup_pass)){
                    if($signup_pass == 1){
          ?>
          $('#signup_modal').modal('show');
          <?php
                    }
               }

               if(isset($signup_confirm_pass)){
                    if($signup_confirm_pass == 1){
          ?>
          $('#signup_modal').modal('show');
          <?php
                    }
               }

               if(isset($radio)){
                    if($radio == 1){
          ?>
          $('#signup_modal').modal('show');
          <?php
                    }
               }
          ?>
     });
</script>