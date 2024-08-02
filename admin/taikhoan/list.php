<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Tài Khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>Tài Khoản</th>
                            <th>Ảnh hồ sơ</th>
                            <th>Họ và Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Chức Vụ</th>
                            <th>Tình Trạng</th>
                            <th>Chức Năng</th>

                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php foreach ($tk as $key => $value) : ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?= $value['name_tk'] ?></td>
                                    <td><img src="../public/uploads/<?= $value['image_tk'] ?>" alt="" width="100"></td>
                                    <td><?= $value['full_name'] ?></td>
                                    <td><?= $value['dia_chi'] ?></td>
                                    <td><?php if ($value['chucvu'] == '1') {
                                            echo " Quản Trị Viên";
                                        } else {
                                            echo "Khách Hàng";
                                        } ?></td>
                                    <td><?php if ($value['lock'] == '1') {
                                            echo "<p class='text-danger'>Đã bị Khóa</p>";
                                        } else {
                                            echo "<p class='text-success'>Đang hoạt động</p>";
                                        } ?></td>
                                    <td><a href="?act=ct_tk&idtk=<?= $value['id_tk'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i>Cập Nhập</a>
                                        <a href="?act=xoatk&idtk=<?= $value['id_tk'] ?>" onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a>

                                        <?php if ($value['lock'] == '1') {
                                            echo '<a href="?act=mo_tk&idtk=' . $value["id_tk"] . '  "class="btn btn-info"> Mở Khóa TK</a>';
                                        } else {
                                            echo '<a href="?act=lock_tk&idtk=' . $value["id_tk"] . '" class="btn btn-info"> Khóa TK</a>';
                                        } ?>
                                    </td>
                                    </td>
                                </tr>
                            <?php endforeach ?>

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