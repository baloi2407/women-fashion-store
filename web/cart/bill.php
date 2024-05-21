<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bill confirm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Bill confirm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Breadcrumb Section End -->
<?php
    if(isset($bill) && is_array($bill)) {
        extract($bill);
    }
?>
<div class="container">
    <div class="card my-2">
        <div class="card-header">
            Thank You
        </div>
        <div class="card-body">
            <h5 class="card-title d-flex justify-content-center">Thank you for choosing us</h5>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-header">
            Bill Details
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li>Bill Code: <?=$bill['id']?></li>
                <li>Date: <?=$bill['ngaydathang']?></li>
                <li>Total: $<?=$bill['total']?></li>
                <li>Payment Method: <?=$bill['bill_pttt']?></li>
            </ul>
        </div>
    </div>
    <div class="card my-2">
        <div class="card-header">
            Customer Information
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li>Name: <?=$bill['bill_name']?></li>
                <li>Address: <?=$bill['bill_address']?></li>
                <li>Phone: <?=$bill['bill_phone']?></li>
                <li>Email: <?=$bill['bill_email']?></li>
            </ul>
        </div>
    </div>
</div>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                bill_chi_tiet($billct);
                                
                            ?>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->