<?php

function insert_danhmuc($tendm) {
    $sql = "insert into danhmuc(tendm) values('$tendm')";
    pdo_execute($sql);
}

function loadall_danhmuc($limit) {
    $sql = "select * from danhmuc order by id desc";
    if($limit>0) {
        $sql.=" limit 0,".$limit;
    }
    $listdm = pdo_query($sql);
    return $listdm;
}

function delete_danhmuc($id) {
    $sql = "delete from danhmuc where id=".$id;
    pdo_execute($sql);
}

function loadone_danhmuc($id) {
    $sql = "select * from danhmuc where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($tendm,$iddm) {
    $sql = "update danhmuc set tendm='".$tendm."' where id=".$iddm;
    pdo_execute($sql);
}

?>