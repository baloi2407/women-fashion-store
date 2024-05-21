<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Thêm sản phẩm</h2>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="tensp" class="form-control" id="" placeholder="Nhập tên sản phẩm" value="<?=$tensp??''?>">
                            <?=$error??''?>
                        </div>
                        <div class="form-group">
                            <label>Hình</label>
                            <input type="text" disabled class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control" name="hinh" value="<?=$img??''?>">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Hình ảnh</button>
                                </span>
                            </div>
                            <?=$error_img??''?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Giá</label>
                                    <input type="text" name="gia" class="form-control" id="" placeholder="Nhập giá" value="<?=$gia??''?>">
                                    <?=$error_gia??''?>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Danh mục</label>
                                    <select name="iddm" class="form-control text-dark" id="">
                                        <?php
                                            foreach ($listdm as $dm) {
                                                extract($dm);
                                                echo '<option value="'.$id.'">'.$tendm.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Mô tả</label>
                            <textarea class="form-control" id="exampleTextarea1" name="mota" rows="4" placeholder="Nhập mô tả"><?=$mota??''?></textarea>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary mr-2">Thêm</button>
                        <?=$ds??''?>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>
