<?php
     include('header.php');
?>

<section class="col-md-12">
     <section class="menu-section signup_section col-md-10 col-md-offset-1" >
          <h1> Add a Restaurant </h1>
          <form action="<?=site_url('/Login_signup/signup_as_restaurant');?>" method="post">
               <section class="signup-card col-md-10 col-md-offset-1">
                    <div class="form-group">
                         <p class="modal_heading">Restaurant Name:</p>
                         <input type="text" class="form-control" name="signup-rest-name" value="<?=set_value('signup-rest-name');?>">
                         <div style="color: red;"><?=form_error('signup-rest-name');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Restaurant Website:</p>
                         <input type="text" class="form-control" name="signup-rest-website" value="<?=set_value('signup-rest-website');?>">
                         <div style="color: red;"><?=form_error('signup-rest-website');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Restaurant Contact No.:</p>
                         <input type="text" class="form-control" name="signup-rest-phno" value="<?=set_value('signup-rest-phno');?>">
                         <div style="color: red;"><?=form_error('signup-rest-phno');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Restaurant Email:</p>
                         <input type="email" class="form-control" name="signup-rest-email" value="<?=set_value('signup-rest-email');?>">
                         <div style="color: red;"><?=form_error('signup-rest-email');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Password:</p>
                         <input type="password" class="form-control" name="signup-rest-pass">
                         <div style="color: red;"><?=form_error('signup-rest-pass');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Confirm Password:</p>
                         <input type="password" class="form-control" name="signup-rest-confirm-pass">
                         <div style="color: red;"><?=form_error('signup-rest-confirm-pass');?></div>
                    </div>
                    <div class="radio">
                         <label class="modal_heading"><input type="radio" name="signup-radio" value="0" checked>Veg</label>
                    </div>
                    <div class="radio">
                         <label class="modal_heading"><input type="radio" name="signup-radio" value="1">Non-Veg</label>
                    </div>
                    <div class="radio">
                         <label class="modal_heading"><input type="radio" name="signup-radio" value="2">Both</label>
                    </div>
                    <div style="color: red;"><?=form_error('signup-radio');?></div>
                    <div class="form-group">
                         <p class="modal_heading">Owner Name:</p>
                         <input type="text" class="form-control" name="signup-owner-name" value="<?=set_value('signup-owner-name');?>">
                         <div style="color: red;"><?=form_error('signup-owner-name');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Owner Contact No.:</p>
                         <input type="text" class="form-control" name="signup-owner-phno" value="<?=set_value('signup-owner-phno');?>">
                         <div style="color: red;"><?=form_error('signup-owner-phno');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Owner Email:</p>
                         <input type="email" class="form-control" name="signup-owner-email" value="<?=set_value('signup-owner-email');?>">
                         <div style="color: red;"><?=form_error('signup-owner-email');?></div>
                    </div>
               </section>
               <button type="submit" class="btn btn-success modal_btn col-md-6 col-md-offset-3"> SignUp </button>
          </form>
     </section>
</section>
</body>
</html>