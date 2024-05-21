<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Cập nhật tài khoản</h2>
    <?php
        if(is_array($tk)) {
            extract($tk);
        }
    ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=updatetk&id=<?=$id?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Họ tên</label>
                                    <input type="text" name="hoten" class="form-control" id="" placeholder="Nhập họ tên" value="<?=$hoten??''?>">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <?=$loiht??''?>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" name="bod" class="form-control" id="" placeholder="Ngày sinh" value="<?=$ngaysinh??''?>">
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
                                <div class="col-md-4">
                                    <label for="">Điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="" placeholder="Nhập số điện thoại" value="<?=$dienthoai??''?>">
                                    <?=$loiphone??''?>
                                </div>
                                <div class="col-md-8">
                                    <label for="exampleTextarea1">Địa chỉ</label>
                                    <textarea class="form-control" id="exampleTextarea1" name="diachi" rows="4" placeholder="Nhập địa chỉ"><?=$diachi??''?></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="update" id="updatebtn" class="btn btn-primary mr-2">Cập nhật</button>
                        <a href="index.php?act=editpsw&id=<?=$id?>"  class="btn btn-primary mr-2">Đổi mật khẩu</a>
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
                    $('#updatebtn').attr('name',' ');
                } 
                if(data==0) {
                    $('#email_err').html('<span class="text-success">Bạn có thể sử dụng Email này.</span>');
                    $('#updatebtn').attr('name','update');
                }
            })
        })
    })
</script>
