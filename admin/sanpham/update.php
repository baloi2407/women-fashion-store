<?php
    if(is_array($sp)){
        extract($sp);
    }
    

?>
<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Cập nhật sản phẩm</h2>
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=updatesp&idsp=<?=$id?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="exampleInputUsername1">Tên sản phẩm</label>
                                    <input type="text" value="<?=$tensp?>" name="tensp" class="form-control" id="exampleInputUsername1" placeholder="Nhập tên sản phẩm">
                                    <?=$error??''?>
                                </div>
                                <input type="hidden" name="idsp" value="<?=$id?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình</label>
                            <input type="text" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="file" class="form-control file-upload-info" name="img" placeholder="Upload Image">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Hình ảnh</button>
                                </span>
                            </div>
                            <?=$error_img??''?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputUsername1">Giá</label>
                                    <input type="text" name="gia" class="form-control" id="exampleInputUsername1" placeholder="Nhập giá" value="<?=$gia?>">
                                    <?=$error_gia??''?>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Danh mục</label>
                                    <select name="iddm" class="form-control text-dark" id="">
                                    <?php
                                            foreach ($listdm as $dm) {
                                                extract($dm);
                                                if($id==$iddm) {
                                                    echo '<option value="'.$iddm.'" selected class="bg-secondary">'.$tendm.'</option>';
                                                } else{
                                                    echo '<option value="'.$id.'">'.$tendm.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Mô tả</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="mota"><?=$mota?></textarea>
                        </div>
                        
                        
                        <button type="submit" name="update" class="btn btn-primary mr-2">Cập nhật</button>
                        <button type="reset" class="btn btn-primary mr-2">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>


