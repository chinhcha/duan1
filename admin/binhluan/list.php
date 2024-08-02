<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Danh Sách Danh Mục</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Full name</th>
              <th>Comment</th>
              <th>Sản phẩm</th>
              <th>Name user comment</th>
              <th>Ngày bình luận</th>
              <th>Chức Năng</th>

            </tr>
          </thead>

          <tbody>
            
              <?php foreach ($bl as $key => $value) : ?>
                <tr>

                  <td><?= $key + 1 ?></td>
                  <td><?= $value['full_name'] ?></td>
                  <td><?= $value['comment'] ?></td>
                  <td><?= $value['name_sp'] ?></td>
                  <td><?= $value['name_tk'] ?></td>
                  <td><?php
                      $dateTime = new DateTime($value['ngaybinhluan']);
                      // Chuyển đổi sang định dạng khác (ví dụ: dd/mm/yyyy)
                      $newFormat = $dateTime->format('d/m/Y');
                      echo $newFormat;
                      ?></td>
                  <td>
                    <a href="?act=xoabl&id_bl=<?= $value['id_bl'] ?>" onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a>
                  </td>
                </tr>
              <?php endforeach ?>

          </tbody>


        </table>
       
        <a href="?act=binhluan" type="button" class="btn btn-info">Quay lại </a>
   
      </div>
    </div>
  </div>

</div>