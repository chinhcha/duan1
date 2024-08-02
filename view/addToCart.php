<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Lấy dữ liệu ajax đẩy lên
    $id_sp = $_POST['id'];
    $name_sp = $_POST['name'];
    $gia = $_POST['gia'];

    //Kiểm tra sp có trong giỏ hàng chưa
    $index = array_search($id_sp, array_column($_SESSION['cart'], 'id_sp'));
    //array_column() trích xuẩ 1 cột từ mảng giỏ hàng và trả về 1 mantrrg chuwasgtri của cột id
   
  
    if($index !== false){
        $_SESSION['cart'][$index]['soluong'] += 1;
    }else{

        // Nếu sp chưa tồn tịa thì thêm mới vào giỏ hàng
        $product = [
            'id_sp' => $id_sp,
            'name_sp' => $name_sp,
            'gia' => $gia,
            'soluong' => 1
        ];
        $_SESSION['cart'][]=$product;
        
    }

    //Trả về số lượng sản phẩm của giỏ hàng
    echo count($_SESSION['cart']);
}else{
    echo "Yêu cầu không hợp lệ";

}

?>