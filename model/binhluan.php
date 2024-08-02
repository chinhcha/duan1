
<?php
function LoadAll_BL()
{
  $sql = "SELECT * FROM binh_luan ";
  $bl = pdo_query($sql);
  return $bl;
}

function LoadAll_BL_user($id)
{
  $sql = "SELECT taikhoan.full_name , binh_luan.ngaybinhluan , comment , id_bl , image_tk FROM binh_luan JOIN taikhoan 
  ON binh_luan.id_tk = taikhoan.id_tk where id_sp = $id  GROUP BY id_bl DESC";
  $bl = pdo_query($sql);
  return $bl;
}
function add_bl( $name ,$id_tk ,$id_sp ,$ngayGioHienTai) {
  $sql = "INSERT INTO `binh_luan`(`comment`, `id_sp`, `id_tk`, `ngaybinhluan`) VALUES ('$name','$id_sp','$id_tk','$ngayGioHienTai')";
  pdo_execute($sql);
}
function thongke_bl()
{
  $sql = "SELECT danhmuc.id_dm, name_dm, COUNT(binh_luan.id_bl) AS Tong
  FROM danhmuc
  LEFT JOIN sanpham ON sanpham.id_dm = danhmuc.id_dm LEFT JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp 
  GROUP BY danhmuc.id_dm, name_dm;";
  $dm = pdo_query($sql);

  return $dm;
}
function bl_theo_dm($id)
{
  $sql = "SELECT *
  FROM danhmuc
JOIN sanpham ON sanpham.id_dm = danhmuc.id_dm JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp JOIN taikhoan 
ON binh_luan.id_tk = taikhoan.id_tk
  WHERE danhmuc.id_dm = $id;";
  $dm = pdo_query($sql);

  return $dm;
}
