<?php
    session_start();
    include "../../modal/pdo.php";
    include "../../modal/binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $listbl = loadall_binhluan($idpro);
?>

    <h3>Bình luận</h3>
    <div class="form-group">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <label for=""></label>
            <textarea class="form-control" name="noidung" id="" rows="3"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="submit" name="binhluanbtn">
        </form>
    </div>
    <table>
        <?php
            foreach ($listbl as $bl) {
                extract($bl);
                echo '
                    <tr>
                        <td>'.$iduser.' -</td>
                        <td> '.$noidung.'</td>
                        <td>'.$ngaybinhluan.'</td>
                    </tr>
                ';
            }
        ?>
    </table>
    <?php
        if(isset($_POST['binhluanbtn'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('d/m/Y');
            insert_binhluan($idpro,$iduser,$noidung,$ngaybinhluan);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    ?>
