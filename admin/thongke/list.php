<div class="container my-3">
    <form action="index.php?act=dsdh" method="post" class="my-3">
        <input type="text" name="keyword" placeholder="Enter code">
        <input type="submit" name="search" value="GO">
    </form>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>PT Code</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Max</th>
                <th>Min</th>
                <th>Avg</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listthongke as $tk) {
                    extract($tk);
                    echo '
                    <tr>
                        <td>'.$madm.'</td>
                        <td>'.$tendm.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$avgprice.'</td>
                    </tr>
                    ';
                }
            ?>
            
            

        </tbody>
    </table>
    <a class="btn btn-info" href="index.php?act=xembieudo">Xem bieu do</a>
</div>