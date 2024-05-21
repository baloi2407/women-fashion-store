<div class="content-wrapper">
    <?=$thongbao??''?>
    <h2>Thêm danh mục</h2>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="index.php?act=adddm" method="post">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tên danh mục</label>
                            <input type="text" name="tendm" class="form-control" id="exampleInputUsername1" placeholder="Nhập tên danh mục">
                        </div>
                        <?=$error??''?>

                        <button type="submit" name="add" class="btn btn-primary mr-2">Thêm</button>
                        <?=$link_ds??''?>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>