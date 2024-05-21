<?php
    if(!$_SESSION['user']) echo '<script>document.location="index.php?act=viewcart"</script>';
?>
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Check out</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Bill Confirm</h3>
			<div class="agile_mail_grids">
				<div class="col-md-5 contact-left">
					<h4>Payment method</h4>
                    <form action="index.php?act=bill" method="post">
						<input type="checkbox" name="pttt" value="1" id=""> Pay online <br>
						<input type="checkbox" name="pttt" value="2"  id=""> Pay when recive <br>
						<input type="checkbox" name="pttt" value="3"  id=""> ATM pay <br>

					</ul>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Contact Form</h4>
    
						<input type="text" name="hoten" value="<?=$_SESSION['user']['hoten']?>" >
						<input type="email" name="email" value="<?=$_SESSION['user']['email']?>" >
						<input type="text" name="phone" value="<?=$_SESSION['user']['dienthoai']?>">
						<textarea name="diachi" ><?=$_SESSION['user']['diachi']?></textarea>
						<input type="submit" value="Submit" name="confirm">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
            <br>
            <div class="checkout-right">
				<table class="timetable_sub">

                    <?php
                        viewcart(0);
                    ?>

				</table>
			</div>
		</div>
	</div>
<!-- //mail -->