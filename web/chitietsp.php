<!-- banner -->
<div class="banner10" id="home1">
		<div class="container">
			<h2>Single Page</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Single Page</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- ======================================================= Chi tiet san pham ========================================== -->
    <?php
	if(is_array($chitietsp)) {
		extract($chitietsp);
        $img_src = $img_path.$img;
	}
    ?>
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides list-unstyled">
						<li data-thumb="./web/images/a.jpg">
							<div class="thumb-image"> <img src="<?=$img_src?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
				</div>
				<!-- flixslider -->
					<script defer src="./web/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="./web/css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flixslider -->
				<!-- zooming-effect -->
					<script src="./web/js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3><?=$tensp?></h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
					<div class="description">
						<h5><i>Description</i></h5>
						<p><?=$mota?></p>
					</div>
					<div class="color-quality">
						<div class="color-quality-left">
							<h5>Color : </h5>
							<ul>
								<li><a href="#"><span></span>Red</a></li>
								<li><a href="#" class="brown"><span></span>Yellow</a></li>
								<li><a href="#" class="purple"><span></span>Purple</a></li>
								<li><a href="#" class="gray"><span></span>Violet</a></li>
							</ul>
						</div>
						<div class="color-quality-right">
							<h5>Quality :</h5>
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus1">&nbsp;</div>
									<div class="entry value1"><span>1</span></div>
									<div class="entry value-plus1 active">&nbsp;</div>
								</div>
							</div>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="occasional">
						<h5>Occasion :</h5>
						<div class="colr ert">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Occasion Wear</label>
							</div>
						</div>
						<div class="colr">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Party Wear</label>
							</div>
						</div>
						<div class="colr">
							<div class="check">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Formal Wear</label>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!-- ===================================== Add to cart =============================================================== -->
					<div class="simpleCart_shelfItem">
							<p><span>$320</span> <i class="item_price">$<?=$gia?></i></p>
							<form action="index.php?act=addtocart" method="post">
									<input type="hidden" name="id" value="<?=$id?>">
									<input type="hidden" name="tensp" value="<?=$tensp?>">
									<input type="text" name="soluong" value="1" id="soluong">
									<input type="hidden" name="img" value="<?=$img?>">
									<input type="hidden" name="gia" value="<?=$gia?>">
								<p><input type="submit" class="item-add resp-tab-item bg-warning" value="Add to cart" name="addcart"></p>
							</form>
						</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--quantity-->
	<script>
	$('.value-plus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
		divUpd.text(newVal);
		 $('#soluong').val(newVal);
		
		
	});

	$('.value-minus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
		if(newVal>=1) {
			divUpd.text(newVal);
			$('#soluong').val(newVal);
		}
	});
	</script>
<!--quantity-->	

<!-- ======================================================= End chi tiet san pham ========================================== -->


	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3>Swan Miami Red Skirt</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
							eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
							Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
							odit aut fugit, sed quia consequuntur magni dolores eos qui 
							ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea 
							commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate 
							velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
							quo voluptas nulla pariatur.</p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<h4>(2) Reviews</h4>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Laura</a>
									<h5>April 03, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="./web/images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="./web/images/2.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Michael</a>
									<h5>April 04, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="./web/images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star-.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="./web/images/star.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
							<form action="#" method="post">
								<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
								<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
								<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input type="submit" value="Submit" >
							</form>
						</div>
					</div> 			        					            	      
				</div>	
			</div>
			<script src="./web/js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
<!-- ======================================================= Comment  ========================================== -->
	<div class="container comment-box">
		
	</div>
	<script>
		$(document).ready(function () {
			$(".comment-box").load("web/binhluan/binhluanform.php",{idpro:<?=$id?>});
		});
	</script>
<!-- ======================================================= //Comment  ========================================== -->
<!-- ======================================================= San pham cung loai ========================================== -->

	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">	
				<?php
					foreach ($listsp_cungloai as $sp) {
						extract($sp);
						$img_src = $img_path.$img;
						$href="index.php?act=pro_details&id=".$id;
						echo '
							<li>
								<div class="w3l_related_products_grid">
									<div class="agile_ecommerce_tab_left dresses_grid">
										<div class=" hs-wrapper3">
											<img src="'.$img_src.'" alt=" " class="img-responsive">
											
										</div>
										<h5><a href="'.$href.'">Pink Flared Skirt</a></h5>
										<div class="simpleCart_shelfItem">
											<p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">$'.$gia.'</i></p>
											<p><a class="item_add" href="'.$href.'">Add to cart</a></p>
										</div>
									</div>
								</div>
							</li>
						';
					}
				?>		

			</ul>
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo2").flexisel({
							visibleItems:4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
				</script>
				<script type="text/javascript" src="./web/js/jquery.flexisel.js"></script>
		</div>
	</div>
<!-- ======================================================= End san pham cung loai ========================================== -->

	<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="./web/images/39.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>a good look women's Long Skirt</h4>
							<p>Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea 
								commodo consequat.Duis aute irure dolor in 
								reprehenderit in voluptate velit esse cillum dolore 
								eu fugiat nulla pariatur. Excepteur sint occaecat 
								cupidatat non proident, sunt in culpa qui officia 
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="./web/images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="./web/images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="./web/images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="./web/images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="./web/images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$320</span> <i class="item_price">$250</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span>Red</a></li>
									<li><a href="#" class="brown"><span></span>Yellow</a></li>
									<li><a href="#" class="purple"><span></span>Purple</a></li>
									<li><a href="#" class="gray"><span></span>Violet</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //single -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Newsletter</h3>
				<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->