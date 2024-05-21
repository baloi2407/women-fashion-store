<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3>Your shopping cart contains: <span><?= count($_SESSION['mycart'])?> Products</span></h3>

			<div class="checkout-right">
				<table class="timetable_sub">
					
                    <?php
                        viewcart(1);
                    ?>

                    <!-- <script>$(document).ready(function(c) {
                        $('.close1').on('click', function(c){
                            $('.rem1').fadeOut('slow', function(c){
                                $('.rem1').remove();
                            });
                            });	  
                        });
                    </script> -->
					
                <!--quantity-->
                    <script>
                    $('.value-plus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                        if(newVal>=1) divUpd.text(newVal);
                    });
                    </script>
                <!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
                <a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="checkout-right-basket">
					<a href="index.php?act=billconfirm">Bill Confirm</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>