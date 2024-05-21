<?php

function insert_taikhoan($hoten,$email,$psw,$phone,$address,$bod) {
    $sql = "insert into taikhoan(hoten,email,matkhau,dienthoai,diachi,ngaysinh) values('$hoten','$email','$psw','$phone','$address','$bod')";
    pdo_execute($sql);
}

function loadall_taikhoan($hoten,$email,$time,$limit) {
    $sql = "select * from taikhoan where 1  ";
    // tim san pham bang tu khoa
    if($hoten!=""){
        $sql.=" and hoten like '%".$hoten."%' ";
    }
    // tim bang email
    if($email!="") {
        $sql.=" and email=".$email;
    }
    // tim bang tu khoa hoac danh muc
    if($hoten!=""&&$email>0) {
        $sql.=" and hoten like '%".$hoten."%' "." and email=".$email;
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
    $listtk = pdo_query($sql);
    return $listtk;
}

function delete_taikhoan($id) {
    $sql = "delete from taikhoan where id=".$id;
    pdo_execute($sql);
}

function loadone_taikhoan($email,$psw) {
    $sql = "select * from taikhoan where email='".$email."' and matkhau = '".$psw."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function loadone_taikhoan_id($id) {
    $sql = "select * from taikhoan where id='".$id."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function loadone_taikhoan_email($email) {
    $sql = "select * from taikhoan where email='".$email."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function loadone_taikhoan_psw($psw) {
    $sql = "select * from taikhoan where matkhau='".$psw."'";
    $tk = pdo_query_one($sql);
    return $tk;
}



function update_taikhoan($hoten,$email,$phone,$address,$bod,$id) {
    $sql = "update taikhoan set hoten='".$hoten."', email='".$email."', dienthoai='".$phone."', diachi='".$address."', ngaysinh='".$bod."' where id='".$id."'";
    pdo_execute($sql);
}
function update_psw($psw,$id) {
    $sql = "update taikhoan set matkhau='".$psw."' where id='".$id."'";
    pdo_execute($sql);
}
function forgot_psw($psw,$email) {
    $sql = "update taikhoan set matkhau='".$psw."' where email='".$email."'";
    pdo_execute($sql);
}



?>