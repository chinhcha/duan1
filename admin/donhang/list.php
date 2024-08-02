<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Đơn Hàng</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mã Đơn Hàng</th>
              <th>Full name</th>
              <th>Điện Thoại</th>
              <th>Địa Chỉ</th>
              <th>Tổng Tiền</th>
              <th>Ngày Mua Hàng</th>
              <th>Phương Thức</th>
              <th>Trạng Thái</th>
              <th>Chức Năng</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($don as $key => $value) : ?>
              <tr>

                <td><?= $value['id_ctdon'] ?></td>
                <td><?= $value['full_name'] ?></td>
                <td>0<?= $value['phone'] ?></td>
                <td><?= $value['dia_chi'] ?></td>
                <td><?= $value['thanh_tien'] ?> Đ</td>
                <td><?php
                    $dateTime = new DateTime($value['thoi_gian']);
                    // Chuyển đổi sang định dạng khác (ví dụ: dd/mm/yyyy)
                    $newFormat = $dateTime->format('h:i A - d-m-Y ');
                    echo $newFormat;
                    ?></td>
                <td>
                  <?php
                  if ($value['thanh_toan'] == 0) {
                    echo "<p class='btn btn-primary'>Thanh Toán Online</p>";
                  } else {
                    echo " <p class='btn btn-success'>Thanh Toán Khi Nhận Hàng</p>";
                  }
                  ?>
                </td>
                <td><?php
                    if ($value['trang_thai'] == 0) {
                      echo "<p class='btn btn-warning'>đang chờ xác nhận</p>";
                    } elseif ($value['trang_thai'] == 1) {
                      echo "<p class='btn btn-info'>Đã xác xác nhận</p>";
                    } elseif ($value['trang_thai'] == 2) {
                      echo "<p class='btn btn-primary'>Đang giao hàng </p>";
                    } elseif ($value['trang_thai'] == 3) {
                      echo " <p class='btn btn-success'>Đã Đã Nhận Hàng</p>";
                    } else {
                      echo "<p class='btn btn-danger'>Đã Hủy</p>";
                    }



                    ?></td>
                <td>
                  <a href="?act=donct&idd=<?= $value['id_ctdon'] . '&trang=' . $value['trang_thai'] ?>" class=" btn btn-success">Chi Tiết</a>
                  <?php
                  if (($value['trang_thai'] == 3) || ($value['trang_thai'] == 4)) {
                    echo '<a href="?act=xoadon&idd=' . $value["id_ctdon"] . '" class="btn btn-info"> Xóa Đơn</a>';
                  }

                  ?>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>


        </table>

      </div>
    </div>
  </div>

</div>