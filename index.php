 <?php
 session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/thongke.php";
include "./model/danhmuc.php";
include "model/taikhoan.php";
include "./model/binhluan.php";
include "./public/user/view/header.php";
$sanpham = loadall_sp();
$danhmuc = LoadAll_DM();
$spnew = load_spnew();
$ds_dm = thong_ke_sp_dm();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "chitietsp":
            if (isset($_GET['id_sp'])) {
                $sp = load_one_sp($_GET['id_sp']);
                $hinh_sp = load_img_sp($_GET['id_sp']);
                $loadbinhluan= LoadAll_BL_user($_GET['id_sp']);
            }
            include "./public/user/view/chitietsp.php";
            break;
        // case "danhmuc":
        //     if (isset($_GET['id_dm'])){
        //         $sp_dm = loadall_sp($_GET['id_dm']);
            // }
        case "trangsp":
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $kyw = $_POST['kyw'];
            }else{
                $kyw= '';
            }
            if(isset($_GET['id_dm'])){
                $id_dm = $_GET['id_dm'];
            }else{
                $id_dm = 0;
            }
            $sanpham = loadAll_sp_test($id_dm, $kyw);
            include "./public/user/view/shop.php";
            break;
        case "cart":
            include "./public/user/view/cart.php";
            break;
        case "about-us":
            include "./public/user/view/about.php";
            break;
        case "contact":
            include "./public/user/view/contact.php";
            break;
        case "dangky":
            if(isset($_POST['dangky'])){
                $username= $_POST['username'];
                $password= $_POST['password'];
                $fullname= $_POST['fullname'];
                $chucvu= $_POST['chucvu'];
                $email= $_POST['email'];
                $phone= $_POST['phone'];
                $diachi= $_POST['diachi'];
                insert_taikhoan($username,$password,$fullname,$chucvu,$email,$phone,$diachi);
                $thongbao =" Đăng ký thành công";
            }
            include "./public/user/view/taikhoan/dangky.php";
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
            include "./public/user/view/taikhoan/dangnhap.php";
            break;
        case "taikhoan":
            include "./public/user/view/taikhoan/account.php";
            break;
        case "dangxuat":
            dangxuat();
            include "./public/user/view/include/home.php";
            break;
        case "checkout":
            include "./public/user/view/checkout.php";
            break;
        case 'binhluan':
                if (isset($_POST['gui']) && ($_POST['gui'] != "")) {
                    $name = $_POST['binhluan'];
                    $id_tk = $_POST['id_tk'];
                    $id_sp = $_POST['id'];
                    $id_dm = $_POST['id_dm'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayGioHienTai = date('Y-m-d H:i:s');
                    add_bl( $name ,$id_tk ,$id_sp ,$ngayGioHienTai);
                    echo "  <script>window.location.href ='?act=chitietsp&id_sp=$id_sp&id_dm=$id_dm'</script> ";
                }

                break;
    }
} else {
    include "./public/user/view/home.php";
}

include "./public/user/view/footer.php"; 
