<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu ajax đẩy lên
    $id_sp = $_POST['id'];

    // Kiểm tra trong giỏ hàng có tồn tại sp ko
    if (!empty($_SESSION['cart'])) {
        $index = array_search($id_sp, array_column($_SESSION['cart'], 'id_sp'));

        // nếu có sp thì cập nhật lại slg
        if ($index !== false) {
            //xóa sp 
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        } else {
            echo "<h1>NO PRODUCTS HAVE BEEN ADDED TO THE CART</h1>";
        }
    }
} else {
    echo "Yêu cầu không hợp lệ";
}
