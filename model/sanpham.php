<?php
function add_sanpham($name, $giam_gia, $mota, $date, $gioitinh, $dm, $gia, $img)
{
    $sql = " INSERT INTO `sanpham` (`id_sp`, `name_sp`, `image_sp`, `giam_gia`, `gia`, `mo_ta`, `ngay_nhap`, `view`, `gioi_tinh`, `id_dm`) 
    VALUES (NULL, '$name', '$img', '$giam_gia', '$gia', '$mota', '$date', '0', '$gioitinh', '$dm') ";
   $lastInsertedId = pdo_execute_return_lastInsertId($sql);

   return $lastInsertedId;
}
function add_img($name,$id)
{
    $sql = " INSERT INTO `img_sp`(`id_sp`, `img_url`) VALUES ('$id','$name') ";
   pdo_execute($sql);
}

function loadall_sp() // có 2 kiểu hàm load sản phẩm :1 là làm 1 hàm nhưng đc sử dụng cho search cho toàn bộ sản phẩm cho danh mục, 2 là làm từng hàm riêng 1
{
  $sql = "SELECT * FROM sanpham ";
  $sp = pdo_query($sql);
  return $sp;
}

// 1: 1 hàm dùng nhiều chức năng
function loadAll_sp_test($id_dm = 0, $kyw = '')
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($kyw != ''){
        $sql .= " and name_sp like '%".$kyw."%'";
    }
    if($id_dm != 0){
        $sql .= ' and id_dm = '.$id_dm.'';
    }
    $sql .= " ORDER BY id_sp desc";
    return pdo_query($sql);
}
// 2: làm từng hàm riêng 1
function loadall_sp_dm($id) {
  $sql = "SELECT * FROM sanpham WHERE id_dm=$id";
  $sp = pdo_query($sql);
  return $sp;
} 

function load_one_sp($id)
{
  $sql = "SELECT * FROM sanpham where id_sp = $id";
  $sp = pdo_query_one($sql);
  return $sp;
}

function loadone_sanphamCart($idList){
  $sql = 'SELECT * FROM sanpham WHERE id_sp IN (' . $idList . ')';
  $sanpham = pdo_query($sql);
  return $sanpham;
}
function upload_sp($id,$name,$image_sp,$giam_gia,$gia,$mota,$date,$gioitinh)
{
 $sql = "UPDATE `sanpham` SET `name_sp`='$name',`image_sp`='$image_sp',`giam_gia`='$giam_gia',`gia`='$gia',`mo_ta`
 ='$mota',`ngay_nhap`='$date',`gioi_tinh`='$gioitinh' WHERE `id_sp` = '$id'";

  pdo_query($sql);
}

function load_img_sp($id){
  $sql = "SELECT * FROM `img_sp` WHERE id_sp=$id";
  return pdo_query($sql);
}
// sp mới
function load_spnew(){
  $sql ="SELECT * FROM sanpham where 1 order by id_sp desc limit 0,9";
  $listsanpham = pdo_query($sql);
  return $listsanpham;
}

// top 10 sp yêu thích

function loadall_sp_top10(){
  $sql ="SELECT * FROM sanpham where 1 order by view desc limit 0,10";
  $listsanpham = pdo_query($sql);
  return $listsanpham;
}
////////



function xoasp($id)
{
  $sql = " DELETE FROM sanpham  WHERE id_dm = $id";
  pdo_query($sql);
}
function thongkesp()
{
  $sql = "SELECT sanpham.id_sp, name_sp, COUNT(danhmuc.id_dm) AS Tong
  FROM sanpham
  LEFT JOIN danhmuc ON danhmuc.id_dm =  sanpham.id_dm
  GROUP BY sanpham.id_sp, name_sp;";
  $sp = pdo_query($sql);
  return $sp;
}
// size
function loadall_size(){
  $sql = "SELECT * FROM size ";
  $size = pdo_query($sql);
  return $size;
}
function add_size($name)
{
   $sql = "INSERT INTO `size`( `name_size`) VALUES ('$name')";

   pdo_execute($sql);
}
function thongkesize()
{
  $sql = "SELECT size.id_size, name_size, COUNT(color.id_color) AS Tong
  FROM size
  LEFT JOIN color ON color.id_color =  size.id_size
  GROUP BY size.id_size, name_size;";
  $sp = pdo_query($sql);
  return $sp;
}
function Loadone_size($id)
{
  $sql = "SELECT * FROM size WHERE id_size = $id";
  $dm = pdo_query_one($sql);
  return $dm;
}
function edit_size($idsize, $name)
{
  $sql = "UPDATE size SET name_size='$name' WHERE id_size='$idsize' ";
 pdo_execute($sql);
 
}
//color
function loadall_color(){
  $sql = "SELECT * FROM color ";
  $size = pdo_query($sql);
  return $size;
}
function add_color($name, $color)
{
   $sql = "INSERT INTO `color`( `name_color`, `color`) VALUES ('$name','$color')";

   pdo_execute($sql);
}
function Loadone_color($id)
{
  $sql = "SELECT * FROM color WHERE id_color = $id";
  $dm = pdo_query_one($sql);
  return $dm;
}
function edit_color($id,$name,$color)
{
  
  $sql ="UPDATE `color` SET `name_color`='$name',`color`='$color' WHERE id_color ='$id'";
 pdo_execute($sql);
     
}
function xoacl($id_color)
{
  $sql = " DELETE FROM color  WHERE id_color = $id_color";
  pdo_query($sql);
}
//binhluan
// function loadall_bl(){
//   $sql = "SELECT * FROM binh_luan ";
//   $bl = pdo_query($sql);
//   return $bl;
// }
// function add_bl($comment,$id_sp,$id_tk,$date)
// {
//    $sql = "INSERT INTO `binh_luan`( `id_bl`,`comment`, `id_sp`, `id_tk`, `ngaybinhluan`) VALUES (NULL,'$comment','$id_sp','$id_tk','$date')";

//    pdo_execute($sql);
// }
//taikhoan 
function load_taikhoan(){
  $sql = " SELECT * FROM taikhoan";
  $tk = pdo_query($sql);
  return $tk;}
 
  function load_sanphambt_all($id)
  {
    $sql = "SELECT * FROM `sanpham_bienthe` JOIN color ON sanpham_bienthe.id_color = color.id_color JOIN size ON size.id_size = sanpham_bienthe.id_size 
    WHERE id_sp = $id GROUP BY id_spbt ASC;";
    $sp =   pdo_query($sql);
    return $sp;
  }


  function xoaimgsp($id)
  {
    $sql = " DELETE FROM img_sp  WHERE id_sp = $id";
    pdo_query($sql);
  }













