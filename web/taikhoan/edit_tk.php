<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Edit Account</li>
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
            <form action="index.php?act=update" class="custom_form" method="post">

                    <label for="hoten"><b>Full Name</b></label>
                    <input type="text" placeholder="Enter your full name" name="hoten" id="hoten" value="<?=$hoten??''?>">
                    <input type="hidden" name="id" id="id" value="<?=$id??''?>">
                    <?=$loiht??''?>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?=$email??''?>">
                    <?=$loiemail??''?>
                    <p id="email_err"></p>
                    
                    <label for="phone"><b>Phone</b></label>
                    <input type="text" placeholder="Enter Phone" name="phone" id="phone" value="<?=$dienthoai??''?>">
                    <?=$loiphone??''?>
                    <label for="diachi"><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="diachi" id="diachi" value="<?=$diachi??''?>">
                    <label for=""><b>B.o.D</b></label>
                    <input type="date" placeholder="Enter your birth of date" name="bod" id="bod" value="<?=$ngaysinh??''?>">
                    <hr>

                    <button type="submit" class="registerbtn" name="editbtn">Submit</button>
                    <a href="index.php?act=editpsw" class="btn btn-primary">Change Password</a>
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
                    $('.editbtn').attr('name',' ');
                } else {
                    $('#email_err').html('<span class="text-success">Email hợp lệ.</span>');
                    $('.editbtn').attr('name','editbtn');
                }
            })
        })
    })
</script>