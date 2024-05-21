<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Forgot Password</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
            <?=$tb_loi??''?>
            <?=$tb_ok??''?>
            
                <form action="index.php?act=qmk" class="custom_form" method="post">
                        <h1>Forgor Password?</h1>
                        <hr>
    
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?=$email??''?>">
                        <?=$loiemail??''    ?>
    
                        <button type="submit" class="registerbtn" name="qmkbtn">Submit</button>
    
                </form>
        </div>
	</div>
<!-- //mail -->