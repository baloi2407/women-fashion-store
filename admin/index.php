<?php
    include "../modal/pdo.php";
    include "../modal/danhmuc.php";
    include "../modal/sanpham.php";
    include "../modal/taikhoan.php";
    include "../modal/cart.php";
    
    include "header.php";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];

        // controller
        switch ($act) {
            /** ============================= DANH MUC ===================================*/
            // thêm danh mục
            case 'adddm':
                if(isset($_POST['add'])) {
                    $tendm = trim($_POST['tendm']);
                    $flag = true;
                    if(empty($tendm)) {
                        $error = '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Không được bỏ trống</strong> 
                        </div>
                        <script>
                        $(".alert").alert();
                        </script>
                        ';
                        $flag = false;
                    }

                    if($flag) {
                       insert_danhmuc($tendm);
                        $thongbao = 
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Thêm thành công</strong> 
                        </div>
                        <script>
                          $(".alert").alert();
                        </script>';
                        $link_ds = '
                        <button class="btn btn-primary"><a href="index.php?act=listdm" class="text-white text-decoration-none">Danh sách</a></button>
                        ';
                    }

                }
                include "danhmuc/add.php";
                break;
            // danh sách danh mục
            case 'listdm':
                if(isset($_GET['xoadm'],$_GET['id'])&&$_GET['xoadm']==true&&$_GET['id']>0) {
                    $dm = loadone_danhmuc($_GET['id']);
                    extract($dm);
                    $xoadm = 'index.php?act=xoadm&id='.$id;
                    $tb = '<div class="alert alert-warning" role="alert">
                        <div class="row">
                            <div class="col-md-10">
                            <h4>Xoá danh mục?</h4>
                            <strong>'.$tendm.'</strong>
                        
                            </div>
                            <div class="col-md-2">
                            <a href="'.$xoadm.'" class="btn btn-danger">Xoá</a>
                            </div>
                        </div>

                    </div>';
                }
                $listdm = loadall_danhmuc($limit=10);
                include "danhmuc/list.php";
                break;
            // xoá danh mục
            case 'xoadm':
                if(isset($_GET['id'])&&$_GET['id']>0) {
                    delete_danhmuc($_GET['id']);
                    $thongbao = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Xoá thành công</strong> 
                    </div>
                    
                    <script>
                      $(".alert").alert();
                    </script>
                    ';
                }
                $listdm = loadall_danhmuc($limit=10);
                include "danhmuc/list.php";
                break;
            // sửa danh mục
            case 'suadm':
                if(isset($_GET['id']) && $_GET['id']>0) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break; 
            // cập nhật danh mục
            case 'updatedm':
                if(isset($_POST['update'])) {
                    $tendm = trim($_POST['tendm']);
                    $iddm = $_POST['iddm'];
                    $flag = true;
                    if(empty($tendm)) {
                        $error = '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Không được bỏ trống</strong> 
                        </div>
                        <script>
                        $(".alert").alert();
                        </script>
                        ';
                        $flag = false;
                        $dm = loadone_danhmuc($iddm);
                        include "danhmuc/update.php";
                    }
                    if($flag) {
                        update_danhmuc($tendm,$iddm);
                        $thongbao = '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Cập nhật thành công thành công</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                        ';
                        $listdm = loadall_danhmuc($limit=0);
                        include "danhmuc/list.php";
                    }

                }
                break;
            /** ============================= SAN PHAM ===================================*/
            // thêm sản phẩm
            case 'addsp':
                if(isset($_POST['add'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = trim($_POST['tensp']);
                    $gia = trim($_POST['gia']);
                    $mota = trim($_POST['mota']);
                    $img = $_FILES['hinh']['name'];
                    $flag = true;
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    
                    // kiem tra ten san pham khong duoc bo trong
                    if(empty($tensp)) {
                        $error = '
                        <p class="text-danger">Tên sản phẩm không được bỏ trống</p>
                        ';
                        $flag = false;
                    }
                    // // kiem tra kieu du lieu gia tien
                    if(!is_numeric($gia)) {
                        $error_gia = '<p class="text-danger">Giá tiền nhập vào phải là số</p>';
                        $flag = false;
                    }

                    // kiem tra hinh anh them san pham
                    if(empty($img)) {
                        $error_img = '<p class="text-danger">Hình ảnh sản phẩm bị thiếu</p>';
                        $flag = false;
                    }
                    

                    if($flag) {
                        insert_sanpham($tensp,$img,$gia,$mota,$iddm);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            echo '<div class="alert alert-success" role="alert">
                                <strong>Thêm thành công</strong>
                            </div>';
                        }
                        $ds = '<button class="btn btn-primary"><a href="index.php?act=listsp" class="text-white text-decoration-none">Danh sách</a></button>';
                    }

                }
                $listdm = loadall_danhmuc($limit=0);
                include "sanpham/add.php";
                break;
            // danh sách sản phẩm
            case 'listsp':
                if(isset($_POST['timsp'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                    $time = 0;
                    $listsp = loadall_sanpham($kyw,$iddm,$time,$limit=10);
                    $ds= '<button class="btn btn-primary mt-2"><a href="index.php?act=listsp" class="text-white text-decoration-none">Quay lại</a></button>';
                } else{
                    $listsp = loadall_sanpham($kyw="",$iddm=0,$time=0,$limit=30);
                }
                if(isset($_GET['xoasp'],$_GET['id'])&&$_GET['xoasp']==true&&$_GET['id']>0) {
                    $sp = loadone_sanpham($_GET['id']);
                    extract($sp);
                    $xoasp = 'index.php?act=xoasp&id='.$id;
                    $tb = '<div class="alert alert-warning" role="alert">
                        <div class="row">
                            <div class="col-md-10">
                            <h4>Xoá sản phẩm?</h4>
                            <strong>'.$tensp.'</strong>
                        
                            </div>
                            <div class="col-md-2">
                            <a href="'.$xoasp.'" class="btn btn-danger">Xoá</a>
                            </div>
                        </div>

                    </div>';
                }
                $listdm = loadall_danhmuc($limit=0);
                include "sanpham/list.php";
                break;
            // xoá sản phẩm
            case 'xoasp':
                if(isset($_GET['id'])&&$_GET['id']>0) {
                    delete_sanpham($_GET['id']);
                    $thongbao = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Xoá thành công</strong> 
                    </div>
                    
                    <script>
                      $(".alert").alert();
                    </script>
                    ';
                }
                $listsp = loadall_sanpham($kyw="",$iddm=0,$time=0,$limit=10);
                include "sanpham/list.php";
                break;
            // sửa sản phẩm
            case 'suasp':
                if(isset($_GET['id']) && $_GET['id']>0) {
                    $sp =  loadone_sanpham($_GET['id']);
                    $listdm = loadall_danhmuc($limit=0);
                }
                include "sanpham/update.php";
                break; 
            // cập nhật sản phẩm
            case 'updatesp':
                if(isset($_POST['update'])) {
                    $idsp = $_POST['idsp'];
                    $iddm = $_POST['iddm'];
                    $tensp = trim($_POST['tensp']);
                    $gia = trim($_POST['gia']);
                    $mota = trim($_POST['mota']);
                    $img = $_FILES['img']['name'];
                    $flag = true;
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    
                    // kiem tra ten san pham khong duoc bo trong
                    if(empty($tensp)) {
                        $error = '
                        <p class="text-danger">Tên sản phẩm không được bỏ trống</p>
                        ';
                        $flag = false;
                    }
                    // // kiem tra kieu du lieu gia tien
                    if(!is_numeric($gia)) {
                        $error_gia = '<p class="text-danger">Giá tiền nhập vào phải là số</p>';
                        $flag = false;
                    }                    

                    if(!$flag) {
                        $sp = loadone_sanpham($idsp);
                        include "sanpham/update.php";
                    } else {
                        update_sanpham($tensp,$img,$gia,$mota,$idsp,$iddm);
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        echo '<div class="alert alert-success" role="alert">
                            <strong>Cập nhật thành công</strong>
                        </div>';
                        $listdm = loadall_danhmuc($limit=0);
                        $listsp = loadall_sanpham($kyw="",$iddm=0,$time=0,$limit=30);
                        include "sanpham/list.php";
                    }
                    

                }
                break;
                /** ============================= TAI KHOAN ===================================*/
                // thêm tài khoản
                case 'addtk':
                    if(isset($_POST['add'])) {
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
                            $loiht = '<p class="text-danger">Họ tên không được chứa ký tự đặc biệt.!</p>';
                            $flag = false;
                        }
                        // check email
                        $email_pattern = '/^\\S+@\\S+\\.\\S+$/'; 
                        if(!preg_match($email_pattern,$email)) {
                            $loiemail = '<p class="text-danger">Email không hợp lệ.!</p>';
                            $flag = false;
                        }
                        // check mat khau
                        if($psw!=$psw_repeat) {
                            $loimk = '<p class="text-danger">Xác nhận mật khẩu không đúng.!</p>';
                            $flag = false;
                        }
                        // check phone
                        if(!is_numeric($phone) && strlen($phone)>10) {
                            $loiphone = '<p class="text-danger">Số điện thoại không quá 10 chữ số.!</p>';
                            $flag = false;
                        }
                        
                        if($flag) {
                            insert_taikhoan($hoten,$email,$psw,$phone,$diachi,$bod);
                            $thongbao = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Thành công</strong> 
                          </div>';
                            $hoten =$email=$psw=$psw_repeat=$phone=$diachi=$bod="" ;     
                            $ds= '<button class="btn btn-primary"><a href="index.php?act=listtk" class="text-white text-decoration-none">Danh sách</a></button>';                       
                        }
                    }
                    include "taikhoan/add.php";
                    break;
                // danh sách tài khoản
                case 'listtk':
                    if(isset($_GET['xoatk'],$_GET['id'])&&$_GET['xoatk']==true&&$_GET['id']>0) {
                        $tk = loadone_taikhoan_id($_GET['id']);
                        extract($tk);
                        $xoatk = 'index.php?act=xoatk&id='.$id;
                        $tb = '<div class="alert alert-warning" role="alert">
                            <div class="row">
                                <div class="col-md-10">
                                <h4>Xoá tài khoản?</h4>
                                <strong>Họ tên: '.$hoten.' - Email: '.$email.'</strong>
                            
                                </div>
                                <div class="col-md-2">
                                <a href="'.$xoatk.'" class="btn btn-danger">Xoá</a>
                                </div>
                            </div>
    
                        </div>';
                    }
                    $listtk = loadall_taikhoan($hoten="",$email="",$time=0,$limit=20); 
                    include "taikhoan/list.php";
                    break;
                // xoá tài khoản
                case 'xoatk':
                    if(isset($_GET['id'])&&$_GET['id']>0) {
                        delete_taikhoan($_GET['id']);
                        $thongbao = '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Xoá thành công</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                        ';
                    }
                    $listtk = loadall_taikhoan($hoten="",$email="",$time=0,$limit=20); 
                    include "taikhoan/list.php";
                    break;
                // cập nhật tài khoản
                case 'edittk':
                    if(isset($_GET['id'])&&$_GET['id']>0) {
                        $tk = loadone_taikhoan_id($_GET['id']);
                    }                   
                    include "taikhoan/update.php";
                    break;
                case 'updatetk':
                    if(isset($_POST['update'])) {
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
                            $thongbao = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Cập nhật thành công</strong> 
                            </div>
                            
                            <script>
                                $(".alert").alert();
                            </script>';
                            

                        } 
                    }
                    $listtk = loadall_taikhoan($hoten="",$email="",$time=0,$limit=20); 
                    include "taikhoan/list.php";
                    break;
                // đổi mật khẩu tài khoàn 
                case 'editpsw':
                    if(isset($_GET['id'])&&$_GET['id']>0) {
                        $tk = loadone_taikhoan_id($_GET['id']);
                    } 
                    if(isset($_POST['updatepsw'])) {
                        $id = $_POST['id'];
                        $new_psw= $_POST['new_psw'];
                        $new_psw_repeat= $_POST['new_psw_repeat'];
                        $flag = true;
                        // check mat khau
                        if($new_psw ==""&&$new_psw_repeat=="") {
                            $thongbao = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Chưa nhập mật khẩu</strong> 
                            </div>
                            
                            <script>
                              $(".alert").alert();
                            </script>';
                            $flag = false;
                        }
                        if($new_psw!=$new_psw_repeat) {
                            $loi_repeat = '<p class="text-danger">Xác nhận mật khẩu không đúng.!</p>';
                            $flag = false;
                        }
                        if(strlen($new_psw) < 6) {
                            $loi_length = '<p class="text-danger">Mật khẩu quá ngắn.!</p>';
                            $flag = false;
                        }
                        if($flag) {
                            $new_psw= md5(trim($_POST['new_psw']));
                            $new_psw_repeat= md5(trim($_POST['new_psw_repeat']));
                            update_psw($new_psw,$id);
                            $thongbao = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Cập nhật thành công</strong> 
                            </div>
                            
                            <script>
                                $(".alert").alert();
                            </script>';
                            $listtk = loadall_taikhoan($hoten="",$email="",$time=0,$limit=20); 
                            include "taikhoan/list.php";
                        } 
                    }
                    include "taikhoan/update_password.php";
                    break;
                    // =========================================== BILL
                    case 'listbill':
                        if(isset($_POST['keyword']) && $_POST['keyword']!="") {
                            $keyword = $_POST['keyword'];
                        } else {
                            $keyword = "";
                        }
                        $listbill = loadall_bill($keyword,0);;

                        include "bill/listbill.php";
                        break; 
                    // =========================================== \\BILL 
                    // thong ke
                    case 'thongke':
                        $listthongke = loadall_thongke();
                        include('thongke/list.php');
                        break;
                    case 'xembieudo':
                        $listthongke = loadall_thongke();
                        include('thongke/bieudo.php');
                        break;
                    
                
                
                
            default:
            include "home.php";
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";
?>