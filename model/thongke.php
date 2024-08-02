<?php 
function thong_ke_sp_dm(){
    $sql = "SELECT danhmuc.id_dm, name_dm, COUNT(sanpham.id_sp) 'tong_sp' FROM `danhmuc` LEFT JOIN sanpham ON danhmuc.id_dm = sanpham.id_dm
    GROUP BY danhmuc.id_dm, name_dm";
    return pdo_query($sql);
}
function load_thongke_sanpham_danhmuc()
{
    $sql = "SELECT dm.id_dm, dm.name_dm, COUNT(*) 'soluong', MIN(gia) 'gia_min', MAX(gia) 'gia_max', AVG(gia) 'gia_avg' 
    FROM danhmuc dm JOIN sanpham sp ON dm.id_dm=sp.id_dm 
    GROUP BY dm.id_dm, dm.name_dm
     ORDER BY soluong ASC";
    return pdo_query($sql);
}

function xoabl($id)
{
  $sql = " DELETE FROM binh_luan  WHERE id_bl = $id";
  
  pdo_query($sql);

}


function loadall_thongke()
{
    $sql = "SELECT danhmuc.id_dm as id, danhmuc.name_dm as tenloai, count(sanpham.id_sp) as countsp,min(sanpham.gia) as minprice, max(sanpham.gia) as maxprice, avg(sanpham.gia) as avgprice";
    $sql .= " FROM sanpham left join danhmuc on danhmuc.id_dm=sanpham.id_dm";
    $sql .= " GROUP BY danhmuc.id_dm order by danhmuc.id_dm desc";
    $listtk = pdo_query($sql);
    return $listtk;
}

function thongke_ngay()
{
    $sql = "SELECT don_hang.id_ctd , SUM(thanh_tien) as Tong , SUM(don_hang.so_luong)
     AS so_luong , thoi_gian , trang_thai FROM `chitiet_donhang`  JOIN don_hang  
     ON chitiet_donhang.id_ctdon = don_hang.id_ctd  WHERE trang_thai = 3 GROUP BY don_hang.id_ctd;";
    $thongke = pdo_query($sql);
    return $thongke;
}

?>