<div class="content-wrapper">
    <h2>Danh sách tài khoản</h2>
    <?=$thongbao??''?>
    <?=$tb??''?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($listtk as $tk) {
                                extract($tk);
                                $suatk = 'index.php?act=edittk&id='.$id;
                                $xoatk = 'index.php?act=listtk&xoatk=true&id='.$id;

                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$hoten.'</td>
                                    <td class="py-1">
                                        '.$email.'
                                    </td>
                                    <td>'.$dienthoai.'</td>
                                    <td class="sm-td">'.$diachi.'</td>
                                    <td>
                                        <a href="'.$xoatk.'" class="btn btn-primary">Xoá</a>
                                        <a href="'.$suatk.'" class="btn btn-primary">Sửa</a>
                                    </td>
                                </tr>
                                ';
                                $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>