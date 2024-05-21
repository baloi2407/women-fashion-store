<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>My Bills</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>My Bills</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Breadcrumb Section End -->
<div class="container my-3">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Bill Code</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Bill Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $quantity = loadall_cart_quantity($bill['id']);
                        echo '<tr>
                                <th>'.$bill['id'].'</th>
                                <td>'.$bill['ngaydathang'].'</td>
                                <td>'.$quantity.'</td>
                                <td>'.$bill['total'].'</td>
                                <td>'.$ttdh.'</td>
                            </tr>';
                    }
                }
            ?>
            

        </tbody>
    </table>
</div>