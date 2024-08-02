<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Chỉ Tiết Đơn Hàng</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Name</th>
              <th>Ảnh sản phẩm</th>
              <th>Giá tiền</th>
              <th>Số Lượng</th>
              <th>Màu Sắc</th>
              <th>Kích Cỡ</th>
              <th>Giới Tính</th>
              <th>Tổng</th>


            </tr>
          </thead>

          <tbody>

            <?php foreach ($don as $key => $value) : ?>
              <tr>
                <?php $trang_thai = $_GET['trang'] ?>
                <td><?= $key + 1 ?></td>
                <td><?= $value['name_sp'] ?></td>
                <td><img src="../public/uploads/<?= $value['image_sp'] ?>" alt="" width="100"></td>
                <td><?= $value['gia'] ?></td>
                <td><?= $value['so_luong'] ?></td>
                <td><?= $value['mau_sac'] ?></td>
                <td><?= $value['kich_co'] ?></td>
                <td><?php
                    if ($value['gioi_tinh'] == '0') {
                      echo "Nam/Nữ";
                    } else if ($value["gioi_tinh"] == "1") {
                      echo "Nam";
                    } else {
                      echo "Nữ";
                    }

                    ?></td>
                <td><?php
                    $tong = $value['so_luong'] * $value['gia'];
                    echo $tong;
                    ?></td>
              </tr>
            <?php endforeach ?>

        </table>
        <form action="?act=updon" method="post">
          <input type="hidden" name="id" value="<?= $_GET['idd'] ?>">
          <input type="submit" class="btn btn-success" value=" Xác Nhận Đơn" name="xac" <?= ($trang_thai == '1' || $trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
          <input type="submit" class="btn btn-success" value=" Đang Giao Hàng" name="giao" <?= ($trang_thai == '0'  || $trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
          <input type="submit" class="btn btn-danger" value="Hủy Đơn" name="huy" <?= ($trang_thai == '2' || $trang_thai == '3' || $trang_thai == '4') ? 'hidden' : '' ?>>
          <input type="submit" class="btn btn-danger" value="Đã Nhận Hàng" name="thanhcong" <?= ($trang_thai == '2' || $trang_thai == '1' || $trang_thai == '4' || $trang_thai == '0') ? 'hidden' : '' ?>>
          <input type="submit" class="btn btn-danger" value="Quay Lại" name="quay">
        </form>
        </tbody>
      </div>
    </div>
  </div>

</div>