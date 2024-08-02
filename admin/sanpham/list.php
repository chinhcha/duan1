<div class="container-fluid">

  <!-- Page Heading -->
  

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Sản Phẩm </h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-primary" href="?act=addsp">Thêm Sản Phẩm <i class="bi bi-plus-circle"></i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
               <th></th>
              <th>STT</th>
              <th>Name</th>
              <th>Image_sp</th>
              <th>Giảm giá</th>
              <th>Giá</th>
              <th>Mô tả</th>
              <th>Ngày nhập</th>
              <th>View</th>
              <th>Giới tính</th>
              <th>Options</th>
            </tr>
          </thead>

          <tbody>
            <form action="?act=listsp" method="POST" enctype="multipart/form-data" >
     <?php 
                  foreach ($sanpham as $value) {
                    extract($value);
               
                    // $hinh = $_FILES['image_sp']['name'];
                    // //echo $hinh;
                    // $target_dir = "../uploads/";
                    // $target_file = $target_dir . basename($_FILES['image_sp']['name']);
                    

                    $hinhpath = "../public/uploads/" .$image_sp;
                    // var_dump($hinhpath);
                    $suasp = "index.php?act=editsp&idsp=" . $id_sp;
                    $hard_delete = "index.php?act=xoasp&iddm=" . $id_dm;
                  
                    if (is_file($hinhpath)) {
                        $hinhpath = "<img src= '" . $hinhpath . "' width='120px' height='100px'>";
                    } else {
                        $hinhpath = "No file img!";
                    }
                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id_sp . '</td>
                        <td>' . $name_sp . '</td>
                        <td>'.$hinhpath.'</td> 
                        
                        <td>' . $giam_gia. '</td>
                        <td>' . $gia . '</td>
                        <td>' . $mo_ta . '</td>
                        <td>' . $ngay_nhap . '</td>
                        <td>' . $view . '</td>
                        <td>' . $gioi_tinh . '</td>
                        <td>
                            <a href="' . $suasp . '"><input type="button" value="Sửa"> </a>  
                            <a href="' . $hard_delete .'"><input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                            
                        </td>
                      
                </tr>';
                  // if(move_uploaded_file($_FILES['image_sp']['tmp_name'],$target_file)){
                  //   echo "Hình đã up";
                  // }else{
                  //   echo "không upload được";
                  // }
                }
     ?>

          </tbody>
          

        </table>
        <a href="" type="reset" class="btn btn-secondary">Bỏ Chọn Tất Cả </a>
        <a href="" type="button" class="btn btn-success">Chọn Tất Cả</a>
        <a type="button" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa không ?')">Xóa Các Mục Đã Chọn</a>
        <a href="" onclick="return confirm('Bạn có muốn xóa không ?')" type="button" class="btn btn-danger">Xóa Tất Cả</a>
        <a href="" type="button" class="btn btn-info">Số Lượng Sản Phẩm</a>
        </form>
      </div>
    </div>
  </div>

</div>

         