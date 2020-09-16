<?php
     include('header.php');
?>

<section class="col-md-12">
     <section class="order-section col-md-10 col-md-offset-1" >
          <h1> Place Order </h1>
          <form id="order_post">
               <section class="order-card col-md-10 col-md-offset-1">
                    <div class="col-md-7 item-heading">
                         <p> <b>Item Name:</b> <input class="item-data item-size" type="text" name="item-name" id="item-name" value="<?=$item[0]->itemName?>" disabled size="40"> </p>
                    </div>
                    <div class="col-md-5">
                         <p><button type="button" class="btn qty-btn" id="btn_minus"> - </button> <input class="item-data quantity" type="text" id="qty" name="qty" value="1" size="1" disabled> <button class="btn qty-btn" id="btn_plus" type="button"> + </button>  </p>
                    </div>
                    <div class="col-md-12 item-heading">
                         <p> <b>Restaurant:</b> <input class="item-data item-size" type="text" name="item-rest" id="item-rest" value="<?=$item[0]->restName?>" disabled> </p>
                    </div>
                    <div class="form-group">
                         <p class="item-heading"><b>Address: </b></p>
                         <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                         <div style="color: red;"><?=form_error('address');?></div>
                    </div>
                    <div class="col-md-12 item-heading">
                         <p> <b>Total:</b> &#8377<input class="item-data quantity" type="text" id="price" name="price" value="<?=$item[0]->price?>" size="1" disabled> </p>
                    </div>
                    <div style="display: none;">
                         <input id="item-id" name="item-id" value="<?=$item[0]->itemId?>">
                         <input name="rest-id" id="rest-id" value="<?=$item[0]->restId?>">
                    </div>
               </section>
               <button type="submit" class="btn btn-success place_order_btn col-md-6 col-md-offset-3"> Place Order </button>
               <button type="button" class="btn place_order_btn col-md-6 col-md-offset-3" onclick="menu_redirect(<?=$item[0]->restId?>)"> Cancel </button>
          </form>
     </section>
</section>

<script>
     var qty = document.getElementById("qty").value;
     const price = document.getElementById("price").value;
     var total = document.getElementById("price").value;

     $("#btn_minus").on('click', function(){
          --qty;
          total = price * qty;
          document.getElementById("qty").value = qty;
          document.getElementById("price").value = total;

          if(document.getElementById("qty").value < 1){
               $("#btn_minus").attr('disabled',true);
          }
          else{
               $("#btn_minus").attr('disabled',false);
          }
     });

     $("#btn_plus").on('click', function(){
          ++qty;
          total = price * qty;
          document.getElementById("qty").value = qty;
          document.getElementById("price").value = total;

          if(document.getElementById("qty").value < 1){
               $("#btn_minus").attr('disabled',true);
          }
          else{
               $("#btn_minus").attr('disabled',false);
          }
     });

     $("#order_post").on('submit', function(e) {
          e.preventDefault();
          $.ajax({
               url:'<?=site_url("/Order/place_order");?>',
               type: 'POST',
               mimeType: "multipart/form-data",
               data: {
                    address: document.getElementById("address").value,
                    rest_id: document.getElementById("rest-id").value,
                    qty: document.getElementById("qty").value,
                    total: document.getElementById("price").value,
                    item_id: document.getElementById("item-id").value
               },
               success: function(result){
                    location.href = "<?=site_url('Order')?>";
               }
          });
     });

     function menu_redirect(id){
          location.href = "<?=site_url('Menu/view_menu')?>/"+id;
     }
</script>
</body>
</html>