<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Đổi mật khẩu tài khoản</h2>
    <?php
        if(is_array($tk)) {
            extract($tk);
        }
    ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action=""  method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" name="new_psw" class="form-control" id="psw_repeat" placeholder="Nhập mật khẩu mới" >
                            <input type="hidden" name="id" class="form-control" id="" value="<?=$id?>" >
                            <p id="email_err"></p>
                            <?=$loi_length??''?>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="password" name="new_psw_repeat" class="form-control" id="psw_repeat" placeholder="Nhập mật khẩu mới" >
                            <p id="email_err"></p>
                            <?=$loi_repeat??''?>
                        </div>
                        
                        <button type="submit" name="updatepsw" id="updatebtn" class="btn btn-primary mr-2">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>

