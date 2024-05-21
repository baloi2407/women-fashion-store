<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Sign In</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
            <?=$tb??''?>
            <form action="index.php?act=signin" class="custom_form" method="post">
                    <h1>Login</h1>
                    <hr>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?=$email??''?>">
                    <?=$loiemail??''    ?>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" >
                        
                    <label for="">Remember me?</label>
                    <input type="checkbox" name="remember" id="">
                    <button type="submit" class="registerbtn" name="dnbtn">Login</button>

                
                <div class="container signin">
                    <p>Forget Password? <a href="index.php?act=forgot_pass">Forgot</a>.</p>
                </div>
            </form>
        </div>
	</div>
<!-- //mail -->