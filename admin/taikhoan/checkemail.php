<?php
    include "../../modal/pdo.php";

    include "../../modal/taikhoan.php";
    $email = loadone_taikhoan_qmk($_POST['email']);
    if(is_array($email)) {
        echo '1';
    } else {
        echo '0';
    }
?>