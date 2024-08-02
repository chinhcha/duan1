<?php 

function load_don(){
    $sql = "SELECT * FROM `chitiet_donhang` " ; 
    $don = pdo_query($sql) ;
    return $don ; 
}
function load_don_chitiet($id){
    $sql = "SELECT * FROM `don_hang` JOIN sanpham on sanpham.id_sp = don_hang.id_sp WHERE `id_ctd` = '$id' " ; 

    $don = pdo_query($sql) ;
    return $don ; 
}
function load_ctdon_idtk($id){
    $sql = "SELECT * FROM `chitiet_donhang` WHERE id_tk=$id order by id_ctdon desc";  
    $don = pdo_query($sql) ;
    return $don ; 
}
function up_don($id,$trang){
    $sql = "UPDATE chitiet_donhang SET trang_thai = $trang WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}
function  xoa_don($id){
    $sql = "DELETE FROM `chitiet_donhang` WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}

function insert_ctdon($id_tk,$full_name, $phone, $dia_chi, $thanh_tien, $thanh_toan){
    $thoi_gian = date('H:m:s d-m-Y');
    $sql = "INSERT INTO `chitiet_donhang`( id_tk,full_name, phone, dia_chi, thoi_gian, thanh_tien, thanh_toan)
     VALUES ('$id_tk','$full_name', '$phone', '$dia_chi', '$thoi_gian', '$thanh_tien', '$thanh_toan')";
     return pdo_execute_return_lastInsertId($sql);
}

function insert_don($id_ctd, $id_sp, $so_luong, $mau_sac, $kich_co){
    $sql = "INSERT INTO `don_hang`( id_ctd, id_sp, so_luong,mau_sac, kich_co) 
    VALUES ('$id_ctd', '$id_sp', '$so_luong', '$mau_sac', '$kich_co')";
    pdo_execute($sql);
}

