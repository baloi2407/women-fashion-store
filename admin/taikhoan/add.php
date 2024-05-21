<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Thêm tài khoản</h2>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=addtk" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Họ tên</label>
                                    <input type="text" name="hoten" class="form-control" id="" placeholder="Nhập họ tên" value="<?=$hoten??''?>">
                                    <?=$loiht??''?>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" name="bod" class="form-control" id="" placeholder="Ngày sinh" value="<?=$bod??''?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Nhập họ tên" value="<?=$email??''?>">
                            <p id="email_err"></p>
                            <?=$loiemail??''?>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="psw" class="form-control" id="" placeholder="Nhập mật khẩu" value="<?=$psw??''?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input type="password" name="psw_repeat" class="form-control" id="" placeholder="Nhập lại mật khẩu" value="<?=$psw_repeat??''?>">
                                    <?=$loimk??''?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="" placeholder="Nhập số điện thoại" value="<?=$phone??''?>">
                                    <?=$loiphone??''?>
                                </div>
                                <div class="col-md-8">
                                    <label for="exampleTextarea1">Địa chỉ</label>
                                    <textarea class="form-control" id="exampleTextarea1" name="diachi" rows="4" placeholder="Nhập địa chỉ"><?=$diachi??''?></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="add" id="addbtn" class="btn btn-primary mr-2">Thêm</button>
                        <?=$ds??''?>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>
<script>
    <?php
        $href="taikhoan/checkemail.php";
    ?>
    $(document).ready(function() {
        $('#email').keyup(function() {
            var email = $('#email').val();
            $.post("<?=$href?>",{email:email},function(data) {
                // 1: email bi trung
                if(data==1) {
                    $('#email_err').html('<span class="text-danger">Email đã được sử dụng.</span>');
                    $('#addbtn').attr('name',' ');
                } 
                if(data==0) {
                    $('#email_err').html('<span class="text-success">Bạn có thể sử dụng Email này.</span>');
                    $('#addbtn').attr('name','add');
                }
            })
        })
    })
</script>
