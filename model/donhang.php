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
function up_don($id,$trang){
    $sql = "UPDATE chitiet_donhang SET trang_thai = $trang WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}
function  xoa_don($id){
    $sql = "DELETE FROM `chitiet_donhang` WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}
?>