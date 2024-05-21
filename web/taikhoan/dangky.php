<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Sign Up</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
            <?=$tb??''?>
            <form action="index.php?act=signup" class="custom_form" method="post">
                    <h1>Register Form</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>

                    <label for="hoten"><b>Full Name</b></label>
                    <input type="text" placeholder="Enter your full name" name="hoten" id="hoten" value="<?=$hoten??''?>">
                    <?=$loiht??''   ?>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?=$email??''?>">
                    <p class="text-danger" id="email_err"></p>
                    <?=$loiemail??''    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" id="psw" value="<?=$psw??''?>">
                        </div>
                        <div class="col-md-6">
                            <label for="psw_repeat"><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw_repeat" value="<?=$psw_repeat??''?>">
                            <?=$loimk??''   ?>
                        </div>
                    </div>
                    
                    <label for="phone"><b>Phone</b></label>
                    <input type="text" placeholder="Enter Phone" name="phone" id="phone" value="<?=$phone??''?>">
                    <?=$loiphone??''    ?>
                    <label for="diachi"><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="diachi" id="diachi" value="<?=$diachi??''?>">
                    <label for=""><b>B.o.D</b></label>
                    <input type="date" placeholder="Enter your birth of date" name="bod" id="bod" value="<?=$bod??''?>">
                    <hr>
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                    <button type="submit" class="registerbtn" name="dkybtn">Register</button>

                
                <div class="container signin">
                    <p>Already have an account? <a href="index.php?act=signin">Sign in</a>.</p>
                </div>
            </form>
        </div>
	</div>
<!-- //mail -->
<script>
    <?php
        $href="./web/taikhoan/checkemail.php";
    ?>
    $(document).ready(function() {
        $('#email').keyup(function() {
            var email = $('#email').val();
            $.post("<?=$href?>",{email:email},function(data) {
                // 1: email bi trung
                if(data==1) {
                    $('#email_err').html('<span class="text-danger">Email đã được sử dụng.</span>');
                    $('.registerbtn').attr('name',' ');
                } else {
                    $('#email_err').html('<span class="text-success">Email hợp lệ.</span>');
                    $('.registerbtn').attr('name','dkybtn');
                }
            })
        })
    })
</script>