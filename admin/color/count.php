<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tổng Color Theo Danh Mục</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>STT</th>
              <th>Name</th>
              <th>Tổng Sản Phẩm</th>
              <th>Chỉ Tiết</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($tong as $key => $value) : ?>
              <td><?= $key + 1 ?></td>
              <td><?= $value['name_size'] ?></td>
              <td> <a href="" class="text-body">Hiện Có <?= $value['Tong'] ?> Size </a></td>
              <td><a href="" class="btn btn-success">Chi Tiết</a>
              </td>
              </tr>
            <?php endforeach ?>
          </tbody>


        </table>

      </div>
    </div>
  </div>

</div>