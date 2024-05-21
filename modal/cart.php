<?php
function viewcart($del) {
    global $img_path;
    $subtotal =$i=0;
    if($del==1) {
        $del_th = '<th>Remove</th>';
        $colspan = 6;
        
    } else {
        $del_th = "";
        $colspan = 5;
    }
    echo '<thead>
                <tr>
                    <th>ID.</th>	
                    <th>Product</th>
                    <th>Quality</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Total</th>
                    '.$del_th.'
                </tr>
            </thead>';
    foreach ($_SESSION['mycart'] as $cart) {
        $img_src = $img_path.$cart['3'];
        $total = $cart['2']*$cart['4'];
        $subtotal+=$total;
        $del_href = '<a href="index.php?act=delcart&idcart='.$i.'" class="close1"></a>';
        if($del==1) {
            $del_td = '<td class="invert">
                            <div class="rem">
                                '.$del_href.'
                            </div>
                        </td>';
            $quantity = '<td class="invert">
            <div class="quantity"> 
                <div class="quantity-select">                           
                    <div class="entry value-minus">&nbsp;</div>
                    <div class="entry value"><span>'.$cart['2'].'</span></div>
                    <div class="entry value-plus active">&nbsp;</div>
                </div>
            </div>
        </td>';
        } else {
            $del_td = "";
            $quantity = '<td class="invert">
                            <div class="quantity">'.$cart['2'].'</div>
                        </td>';
        }
        echo '
            <tr class="rem1">
                <td class="invert">'.$cart[0].'</td>
                <td class="invert-image"><a href="single.html"><img src="'.$img_src.'" alt=" " class="img-responsive" /></a></td>
                '.$quantity.'
                <td class="invert">'.$cart['1'].'</td>
                <td class="invert">$'.$cart['4'].'</td>
                <td class="invert">$'.$total.'</td>
                '.$del_td.'
            </tr>
            
        ';
        $i+=1;
    }
    echo '
        <tr >
            <td colspan="'.$colspan.'">Subtotal: </td>
            <td>$'.$subtotal.'</td>
        </tr>
    ';
}
function tongdonhang() {
    
    $subtotal =0;
    
    foreach ($_SESSION['mycart'] as $cart) {
        $total = $cart['2']*$cart['4'];
        $subtotal+=$total;
    }
    return $subtotal;
}
function insert_bill($iduser,$name,$email,$diachi,$phone,$pttt,$total,$ngaydathang) {
    $sql  = "insert into bill(iduser,bill_name,bill_email,bill_address,bill_phone,bill_pttt,total,ngaydathang) 
    values('$iduser','$name','$email','$diachi','$phone','$pttt','$total','$ngaydathang') ";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill) {
    $sql  = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) 
    values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill') ";
    return pdo_execute($sql);
}
function loadone_bill($id) {
    $sql = "select * from bill where id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($id) {
    $sql = "select * from cart where idbill=".$id;
    $bill = pdo_query($sql);
    return $bill;
}
function bill_chi_tiet($listbill) {
    $i = 0;
    $total = 0;
    foreach ($listbill as $cart) {
        $total+=$cart['thanhtien'];

        echo '<tr>
                <td class="shoping__cart__item">
                    <img src="'.$cart['img'].'" alt="" width="100">
                    <h5>'.$cart['name'].'</h5>
                </td>
                <td class="shoping__cart__price">
                    $'.$cart['price'].'
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input min="1" value="'.$cart['soluong'].'">
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    $'.$cart['thanhtien'].'
                </td>
            </tr>
            ';
            $i+=1;
    }
    echo '<tr>
            <td colspan="4">Total</td>
            <td>'.$total.'</td>
            <td></td>
        </tr>';  
}
function loadall_cart_quantity($id) {
    $sql = "select * from cart where idbill=".$id;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function loadall_bill($keyword,$iduser) {
    $sql = "select * from bill where 1 ";
    if($iduser>0) $sql.=" and iduser=".$iduser;
    if($keyword!="") $sql.=" and id like '%".$keyword."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($bill_status) {
    switch($bill_status) {
        case '0':
            $tt = "New order";
            break;
        case '1':
            $tt = "Processing";
            break;
        case '2':
            $tt = "Delivery";
            break;
        case '3':
            $tt = "Delivered";
            break;
        default:
            $tt = "New order";
            break;
    }
    return $tt;
}
function loadall_thongke() {
    $sql = "select danhmuc.id as madm, danhmuc.tendm as tendm, count(sanpham.id) as countsp, min(sanpham.gia) as minprice, max(sanpham.gia) as maxprice,
    avg(sanpham.gia) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listk = pdo_query($sql);
    return $listk;
}
?>