<?php
    include "./modal/pdo.php";
    include "./modal/danhmuc.php";
    include "./modal/sanpham.php";
    include "./modal/taikhoan.php";
    include "./modal/cart.php";
    // global variables
    session_start();
    $listsp = loadall_sanpham($kyw="",$iddm=0,$time=0,$limit=4);
    $listdm = loadall_danhmuc($limit);
    $img_path = "./uploads/";
    $listdm = loadall_danhmuc($limit=4);
    include "./web/header.php";
    if(!isset($_SESSION['mycart']))  $_SESSION['mycart'] = [];
    // array_slice($_SESSION['mycart'],0,1);
    // $_SESSION['mycart'] = [];
    
    // controller
    if(isset($_GET['act'])) {
        $act = $_GET['act'];

        switch ($act) {
            // -----------------------------CHI TIẾT SẢN PHẨM
            case 'pro_details':
                if(isset($_GET['id']) && $_GET['id']>0) {
                    $chitietsp = loadone_sanpham($_GET['id']);
                    extract($chitietsp);
                    $listsp_cungloai = loadsp_cungloai($id,$iddm);
                }
                include "./web/chitietsp.php";
                break;
            case 'pro_list':
                if(isset($_GET['id'])&&$_GET['id']>0) {
                    $listsp = loadall_sanpham($kyw="",$iddm=$_GET['id'],$time=2,$limit);
                    $dm = loadone_danhmuc($_GET['id']);
                    extract($dm);
                    include "./web/sanpham.php";
                }
                break;
            case 'search':
                if(isset($_GET['q'])&&$_GET['q']) {
                    $listsp = loadall_sanpham($kyw=$_GET['q'],$iddm=0,$time=2,$limit);
                    include "./web/sanpham.php";
                }
                break;
            // -----------------------------//CHI TIẾT SẢN PHẨM

            // -------------------------------TÀI KHOẢN-----------------------    
            case 'signup':
                if(isset($_POST['dkybtn'])) {
                    $hoten = trim($_POST['hoten']);
                    $email = trim($_POST['email']);
                    $psw = md5(trim($_POST['psw']));
                    $psw_repeat = md5(trim($_POST['psw_repeat']));
                    $phone = trim($_POST['phone']);
                    $diachi = trim($_POST['diachi']);
                    $bod = $_POST['bod'];
                    $flag = true;
                    // check ho ten
                    $hoten_pattern = "/[@#$%^&?().*{}<>;:,=_]/m";
                    if(empty($hoten) || preg_match($hoten_pattern, $hoten)) {
                        $loiht = '<p class="text-danger">Name not contains special characters.!</p>';
                        $flag = false;
                    }
                    // check email
                    $email_pattern = '/^\\S+@\\S+\\.\\S+$/'; 
                    if(!preg_match($email_pattern,$email)) {
                        $loiemail = '<p class="text-danger">Email is not correct.!</p>';
                        $flag = false;
                    }
                    // check mat khau
                    if($psw!=$psw_repeat) {
                        $loimk = '<p class="text-danger">Confirm password does not match.!</p>';
                        $flag = false;
                    }
                    // check phone
                    if(!is_numeric($phone) && strlen($phone)>10) {
                        $loiphone = '<p class="text-danger">Phone number consists of only 10 numbers.!</p>';
                        $flag = false;
                    }
                    
                    if($flag) {
                        insert_taikhoan($hoten,$email,$psw,$phone,$diachi,$bod);
                        $tb = '<div class="alert alert-primary bg-success" role="alert">
                            <strong>Congratulation!</strong>
                        </div>';
                        $hoten =$email=$psw=$psw_repeat=$phone=$diachi=$bod="" ;
                        echo '<script>document.location="index.php?act=dn"</script>';
                        
                    }
                }
                include "./web/taikhoan/dangky.php";
                break;
                // if(!isset($_SESSION['user'])&&(!$_SESSION['user'])) {
                // } else {
                //     echo '<script>document.location="index.php"</script>';
                //     break;
                // }
                
            case 'signin':
                if(!isset($_SESSION['user'])) {
                    if(isset($_POST['dnbtn'])) {
                        $email = trim($_POST['email']);
                        $psw = md5(trim($_POST['psw']));
                        $flag = true;
                        $email_pattern = '/^\\S+@\\S+\\.\\S+$/'; 
                        if(!preg_match($email_pattern,$email)) {
                            $loiemail = '<p class="text-danger">Email is not correct.!</p>';
                            $flag = false;
                        }
                        if($flag) {
                            $tk = loadone_taikhoan($email,$psw);
                            if(!is_array($tk)) {
                                $tb = '<div class="alert alert-danger bg-danger" role="alert">
                                <strong>Email or Password incorrect!</strong>
                                </div>';
                            } else {
                                $tk = loadone_taikhoan($email,$psw);
                                $_SESSION['user'] = $tk;
                                extract($_SESSION['user']);
                                // if(isset($_POST['nho'])&&($_POST['nho'])) {
                                //     $time = time()+60*15;
                                //     setcookie('src',true,$time);
                                //     setcookie('u',$_SESSION['username'],$time);
                                // }
                                echo '<script>document.location="index.php"</script>';
                            }
                        }
    
                    }
                    include "./web/taikhoan/dangnhap.php";
                    break;
                } else {
                    echo '<script>document.location="index.php"</script>';
                    break;
                }
            case 'logout':
                session_destroy();
                echo '<script>document.location="index.php"</script>';
                break;
            case 'forgot_pass':
                if(isset($_POST['qmkbtn'])) {
                    $email = trim($_POST['email']);
                    $flag = true;
                    $email_pattern = '/^\\S+@\\S+\\.\\S+$/'; 
                    if(!preg_match($email_pattern,$email)) {
                        $loiemail = '<p class="text-danger">Email is not correct.!</p>';
                        $flag = false;
                    }
                    if($flag) {
                        $tk =loadone_taikhoan_email($email);
                        if(!is_array($tk)) {
                            $tb_loi = '<div class="alert alert-danger bg-danger" role="alert">
                            <strong>Email incorrect!</strong>
                            </div>';
                        } else {
                            $matkhaumoi = rand(0,999999);
                            forgot_psw(md5($matkhaumoi),$email);
                            $tb_ok = '<div class="alert alert-success bg-success" role="alert">
                            <strong>New Password:'.$matkhaumoi.'!</strong>
                            </div>';
                        }
                    }
                }
                include "./web/taikhoan/quenmatkhau.php";
                break;
                case 'edit':
                    if(isset($_SESSION['user'])) {
                        $tk = loadone_taikhoan_email($_SESSION['user']['email']);
                    }
                    
                    include "./web/taikhoan/edit_tk.php";
                    break;
                case 'update':
                    if(isset($_POST['editbtn'])) {
                        $id = $_POST['id'];
                        $hoten = trim($_POST['hoten']);
                        $email = trim($_POST['email']);
                        $phone = trim($_POST['phone']);
                        $diachi = trim($_POST['diachi']);
                        $bod = $_POST['bod'];
                        $flag = true;
                        // check ho ten
                        $hoten_pattern = "/[@#$%^&?().*{}<>;:,=_]/m";
                        if(empty($hoten) || preg_match($hoten_pattern, $hoten)) {
                            $loiht = '<p class="text-danger">Name not contains special characters.!</p>';
                            $flag = false;
                        }
                        // check email
                        $email_pattern = '/^\\S+@\\S+\\.\\S+$/'; 
                        if(!preg_match($email_pattern,$email)) {
                            $loiemail = '<p class="text-danger">Email is not correct.!</p>';
                            $flag = false;
                        }
                        // check phone
                        if(!is_numeric($phone) && strlen($phone)>10) {
                            $loiphone = '<p class="text-danger">Phone number consists of only 10 numbers.!</p>';
                            $flag = false;
                        }
                        
                        if($flag) {
                            update_taikhoan($hoten,$email,$phone,$diachi,$bod,$id);
                            $tb = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Successfully!</strong> 
                            </div>
                            
                            <script>
                              $(".alert").alert();
                            </script>';
                            
                        }
                    }
                    $tk = loadone_taikhoan_email($_SESSION['user']['email']);
                    include "./web/taikhoan/edit_tk.php";
                    break;
                // đổi mật khẩu
                case 'editpsw':
                    $tk = loadone_taikhoan_email($_SESSION['user']['email']);
                    include "./web/taikhoan/doimatkhau.php";
                    break;
                case 'updatepsw':
                    if(isset($_POST['doimkbtn'])) {
                        $id = $_POST['id'];
                        $new_psw= $_POST['new_psw'];
                        $new_psw_repeat= $_POST['new_psw_repeat'];
                        $flag = true;
                        // check mat khau

                        if($new_psw!=$new_psw_repeat) {
                            $loimk_repeat = '<p class="text-danger">New Password confirm is not correct!</p>';
                            $flag = false;
                        }
                        if(strlen($new_psw) < 6) {
                            $loimk_length = '<p class="text-danger">Password too short, at least 6 characters!</p>';
                            $flag = false;
                        }
                        if($flag) {
                            $new_psw= md5(trim($_POST['new_psw']));
                            $new_psw_repeat= md5(trim($_POST['new_psw_repeat']));
                            update_psw($new_psw,$id);
                            $tb = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Change Password successfully!</strong> 
                            </div>
                            
                            <script>
                              $(".alert").alert();
                            </script>';
                            echo '<script>document.location="index.php?act=edit"</script>';
                        } else {
                            $tk = loadone_taikhoan_email($_SESSION['user']['email']);
                            include "./web/taikhoan/doimatkhau.php";
                        }
                    }
                    break;
                // -------------------------------//TÀI KHOẢN-----------------------
                // ------------------------------- GIỎ HÀNG------------------------
                case 'addtocart':
                    if(isset($_POST['addcart'])&&($_POST['addcart'])) {
                        $id = $_POST['id'];
                        $tensp = $_POST['tensp'];
                        $soluong = $_POST['soluong'];
                        $img = $_POST['img'];
                        $gia = $_POST['gia'];
                        $total = $gia*$soluong;
                        $cart = [$id,$tensp,$soluong,$img,$gia,$total];
                        array_push($_SESSION['mycart'],$cart);
                    }
                    include "./web/cart/viewcart.php";
                    break;   
                case 'viewcart':
                    include "./web/cart/viewcart.php";
                    break; 
                case 'delcart':
                    
                    if(isset($_GET['idcart'])) {
                        array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                    }  
                    echo '<script>document.location="index.php?act=viewcart"</script>';
                    break; 
                case 'billconfirm':
                    include "./web/cart/billconfirm.php";
                    break;
                case 'bill':
                    if(isset($_POST['confirm'])&&($_POST['confirm'])) {
                        $iduser = $_SESSION['user']['id'];
                        $name = $_POST['hoten'];
                        $email = $_POST['email'];
                        $diachi = $_POST['diachi'];
                        $phone = $_POST['phone'];
                        $pttt = $_POST['pttt'];
                        $total = tongdonhang();
                        $ngaydathang = date('d/m/Y');
                        $idbill = insert_bill($iduser,$name,$email,$diachi,$phone,$pttt,$total,$ngaydathang);
                        foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'],$cart[0],$cart[3],$cart[1],$cart[4],$cart[2],$cart[5],$idbill);
                    }
                    $_SESSION['mycart'] = [];
                    }
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    include "./web/cart/bill.php";
                    break;
                case 'mybill':
                    $listbill = loadall_bill($kyw="",$_SESSION['user']['id']);
                    include "./web/cart/mybill.php";
                    break;
                // -------------------------------//GIỎ HÀNG-----------------------
            
            default:
                include "./web/home.php";
                break;
        }
    } 
    else {
        include "./web/home.php";
    }

    include "./web/footer.php";
?>