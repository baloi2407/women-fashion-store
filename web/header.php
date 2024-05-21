<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Women's Fashion </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Women's Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="./web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="./web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="./web/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="./web/js/jquery.min.js"></script>
<!-- //js -->
<!-- custom css -->
<link rel="stylesheet" href="./web/css/custom.css" />
<!-- //custom css -->
<!-- countdown -->
<link rel="stylesheet" href="./web/css/jquery.countdown.css" />
<!-- //countdown -->
<!-- cart -->
<script src="./web/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="./web/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
</head>
<body>
    <div class="header">
		<div class="container">
			<div class="sap_tabs">
				<?php
					if(!isset($_SESSION['user'])) {
						?>
							<a class="resp-tab-item resp-tab-active" aria-controls="tab_item-1" role="tab" href="index.php?act=signin">Sign In</a>
							<a class="resp-tab-item " aria-controls="tab_item-0" role="tab" href="index.php?act=signup">Sign Up</a>
							<?php
					}
					else {

						?>
						<a class="resp-tab-item resp-tab-active" aria-controls="tab_item-1" role="tab" href="index.php?act=edit"><?=$_SESSION['user']['hoten']??''?></a>
						<a class="resp-tab-item " aria-controls="tab_item-0" role="tab" href="index.php?act=logout">Log out</a>
						<?php
					}
				?>
			</div>
			<div class="w3l_logo">
				<h1><a href="index.php">Women's Fashion<span>For Fashion Lovers</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
						<input type="text" placeholder="Search..." name="kyw" class="kyw">
						<input type="submit" value="Send" class="submit" id="submit">
				</div>
			</div>
			<div class="cart box_1">
				<a href="index.php?act=viewcart">
					<div class="total">
					( items)</div>
					<img src="./web/images/bag.png" alt="" />
				</a>
				<!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
				<div class="clearfix"> </div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<style>
										.dropdown-menu ul li {
											float :left;
											margin-right:25px;
										}
									</style>
									<div class="col-md-12">
										<ul class="multi-column-dropdown w-100">
											<h6>Clothing</h6>
											<?php
												foreach ($listdm as $dm) {
													extract($dm);
													$href= 'index.php?act=pro_list&id='.$id;
													echo '
														<li><a href="'.$href.'">'.$tendm.'</a></li>
													';
												}
											?>
										</ul>
									</div>

									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="index.php?act=mybill">My Bill</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="short-codes.html">Short Codes</a></li>
						<li><a href="mail.html">Mail Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('.submit').click(function() {
				var kyw = $('.kyw').val();
				location.assign("index.php?act=search&q="+kyw);
			});
			//Bind keypress event to textbox
			$('.kyw').keypress(function(event){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if(keycode == '13'){
					var kyw = $('.kyw').val();
					location.assign("index.php?act=search&q="+kyw);
				}
			});
			
			
		})
	</script>

