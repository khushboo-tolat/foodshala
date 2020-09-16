<?php
     include('header.php');
?>

<section class="col-md-12">
     <section class="menu-section signup_section col-md-10 col-md-offset-1" >
          <h1> Add Item </h1>
          <form action="<?=site_url('/Menu/add_menu_item');?>" method="post">
               <section class="signup-card col-md-10 col-md-offset-1">
                    <div class="form-group">
                         <p class="modal_heading">Item Name:</p>
                         <input type="text" class="form-control" name="item-name" value="<?=set_value('item-name');?>">
                         <div style="color: red;"><?=form_error('item-name');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Price:</p>
                         <input type="text" class="form-control" name="item-price" value="<?=set_value('item-price');?>">
                         <div style="color: red;"><?=form_error('item-price');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Description:</p>
                         <textarea class="form-control" name="item-desc" rows="4"><?=set_value('item-desc');?></textarea>
                         <div style="color: red;"><?=form_error('item-desc');?></div>
                    </div>
                    <?php
                         if($this->session->userdata('veg') == 2){
                    ?>
                    <div class="radio">
                         <label class="modal_heading"><input type="radio" name="item-radio" value="0" checked>Veg</label>
                    </div>
                    <div class="radio">
                         <label class="modal_heading"><input type="radio" name="item-radio" value="1">Non-Veg</label>
                    </div>
                    <?php
                         }
                    ?>
                    <div class="form-group">
                         <p class="modal_heading">Cuisine:</p>
                         <select class="form-control" id="item-cuisine" name="item-cuisine">
                              <option value="0">SELECT CUISINE</option>
                              <?php
                                   foreach($cuisine as $key){
                              ?>
                              <option value="<?=$key->cuisineId;?>"><?=$key->cuisineName;?></option>
                              <?php
                                   }
                              ?>
                         </select>
                         <div style="color: red;"><?=form_error('item-cuisine');?></div>
                    </div>
                    <div class="form-group">
                         <p class="modal_heading">Image:</p>
                         <input type="file" class="form-control" name="item-image">
                         <div style="color: red;"><?=form_error('item-image');?></div>
                    </div>
               </section>
               <button type="submit" class="btn btn-success modal_btn col-md-6 col-md-offset-3"> Add Item </button>
          </form>
     </section>
</section>
</body>
</html>