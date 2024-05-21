<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Danh sách danh mục</h2>
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <?=$tb??''?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($listdm as $dm) {
                                extract($dm);
                                $suadm = 'index.php?act=suadm&id='.$id;
                                $xoadm = 'index.php?act=listdm&xoadm=true&id='.$id;
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$tendm.'</td>
                                    <td><a href="'.$xoadm.'" class="btn btn-primary">Xoá</a>
                                    <a href="'.$suadm.'" class="btn btn-primary">Sửa</a></td>
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
