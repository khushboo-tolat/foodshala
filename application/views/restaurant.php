<?php
     include('header.php');
?>
     
<section class="col-md-12">
     <section class="menu-section col-md-10 col-md-offset-1">
          <?php    
          if($this->session->userdata('veg') != null){
               if($this->session->userdata('type') == 2){
                    if($this->session->userdata('veg') == 0){
                         foreach($rest as $key){
                              if($key->nonVeg == 0 || $key->nonVeg == 2){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
                    <span class="item_name" style="padding-left: 0px;"> <?=$key->restName?> </span>
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
                              elseif($key->nonVeg == 2){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/veg.jpg">
                    <img class="item_veg" src="<?=base_url("resources/images")?>/nonveg.jpg">
                    <?php
                              }
                    ?>
               </section>
               <div class="col-md-4" style="text-align: center;">
                    <button class="view_menu" onclick="view_menu_click('<?=$key->restId?>')"> View Menu</button>
               </div>
               <p class="item_prize col-md-5"> <b>Website:</b> <?=$key->restWebsite?> </p>
               <p class="item_decription col-md-5"> <b>Contact No.:</b> <?=$key->restContactNo?> </p> 
          </section>
          <?php
                              }
                         }
                    }
                    else{
                         foreach($rest as $key){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
                    <span class="item_name" style="padding-left: 0px;"> <?=$key->restName?> </span>
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
                              elseif($key->nonVeg == 2){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/veg.jpg">
                    <img class="item_veg" src="<?=base_url("resources/images")?>/nonveg.jpg">
                    <?php
                              }
                    ?>
               </section>
               <div class="col-md-4" style="text-align: center;">
                    <button class="view_menu" onclick="view_menu_click('<?=$key->restId?>')"> View Menu</button>
               </div>
               <p class="item_prize col-md-5"> <b>Website:</b> <?=$key->restWebsite?> </p>
               <p class="item_decription col-md-5"> <b>Contact No.:</b> <?=$key->restContactNo?> </p> 
          </section>
          <?php
                         }
                    }
               }
               else{
                    foreach($rest as $key){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
                    <span class="item_name" style="padding-left: 0px;"> <?=$key->restName?> </span>
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
                         elseif($key->nonVeg == 2){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/veg.jpg">
                    <img class="item_veg" src="<?=base_url("resources/images")?>/nonveg.jpg">
                    <?php
                         }
                    ?>
               </section>
               <div class="col-md-4" style="text-align: center;">
                    <button class="view_menu" onclick="view_menu_click('<?=$key->restId?>')"> View Menu</button>
               </div>
               <p class="item_prize col-md-5"> <b>Website:</b> <?=$key->restWebsite?> </p>
               <p class="item_decription col-md-5"> <b>Contact No.:</b> <?=$key->restContactNo?> </p> 
          </section>
          <?php
                    }
               }
          }
          else{
               foreach($rest as $key){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
                    <span class="item_name" style="padding-left: 0px;"> <?=$key->restName?> </span>
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
                         elseif($key->nonVeg == 2){
                    ?>
                    <img class="item_veg" src="<?=base_url("resources/images")?>/veg.jpg">
                    <img class="item_veg" src="<?=base_url("resources/images")?>/nonveg.jpg">
                    <?php
                         }
                    ?>
               </section>
               <div class="col-md-4" style="text-align: center;">
                    <button class="view_menu" onclick="view_menu_click('<?=$key->restId?>')">View Menu</button>
               </div>
               <p class="item_prize col-md-5"> <b>Website:</b> <?=$key->restWebsite?> </p>
               <p class="item_decription col-md-5"> <b>Contact No.:</b> <?=$key->restContactNo?> </p> 
          </section>
          <?php
               }
          }  
          ?>
     </section>
</section>

<script>
     function view_menu_click(id){
          location.href = '<?=site_url();?>/Menu/view_menu/'+id;
     }
</script>
</body>
</html>