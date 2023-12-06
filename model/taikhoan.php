<?php

function insert_taikhoan($username,$password,$fullname,$chucvu,$email,$phone,$diachi){
    $sql = "INSERT INTO `taikhoan`(`name_tk`, `pass`, `full_name`, `chucvu`, `email`, `phone`, `dia_chi`) VALUES ('$username','$password','$fullname','$chucvu','$email','$phone','$diachi')";
    pdo_execute($sql);
    
}

function dangnhap($username,$password){
    $sql ="SELECT * FROM taikhoan WHERE name_tk='$username' and pass='$password'";
    $taikhoan = pdo_query_one($sql);

    if($taikhoan != false){
        $_SESSION['username'] = $username;
    }else{
        return "Sai thông tin";
    }
}

function dangxuat(){
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
    }
}

function LoadAll_TK()
{
  $sql = "SELECT * FROM taikhoan ";
  $tk = pdo_query($sql);
  return $tk;
}
function Load_one_TK($id)
{
  $sql = "SELECT * FROM taikhoan WHERE id_tk = $id";
  $tk = pdo_query_one($sql);
  return $tk;
}
function xoa_TK($id)
{
  $sql = "DELETE FROM taikhoan  WHERE id_tk = $id";
  $tk = pdo_query_one($sql);
  return $tk;
}
function checkuser($username, $password)
{
  $sql = "SELECT *FROM taikhoan where name_tk ='" . $username . "' AND pass ='" . $password . "'";
  $sp = pdo_query_one($sql);
  return $sp;
}
function upload_tk($id, $name)
{
  $sql = "UPDATE `taikhoan` SET chucvu ='$name' WHERE id_tk = $id";
  pdo_execute($sql);
}
function mo_TK($id, $name)
{
  $sql = "UPDATE `taikhoan` SET `lock`='$name' WHERE id_tk = $id;";
  pdo_execute($sql);
}
