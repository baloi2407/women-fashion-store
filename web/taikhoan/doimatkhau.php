<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Change Password</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
            <?=$tb??''?>
            <?php
                if(is_array($tk)) {
                    extract($tk);
                }
            ?>
            <form action="index.php?act=updatepsw" class="custom_form" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <label for="psw"><b>New Password</b></label>
                <?=$loimk_length??''?>
                <input type="password" placeholder="Enter Password" name="new_psw" >
                <label for="psw_repeat"><b>New Password Repeat</b></label>
                <input type="password" placeholder="Repeat Password" name="new_psw_repeat" id="psw_repeat" >
                <?=$loimk_repeat??''?>
                <hr>

                <button type="submit" class="registerbtn" name="doimkbtn">Submit</button>
            </form>
        </div>
	</div>
<!-- //mail -->
