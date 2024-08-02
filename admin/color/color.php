<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Color </h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn btn-primary" href="?act=addcolor">Thêm Color<i class="bi bi-plus-circle"></i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
           <td></td>  
          <th>ID</th>
          <th>Tên</th>
          <th>Màu</th>


            </tr>
          </thead>

          <tbody>
            <form action="?act=listcolor" method="post">
              <?php foreach ($color as $key => $value) : ?>
                <tr>
                  <td><input type="checkbox"></td>
                  
                 <td><?= $value['id_color'] ?></td>
                 <td><?= $value['name_color'] ?></td>
                 <td><input type="color" name="color" value="<?= $value['color'] ?>"></td>
                  <td><a href="?act=editcolor&id_color=<?= $value['id_color'] ?> "class="btn btn-success"><i class="bi bi-pencil-square"></i> Sửa</a>
                    <a href="?act=xoacolor&id_color=<?= $value['id_color'] ?>" onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a>
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