<?php include('includes/front_header.php'); ?>

<style>
.cart_table .table {
    margin: 0;
}
.cart_cont{
    margin-top: 110px;
}
.cart_table td{
    padding: 10px 0;
}
.update_btn{
    background: #b49449;
    color: #fff;
    border: 1px solid #b49449;
}
.update_btn:hover{
    background: #fff;
    color: #b49449;
    border: 1px solid #b49449;
}
.cart_table td{
    vertical-align: middle;
    text-align: center!important;
}
.cart_table th{
    vertical-align: middle;
    text-align: center!important;
}

.proceed{
    background: #b49449;
    color: #fff;
    border: 1px solid #b49449;
}
.proceed:hover{
    background: #fff;
    color: #b49449;
    border: 1px solid #b49449;
}
.cart_total_label{
    padding-left: 0!important;
}
.quantity_input input{
    text-align: center!important;
    width: 62px!important;
    border: 1px solid #d2c8c8!important;
}

@media screen and (max-width: 769px) and (min-width: 320px){
    
    .proceed{
        padding: 10px!important;
    }
}
</style>


<div class="container cart_cont">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo SURL.'Cart/add';?>" method="post" class="table-responsive cart_table pt-5">
            	<table class="table">
                	<thead>
                    	<tr>
                        	<th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Ticket Price</span></th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //echo "<pre>";var_dump($this->cart->contents());
                        foreach($this->cart->contents() as $key=>$value){
                        
                        ?>
                        
                        <input type="hidden" value="<?php echo $value['id'];?>" name="lottery_id[]"/>
                        <input type="hidden" value="<?php echo $value['price'];?>" name="price[]"/>
                        <input type="hidden" value="<?php echo $value['name'];?>" name="name[]"/>
                        <input type="hidden" value="<?php echo $value['image'];?>" name="image[]"/>
                        <input type="hidden" value="<?php echo $value['tickets'];?>" name="tickets[]"/>
                            
                    	<tr id="row_<?php echo $value['rowid'];?>">
                        	<td class="product-thumbnail">
                                <img src="<?php echo $value['image'];?>" alt="product">
                            </td>
                            <td class="product-price text-left">
                                <?php echo $value['name'];?>                              
                            </td>
                            <td class="product-price">
                                
                              <?php
                                if($this->session->userdata("location")==1){
                                    $priceeuro = $this->db->query("select * from lottery where lottery_id='".$value['id']."'")->result_array()[0]['priceeuro'];
                              ?>
                                €<?php echo $priceeuro;?>
                             <?php
                             }else{
                             ?>
                               £<?php echo $value['price']; ?>
                            <?php
                            }
                            ?>
                                
                            </td>
                            <td class="product-quantity ">
                                <div class="quantity_input text-center">
                                    <input type="text" readonly="" name="quantity[]" value="<?php echo $value['qty'];?>" class="qty" size="4">
                                </div>
                            </td>
                          	<td class="product-subtotal" data-title="Total">
                          	     
      
                                   <span>
                                        <?php
                                            if($this->session->userdata("location")==1){
                                                
                                             $sub_total = $priceeuro * $value['qty'];
                                             $total_sub +=$sub_total; 
                                             $sub_total = "€".$sub_total;
                                         
                                         }else{
                                             
                                             $sub_total = $value['subtotal'];
                                             $total_sub +=$sub_total; 
                                             $sub_total = "£".$sub_total;
                                             
                                             //$sub_total="£".$this->cart->format_number($value['subtotal']);
                                             
                                        }
                                        
                                        
                                        ?>
                                        <input type="text" style="width:90px;border:none;" name="subtotal" class="subtotal" value="<?php echo $sub_total?>">
                                    </span>
                            </td>
                            <td class="product-remove" data-id1="<?php echo $value['rowid'];?>">
                                <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="6" class="px-0">
                            	<div class="row no-gutters align-items-center">

                                	<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                        
                                	</div>
                                    <div class="col-lg-8 col-md-6 text-left text-md-right">
                                        <a href="<?php echo SURL.'Competitons';?>" class="btn btn-fill-out btn-sm update_btn" type="submit">Continue Shopping</a>
                                        <button class="btn btn-fill-out btn-sm update_btn" type="submit">Update Cart</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
    <div class="row mt-4 mb-3">
        <div class="col-md-6"></div>
        <div class="col-md-6">
        	<div class="border p-3 p-md-4">
                <div class="heading_s1 mb-3">
                    <h6>Cart Totals</h6>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <!--<tr>-->
                            <!--    <td class="cart_total_label">Cart Subtotal</td>-->
                            <!--    <td class="cart_total_amount">€75.00</td>-->
                            <!--</tr>-->
                            <tr>
                                <td class="cart_total_label">Total</td>
                                <td class="cart_total_amount text-right">
                                    
                              <?php
                                if($this->session->userdata("location")==1){
                              ?>
                               <strong>€</strong> <?php echo number_format($total_sub,2);  ?>
                             <?php
                             }else{
                             ?>
                              <strong>£</strong>  <?php echo number_format($total_sub,2);  ?>
                            <?php
                            }
                            ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="<?php echo SURL.'Checkout';?>" class="btn btn-fill-out proceed">Proceed To CheckOut</a>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click','.product-remove',function(){
        var id = $(this).data("id1");
        $("#row_"+id).remove();
    }); 
</script>

<?php include('includes/front_footer.php'); ?>