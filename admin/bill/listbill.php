<div class="container my-3">
    <form action="index.php?act=dsdh" method="post" class="my-3">
        <input type="text" name="keyword" placeholder="Enter bill code">
        <input type="submit" name="search" value="GO">
    </form>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Bill Code</th>
                <th>Customer</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Bill Status</th>
                <th>Orther</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $ttdh = get_ttdh($bill['bill_status']);
                    $quantity = loadall_cart_quantity($bill['id']);
                    echo '
                    <tr>
                    <td></td>
                    <td>'.$bill['id'].'</td>
                    <td>
                        <ul class="list-unstyled">
                            <li>'.$bill['bill_name'].'</li>
                            <li>'.$bill['bill_email'].'</li>
                            <li>'.$bill['bill_address'].'</li>
                            <li>'.$bill['bill_phone'].'</li>
                        </ul>
                    </td>
                    <td>'.$quantity.'</td>
                    <td>$'.$bill['total'].'</td>
                    <td>'.$ttdh.'</td>
                    <td><a href=""><input type="button" value="Sửa"></a> 
                      <a href=""><input type="button" value="Xoá"></a></td>
                    </tr>
                    ';
                }
            ?>
            
            

        </tbody>
    </table>
</div>