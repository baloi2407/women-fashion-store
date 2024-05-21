<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Danh sách sản phẩm</h2>
    <form action="index.php?act=listsp" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="kyw" id="" class="form-control" placeholder="Nhập tên sản phẩm" aria-describedby="helpId">
                </div>
                <div class="col-md-6">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="iddm" id="" class="form-control text-dark border-primary">
                        <option value="0">--Chọn danh mục--</option>
                        <?php
                            foreach ($listdm as $dm) {
                               extract($dm);
                               echo '<option value="'.$id.'">'.$tendm.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <input type="submit" value="Tìm kiếm" class="btn btn-primary mt-2" name="timsp">
            <?=$ds??''?>
        </div>
    </form>
    <?=$tb??''?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($listsp as $sp) {
                                extract($sp);
                                $suasp = 'index.php?act=suasp&id='.$id;
                                $xoasp = 'index.php?act=listsp&xoasp=true&id='.$id;
                                $hinhpath = '../uploads/'.$img;
                                if(is_file($hinhpath)) $hinh = '<img src="'.$hinhpath.'" alt="image"/>';
                                else $hinh = 'Không có hình ảnh';
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$tensp.'</td>
                                    <td class="py-1">
                                        '.$hinh.'
                                    </td>
                                    <td>'.$gia.'</td>
                                    <td class="sm-td">'.$mota.'</td>
                                    <td>
                                        <a href="'.$xoasp.'" class="btn btn-primary">Xoá</a>
                                        <a href="'.$suasp.'" class="btn btn-primary">Sửa</a>
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