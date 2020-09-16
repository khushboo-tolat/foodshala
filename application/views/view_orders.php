<?php
     include('header.php');
?>
     
<section class="col-md-12">
     <section class="menu-section col-md-10 col-md-offset-1">
          <?php
                if(count($data) == 0){
          ?>
          <section class="item-card col-md-10 col-md-offset-1">
               <p class="no-item col-md-12"> No Orders Available </p>
          </section>
          <?php 
               }
               else{
               if($this->session->userdata('type') != NULL){
                    if($this->session->userdata('type') == 1){
                         foreach($data as $key){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
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
               <div class="col-md-4" style="text-align: center;">
          <?php
                              if($key->status == 0){
          ?>
                    <button class="btn btn-success order_status" onclick="change_status(<?=$key->orderId?>)"> Accept </button>
          <?php
                              }
                              elseif($key->status == 1){
          ?>
                    <button class="btn btn-primary order_status" onclick="change_status(<?=$key->orderId?>)"> Deliver </button>
          <?php
                              }
                              elseif($key->status == 2){
          ?>
                    <button class="btn order_status"disabled> Completed </button>
          <?php                         
                              }
          ?>
               </div>
               <div class="col-md-12 item-section">
                    <div class="item_prize col-md-6"><b>Customer:</b> <?=$key->custName?> </div>
                    <div class="item_decription col-md-3">&#8377 <?=$key->total?> </div>
                    <div class="item_prize col-md-3"> <b>Quantity:</b> <?=$key->quantity?> </div>
               </div>
               <div class="col-md-12 item-section">
                    <div class="item_decription col-md-6"><b>Address:</b> <?=$key->address?> </div>
                    <div class="item_prize col-md-6"> <b>Cuisine:</b> <?=$key->cuisineName?> </div>
               </div>
               <div style="display: none;" id="id"><?=$key->orderId?></div>
          </section>
          <?php
                         }
                    }
                    elseif($this->session->userdata('type') == 2){
                         foreach($data as $key){
          ?>
          <section class="item-card col-md-8 col-md-offset-2">
               <section class="col-md-8">
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
               <div class="col-md-4" style="text-align: center;">
               <?php
                                   if($key->status == 0){
               ?>
                         <p style="color: grey"><i class="fa fa-times" aria-hidden="true"></i> Not Accepted </p>
               <?php
                                   }
                                   elseif($key->status == 1){
               ?>
                         <p style="color: green"><i class="fa fa-clock-o" aria-hidden="true"></i> Accepted </p>
               <?php
                                   }
                                   elseif($key->status == 2){
               ?>
                         <p style="color: #2E86C1"><i class="fa fa-check" aria-hidden="true"></i> Delivered </p>
               <?php
                                   }
               ?>
                    <!-- <button class="view_menu"> Accept </button> -->
               </div>
               <div class="col-md-12 item-section">
                    <div class="item_prize col-md-6"><b>Restaurant:</b> <?=$key->restName?> </div>
                    <div class="item_decription col-md-3">&#8377 <?=$key->total?> </div>
                    <div class="item_prize col-md-3"> <b>Quantity:</b> <?=$key->quantity?> </div>
               </div>
          </section>
          <?php
                         }
                    }
               }
               }
          ?>
     </section>
</section>

<script>
     function change_status(id){
          $.ajax({
               url:'<?=site_url("/Order/change_status");?>/'+id,
               type: 'POST',
               data: {id: id},
               success:function(result){
                    location.reload();
               }
          });     
     }
</script>
</body>
</html>