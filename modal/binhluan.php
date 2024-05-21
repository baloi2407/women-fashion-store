<?php
    function insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan) {
        $sql = "insert into binhluan(idpro,iduser,noidung,ngaybinhluan) values('$idpro','$iduser','$noidung','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro) {
        $sql = "select * from binhluan where idpro='".$idpro."'";
        $listbl = pdo_query($sql);
        return $listbl;
    }
?>