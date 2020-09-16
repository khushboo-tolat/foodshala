<?php
     include('header.php');
?>
     
<section class="col-md-12">
     <section class="menu-section col-md-10 col-md-offset-1">
          <?php
               if($this->session->userdata('type') != NULL){
                    if($this->session->userdata('type') == 1){
                         if($this->session->userdata('id') == $id){
          ?>
          <section class="col-md-11 add_menu_item">
               <button class="add_menu_item_btn" onclick="add_item_click()"> Add Item </button> 
          </section>
          <?php
                         }
                    }
               }

               if(count($items) == 0){
          ?>
          <section class="item-card col-md-10 col-md-offset-1">
               <p class="no-item col-md-12"> No Items Available </p>
          </section>
          <?php 
               }
               else{
               foreach($items as $key){
          ?>
          <section class="item-card col-md-10 col-md-offset-1">
               <img class="item_img col-md-3" src="<?=base_url('resources/images/'.$key->image)?>">
               <section class="col-md-7">
                    <span class="item_name"> <?=$key->itemName?> </span>
                    <?php
                         if($key->nonVeg == 0){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/veg.jpg">
                    <?php
                         }
                         elseif($key->nonVeg == 1){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/nonveg.jpg">
                    <?php
                         }
                    ?>
               </section>
               <?php
                    if($this->session->userdata('type') != NULL){
                         if($this->session->userdata('type') == 2){
               ?>
               <div class="col-md-2" style="text-align: center;">
                    <a class="add_btn" href="<?=site_url('Order/place_order_view/'.$key->itemId)?>">Add</a>
               </div>
               <?php
                         }
                         else if($this->session->userdata('type') == 1){
                              if($this->session->userdata('id') == $id){
               ?>
               <div class="col-md-2" style="text-align: center;">
                    <a href="<?=site_url('Menu/delete_menu_item/'.$key->itemId.'/'.$id)?>" class="delete_item"> <i class="fa fa-trash"></i> </a>
               </div>
               <?php
                              }
                         }
                    }
                    else{
               ?>
               <div class="col-md-2" style="text-align: center;">
                    <button class="add_btn" data-toggle="modal" data-target="#login_modal">Add</button>
               </div>
               <?php
                    }
               ?>
               <p class="item_prize col-md-4">&#8377 <?=$key->price?> </p>
               <p class="item_prize col-md-4"><b>Cuisine:</b> <?=$key->cuisineName?> </p>
               <p class="item_decription col-md-7"> <?=$key->description?> </p> 
          </section>
          <?php
               }
          }
          ?>
     </section>
</section>

<script>
     function add_item_click(){
          location.href = '<?=site_url();?>/Menu/view_add_menu_item/';
     }
</script>
</body>
</html>