<?php

function insert_sanpham($tensp,$img,$gia,$mota,$iddm) {
    $sql = "insert into sanpham(tensp,img,gia,mota,iddm) values('$tensp','$img','$gia','$mota','$iddm')";
    pdo_execute($sql);
}

function loadall_sanpham($kyw,$iddm,$time,$limit) {
    $sql = "select * from sanpham where 1  ";
    // tim san pham bang tu khoa
    if($kyw!=""){
        $sql.=" and tensp like '%".$kyw."%' ";
    }
    // tim bang iddm
    if($iddm>0) {
        $sql.=" and iddm=".$iddm;
    }
    // tim bang tu khoa hoac danh muc
    if($kyw!=""&&$iddm>0) {
        $sql.=" and tensp like '%".$kyw."%' "." and iddm=".$iddm;
    }
    // sap xep theo moi nhat hoac cu nhat
    if($time>0) {
        if($time==1) {
            $sql.=" order by id asc";
        } 
        if($time==2) {
            $sql.=" order by id desc";
        }
    } else {
        $sql.=" order by id desc";
    }
    if($limit>0) {
        $sql.=" limit 0,".$limit;
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function delete_sanpham($id) {
    $sql = "delete from sanpham where id=".$id;
    pdo_execute($sql);
}

function loadone_sanpham($id) {
    $sql = "select * from sanpham where id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadsp_cungloai($id,$iddm) {
    $sql = "select * from sanpham where iddm = '".$iddm."' "." and id<>".$id;
    $listsp = pdo_query($sql);
    return $listsp;
}

function update_sanpham($tensp,$img,$gia,$mota,$idsp,$iddm) {
    if($img !="") 
        $sql = "update sanpham set tensp='".$tensp."', img='".$img."', gia='".$gia."', mota='".$mota."', iddm='".$iddm."' where id=".$idsp;
    else 
    $sql = "update sanpham set tensp='".$tensp."', gia='".$gia."', mota='".$mota."', iddm='".$iddm."' where id=".$idsp; 
    pdo_execute($sql);
}

?>