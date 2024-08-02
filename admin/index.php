<?php
session_start();
ob_start();

if (isset($_SESSION['username']) && $_SESSION['username']['chucvu'] == '1') {
  include("../model/pdo.php");
  include("../model/danhmuc.php");
  include("../model/sanpham.php");
  include("include/header.php");
  include("../model/thongke.php");
  include("../model/global.php");
  include("../model/binhluan.php");
  include("../model/taikhoan.php");
  include("../model/donhang.php");
  $danhmuc = LoadAll_DM();
  $sanpham = loadall_sp();
  $size = loadall_size();
  $color = loadall_color();
  $bl = loadall_bl();
  // var_dump($_SESSION['username']);
  // die;
  $isthongbao = '';
  $thongbao = '';
  if (isset($_GET['act']) && $_GET['act'] != "") {

    $act = $_GET['act'];
    switch ($act) {
        // bảng danh mục 
      case 'danhmuc':
        include("danhmuc/list.php");
        break;
      case 'sldanhmuc':
        $tong = thongke();
        include("danhmuc/count.php");
        break;
      case 'xoadm':
        xoadm($_GET['iddm']);
        echo "  <script>alert('Đã Xóa Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=danhmuc'</script> ";
        break;
      case 'add':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $name = $_POST['name'];
          if ($name == null) {
            $isthongbao = 0;
            $thongbao = 'Không thành công';
          } else {
            $isthongbao = 1;
            add_dm($name);
            $thongbao = ' Thêm thành công';
          }
        }
        include("danhmuc/add.php");
        break;

      case 'editdm':
        $danhmuc = load_one_dm($_GET['iddm']);
        include("danhmuc/edit.php");
        break;

      case 'updm':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $name = $_POST['name'];
          $id = $_POST['id'];
          upload_dm($id, $name);
          echo "  <script>alert('Đã Cập Nhật Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=danhmuc'</script> ";
        }
        break;
        // bảng sản phẩm 
      case 'listsp':

        include("sanpham/list.php");
        break;
      case 'addsp':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $name = $_POST['name'];
          $giam_gia = $_POST['giam_gia'];
          $mota = $_POST['mo_ta'];
          $date = $_POST['date'];
          $gioitinh = $_POST['gioi_tinh'];
          $dm = $_POST['dm'];
          $gia = $_POST['gia'];
          $img = $_FILES['image_sp']['name'];
          //echo $hinh;
          $target_dir = "../uploads/";
          $target_file = $target_dir . basename($_FILES['image_sp']['name']);
          //echo $target_file;


          // echo "<pre>" ; 
          // var_dump($img_mt) ; 
          // die ();
          move_uploaded_file($_FILES['image_sp']['tmp_name'], "../public/uploads/" . $target_file);
          $idspnew =   add_sanpham($name, $img, $giam_gia,  $mota, $date, $gioitinh, $dm, $gia);

          if (isset($_FILES['img_mota'])) {
            $file_mt = $_FILES['img_mota'];
            $img_mt = $file_mt['name'];
            foreach ($img_mt as $key => $value) {
              add_img($value, $idspnew);
              move_uploaded_file($file_mt['tmp_name'][$key], "../public/uploads/" . $value);
            }
          }
          //echo $idspnew;
          echo "  <script>alert('Thêm Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=editsp&idsp=$idspnew'</script> ";
        }

        include("sanpham/add.php");
        break;
      case 'editsp':

        $sp = load_one_sp($_GET['idsp']);
        $size = LoadAll_size();
        $color = LoadAll_color();
        $id  =    $_GET['idsp'];
        $bienthe  =    load_sanphambt_all($id);
        $img = load_img_sp($id);
        $sanpham = load_one_sp($id);


        include("sanpham/edit.php");
        break;

      case 'upsp':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $name = $_POST['name'];
          $giam_gia = $_POST['giam_gia'];
          $mota = $_POST['mo_ta'];

          $date = $_POST['date'];
          $gioitinh = $_POST['gt'];
          $dm = $_POST['dm'];
          $gia = $_POST['gia'];
          $file = $_FILES['image_sp'];

          $id = $_POST['id'];
          $img = $_POST['img'];
          if ($file['size'] > 0) {
            $img = $file['name'];
            move_uploaded_file($file['tmp_name'], "../public/uploads/" . $img);
          }
          if (isset($_FILES['img_mota'])) {
            $file_mt = $_FILES['img_mota'];
            $img_mt = $file_mt['name'];
            if (!empty($img_mt[0])) {
              xoaimgsp($id);
              foreach ($img_mt as $key => $value) {
                add_img($value, $id);
                move_uploaded_file($file_mt['tmp_name'][$key], "../public/uploads/" . $value);
              }
            }
          }
          upload_sp($id, $name, $img, $giam_gia, $gia, $mota, $date, $gioitinh);
          echo "  <script>alert(' Thêm Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=listsp'</script> ";
        }
        if (isset($_POST['bienthe']) && $_POST['bienthe'] != "") {
          $id = $_POST["id_sp"];
          $size = $_POST["kich_co"];
          $color = $_POST["mau_sac"];
          $soluong = $_POST["soluong"];
          add_spbienthe($id, $size, $color, $soluong);
          //echo $id , $size ; 
          echo "  <script>alert('Thêm Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=editsp&idsp=$id'</script> ";
        }
        break;
      case 'suabt':
        $id = $_GET["idbt"];
        $size = loadall_size();
        $color = loadall_color();
        $btsp =    load_one_bt($id);
        if (isset($_POST['bienthe']) && $_POST['bienthe'] != "") {
          $id_bt = $_POST["id_sp"];
          $id = $_POST["id"];
          $size = $_POST["kich_co"];
          $color = $_POST["mau_sac"];
          $soluong = $_POST["soluong"];
          // add_spbienthe($id, $size, $color, $soluong);
          //echo $id , $size ; 
          sua_spbienthe($id_bt, $size, $color, $soluong);
          echo "  <script>alert('Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=editsp&idsp=$id'</script> ";
        }
        include("sanpham/suabt.php");
        break;
      case 'xoabt':
        $id = $_GET['idsp'];
        $idbt = $_GET['idbt'];
        xoa_spbienthe($idbt);
        echo "  <script>alert('Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=editsp&idsp=$id'</script> ";
        break;
      case 'xoasp':
        xoasp($_GET['iddm']);
        echo "  <script>alert('Đã Xóa Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=listsp'</script> ";
        break;
      default:
        echo "  <script>window.location.href ='index.php'</script> ";
        break;
        // thống kê sản phẩm 
        // case "thongke":
        //   $dsthongke = load_thongke_sanpham_danhmuc();
        //   include "thongke/list.php";
        //   break;

        // case "bieudo":
        //   $dsthongke = load_thongke_sanpham_danhmuc();
        //   include "thongke/bieudo.php";
        //   break;

        // case 'slsanpham':
        //   $tong = thongkesp();
        //   include("sanpham/count.php");
        //   break;
      case 'bieudo1':
        $listthongke = loadall_thongke();
        $thongke =  thongke_ngay();
        include "thongke/list.php";
        break;


        // listsize
      case 'listsize':

        include("size/size.php");
        break;
      case 'logout':
        dangxuat();
        header("location: ../index.php");
        break;
      case 'slsize':
        $tong = thongkesize();
        include("size/count.php");
        break;
      case 'addsize':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {

          $name = $_POST['name'];

          add_size($name);


          $isthongbao = 1;

          $thongbao = ' Thêm thành công';
        }
        include 'size/addsize.php';
        break;
      case "editsize":
        $id = $_GET['id_size'];
        $size =     Loadone_size($id);
        include("size/edit.php");
        break;
      case "uploadsize":
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $idsize = $_POST['id_size'];
          $name = $_POST['name_size'];
          edit_size($idsize, $name);
          echo "  <script>alert('Cập Nhật Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=listsize'</script> ";
        }
        break;
        //listcolor
      case 'listcolor':

        include("color/color.php");
        break;
      case 'addcolor':
        if (isset($_POST['gui']) && $_POST['gui'] != "") {

          $name = $_POST['name'];
          $color = $_POST['color'];
          add_color($name, $color);


          $isthongbao = 1;

          $thongbao = ' Thêm thành công';
        }
        include 'color/addcolor.php';
        break;
      case "editcolor":
        $id = $_GET['id_color'];
        $color =  Loadone_color($id);
        include("color/edit.php");
        break;
      case "uploadcolor":
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $id = $_POST['id_color'];
          $name = $_POST['name_color'];
          $color = $_POST['color'];
          edit_color($id, $name, $color);
          echo "  <script>alert('Cập Nhật Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=listcolor'</script> ";
        }
        break;
      case 'xoacolor':
        xoacl($_GET['id_color']);
        echo "  <script>alert('Đã Xóa Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=listcolor'</script> ";
        break;

        //listbinhluan

      case 'binhluan':
        $bl =   thongke_bl();
        include("binhluan/tongbl.php");
        break;
      case 'blsp':
        $id = $_GET['iddm'];
        $bl =   bl_theo_dm($id);
        include("binhluan/list.php");
        break;
      case 'xoabl':
        xoabl($_GET['id_bl']);
        echo "  <script>alert('Đã Xóa Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=binhluan'</script> ";
        break;
        // tài khoản
      case 'taikhoan':
        $tk = LoadAll_TK();
        include("taikhoan/list.php");
        break;
      case 'ct_tk':
        $id = $_GET['idtk'];
        $tk = Load_one_TK($id);
        include("taikhoan/taikhoan_chitiet.php");
        break;
      case "uptk":
        if (isset($_POST['gui']) && $_POST['gui'] != "") {
          $name = $_POST['chucvu'];
          $id = $_POST['id'];
          upload_tk($id, $name);
          //  echo $id ; 
          echo "  <script>alert('Đã Cập Nhật Thành Công') </script> ";
          echo "  <script>window.location.href ='index.php?act=taikhoan'</script> ";
        }
        break;
      case 'xoatk':
        $id = $_GET['idtk'];
        xoa_TK($id);
        echo "  <script>alert('Xóa Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=taikhoan'</script> ";
        break;
      case 'mo_tk':
        $id = $_GET['idtk'];
        mo_TK($id, 0);
        echo "  <script>window.location.href ='index.php?act=taikhoan'</script> ";
        break;
      case 'lock_tk':
        $id = $_GET['idtk'];
        mo_TK($id, 1);
        echo "  <script>window.location.href ='index.php?act=taikhoan'</script> ";
        break;
        //đơn hàng
      case "donhang":
        $don =  load_don();
        include("donhang/list.php");
        break;
      case "donct":
        $mau1 = LoadAll_color();
        $size1 = LoadAll_size();
        $id = $_GET['idd'];
        $don =   load_don_chitiet($id);
        include("donhang/chitietdon.php");
        break;

      case "xoadon":
        $id = $_GET['idd'];
        xoa_don($id);
        echo "  <script>alert('Cập Nhật Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=donhang'</script> ";
        break;
      case "updon":
        if (isset($_POST['xac']) && $_POST['xac'] != "") {
          $id = $_POST['id'];

          up_don($id, 1);
        }
        if (isset($_POST['huy']) && $_POST['huy'] != "") {
          $id = $_POST['id'];

          up_don($id, 4);
        }
        if (isset($_POST['giao']) && $_POST['giao'] != "") {
          $id = $_POST['id'];

          up_don($id, 2);
        }
        if (isset($_POST['thanhcong']) && $_POST['thanhcong'] != "") {
          $id = $_POST['id'];

          up_don($id, 3);
        }
        if (isset($_POST['quay']) && $_POST['quay'] != "") {
          echo "  <script>window.location.href ='index.php?act=donhang'</script> ";
        }
        echo "  <script>alert('Cập Nhật Thành Công') </script> ";
        echo "  <script>window.location.href ='index.php?act=donhang'</script> ";
        break;
    }
  } else {
    include("dashboard.php");
  }
  include("include/footer.php");
} else {
  header("location: ../index.php");
}
