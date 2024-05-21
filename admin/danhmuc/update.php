<?php
    if(is_array($dm))
        extract($dm);
?>
<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Cập nhật danh mục</h2>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=updatedm&iddm=<?=$id?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tên danh mục</label>
                            <input type="text" value="<?=$tendm?>" name="tendm" class="form-control" id="exampleInputUsername1" placeholder="Nhập tên danh mục">
                        </div>
                        <?=$error??''?>
                        <input type="hidden" value="<?=$id?>" name="iddm">
                        <button type="submit" name="update" class="btn btn-primary mr-2">Cập nhật</button>
                        <button type="reset" class="btn btn-primary mr-2">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>