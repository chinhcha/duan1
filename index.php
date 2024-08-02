<?php
session_start();
ob_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/thongke.php";
include "./model/donhang.php";
include "./model/danhmuc.php";
include "model/taikhoan.php";
include "./model/binhluan.php";
include "./view/include/header.php";
$sanpham = loadall_sp();
$danhmuc = LoadAll_DM();
$spnew = load_spnew();
$ds_dm = thong_ke_sp_dm();
// unset($_SESSION['cart']);
// var_dump($_SESSION['cart']);
// die;
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_SESSION['username']) && $_SESSION['username']['chucvu'] == '1') {
    header("location: admin/index.php");
} elseif (isset($_SESSION['username']) && $_SESSION['username']['chucvu'] == '0') {
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case "chitietsp":
                if (isset($_GET['id_sp'])) {
                    $sp = load_one_sp($_GET['id_sp']);
                    $hinh_sp = load_img_sp($_GET['id_sp']);
                    $loadbinhluan = LoadAll_BL_user($_GET['id_sp']);
                }
                include "./view/chitietsp.php";
                break;
                // case "danhmuc":
                //     if (isset($_GET['id_dm'])){
                //         $sp_dm = loadall_sp($_GET['id_dm']);
                // }
            case "trangsp":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = '';
                }
                if (isset($_GET['id_dm'])) {
                    $id_dm = $_GET['id_dm'];
                } else {
                    $id_dm = 0;
                }
                $sanpham = loadAll_sp_test($id_dm, $kyw);
                include "./view/shop.php";
                break;
            case "cart":
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    $dataDb =  $cart;
                    // tạo mảng chứa ID sp trong giỏ hàng
                    $productId = array_column($cart, 'id_sp');

                    // Chuyển mảng id thành 1 chuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);

                    // Lấy sp trong bảng sp theo id
                    $dataDb = loadone_sanphamCart($idList);
                    // var_dump($dataDb);
                }
                include "./view/cart.php";
                break;
            case "about-us":
                include "./view/about.php";
                break;
            case "contact":
                include "./view/contact.php";
                break;
            case "dangky":
                if (isset($_POST['dangky'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $chucvu = $_POST['chucvu'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $diachi = $_POST['diachi'];
                    insert_taikhoan($username, $password, $fullname, $chucvu, $email, $phone, $diachi);
                    $thongbao = " Đăng ký thành công";
                }
                include "./view/taikhoan/dangky.php";
                break;
            case "dangnhap":
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'] != "")) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $checkuser = checkuser($username, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['username'] = $checkuser;
                        if ($_SESSION['username']['lock'] == 1) {
                            if (isset($_SESSION["username"])) {
                                unset($_SESSION["username"]);
                            }
                            echo '<script>alert("Tài Khoản của bạn đã bị khóa")</script>';
                            echo "  <script>window.location.href ='?act=dangnhap'</script> ";
                        } else {

                            echo "  <script>window.location.href ='index.php'</script> ";
                        }
                    } else {
                        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
                        echo "  <script>window.location.href ='?act=dangnhap'</script> ";
                    }
                }
                include "./view/taikhoan/dangnhap.php";
                break;
            case "taikhoan":
                include "./view/taikhoan/account.php";
                break;
            case "dangxuat":
                dangxuat();
                include "./view/include/home.php";
                break;
            case "quenmk":
                if (isset($_POST['quenmk'])) {
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "./view/taikhoan/quenmk.php";
                break;
                // case "updatetk":


            case "checkout":

                include "./view/checkout.php";
                break;
            case 'binhluan':
                if (isset($_POST['gui']) && ($_POST['gui'] != "")) {
                    $name = $_POST['binhluan'];
                    $id_tk = $_POST['id_tk'];
                    $id_sp = $_POST['id'];
                    $id_dm = $_POST['id_dm'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayGioHienTai = date('Y-m-d H:i:s');
                    add_bl($name, $id_tk, $id_sp, $ngayGioHienTai);
                    echo "  <script>window.location.href ='?act=chitietsp&id_sp=$id_sp&id_dm=$id_dm'</script> ";
                }

                break;


            case 'muathanhcong':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $full_name = $_POST['full_name'];
                    $dia_chi = $_POST['dia_chi'];
                    $phone = $_POST['phone'];
                    if (empty($_POST['payUrl'])) {
                        $payErr = "Payment method is required";
                    } else {
                        $thanh_toan = $_POST['payUrl'];
                    }
                    $thanh_tien = $_SESSION['resultTotal'];
                    if (isset($thanh_toan)) {
                        if ($thanh_toan == "Thanh toán online") {
                            $id_ctd = insert_ctdon($_SESSION['username']['id_tk'], $full_name, $phone, $dia_chi, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                insert_don($id_ctd, $item['id_sp'], $item['soluong'], 'màu trắng', '40');
                            }
                            unset($_SESSION['cart']);
                            include "view/thanhtoan.php";
                        } else {
                            $id_ctd = insert_ctdon($_SESSION['username']['id_tk'], $full_name, $phone, $dia_chi, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                insert_don($id_ctd, $item['id_sp'], $item['soluong'], 'màu trắng', '40');
                            }
                            unset($_SESSION['cart']);
                        }
                    }
                }
                include "./view/after_buy.php";
                break;

            case 'chitietdon':

                $id_ctdon = $_GET['id_ctd'];
                $trang_thai = $_GET['trang_thai'];
                $ds = load_don_chitiet($id_ctdon);


                include "./view/chitietdon.php";
                break;
        }
    } else {
        include "./view/include/home.php";
    }
} else {
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case "chitietsp":
                if (isset($_GET['id_sp'])) {
                    $sp = load_one_sp($_GET['id_sp']);
                    $hinh_sp = load_img_sp($_GET['id_sp']);
                    $loadbinhluan = LoadAll_BL_user($_GET['id_sp']);
                }
                include "./view/chitietsp.php";
                break;
                // case "danhmuc":
                //     if (isset($_GET['id_dm'])){
                //         $sp_dm = loadall_sp($_GET['id_dm']);
                // }
            case "trangsp":
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = '';
                }
                if (isset($_GET['id_dm'])) {
                    $id_dm = $_GET['id_dm'];
                } else {
                    $id_dm = 0;
                }
                $sanpham = loadAll_sp_test($id_dm, $kyw);
                include "./view/shop.php";
                break;
            case "cart":
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    $dataDb =  $cart;
                    // tạo mảng chứa ID sp trong giỏ hàng
                    $productId = array_column($cart, 'id_sp');

                    // Chuyển mảng id thành 1 chuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);

                    // Lấy sp trong bảng sp theo id
                    $dataDb = loadone_sanphamCart($idList);
                    // var_dump($dataDb);
                }
                include "./view/cart.php";
                break;
            case "about-us":
                include "./view/about.php";
                break;
            case "contact":
                include "./view/contact.php";
                break;
            case "dangky":
                if (isset($_POST['dangky'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $chucvu = $_POST['chucvu'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $diachi = $_POST['diachi'];
                    insert_taikhoan($username, $password, $fullname, $chucvu, $email, $phone, $diachi);
                    $thongbao = " Đăng ký thành công";
                }
                include "./view/taikhoan/dangky.php";
                break;
            case "dangnhap":
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'] != "")) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $checkuser = checkuser($username, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['username'] = $checkuser;
                        if ($_SESSION['username']['lock'] == 1) {
                            if (isset($_SESSION["username"])) {
                                unset($_SESSION["username"]);
                            }
                            echo '<script>alert("Tài Khoản của bạn đã bị khóa")</script>';
                            echo "  <script>window.location.href ='?act=dangnhap'</script> ";
                        } else {

                            echo "  <script>window.location.href ='index.php'</script> ";
                        }
                    } else {
                        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
                        echo "  <script>window.location.href ='?act=dangnhap'</script> ";
                    }
                }
                include "./view/taikhoan/dangnhap.php";
                break;
            case "taikhoan":
                include "./view/taikhoan/account.php";
                break;
            case "dangxuat":
                dangxuat();
                include "./view/include/home.php";
                break;
            case "quenmk":
                if (isset($_POST['quenmk'])) {
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "./view/taikhoan/quenmk.php";
                break;
            //     // case "updatetk":


            case "checkout":

                include "./view/checkout.php";
                break;
            case 'binhluan':
                if (isset($_POST['gui']) && ($_POST['gui'] != "")) {
                    $name = $_POST['binhluan'];
                    $id_tk = $_POST['id_tk'];
                    $id_sp = $_POST['id'];
                    $id_dm = $_POST['id_dm'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayGioHienTai = date('Y-m-d H:i:s');
                    add_bl($name, $id_tk, $id_sp, $ngayGioHienTai);
                    echo "  <script>window.location.href ='?act=chitietsp&id_sp=$id_sp&id_dm=$id_dm'</script> ";
                }

                break;


            case 'muathanhcong':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $full_name = $_POST['full_name'];
                    $dia_chi = $_POST['dia_chi'];
                    $phone = $_POST['phone'];
                    if (empty($_POST['payUrl'])) {
                        $payErr = "Payment method is required";
                    } else {
                        $thanh_toan = $_POST['payUrl'];
                    }
                    $thanh_tien = $_SESSION['resultTotal'];
                    if (isset($thanh_toan)) {
                        if ($thanh_toan == "Thanh toán online") {
                            $id_ctd = insert_ctdon($_SESSION['username']['id_tk'], $full_name, $phone, $dia_chi, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                insert_don($id_ctd, $item['id_sp'], $item['soluong'], 'màu trắng', '40');
                            }
                            unset($_SESSION['cart']);
                            include "view/thanhtoan.php";
                        } else {
                            $id_ctd = insert_ctdon($_SESSION['username']['id_tk'], $full_name, $phone, $dia_chi, $thanh_tien, $thanh_toan);
                            foreach ($_SESSION['cart'] as $item) {
                                insert_don($id_ctd, $item['id_sp'], $item['soluong'], 'màu trắng', '40');
                            }
                            unset($_SESSION['cart']);
                        }
                    }
                }
                include "./view/after_buy.php";
                break;

            case 'chitietdon':

                $id_ctdon = $_GET['id_ctd'];
                $trang_thai = $_GET['trang_thai'];
                $ds = load_don_chitiet($id_ctdon);


                include "./view/chitietdon.php";
                break;
        }
    } else {
        include "./view/include/home.php";
    }
}

include "./view/include/footer.php";
ob_end_flush();
