<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa Sản Phẩm </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=listsp">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=upsp" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" name="id" type="hidden" value="<?= $sanpham['id_sp'] ?>">
                    <input class="form-control" name="img" type="hidden" value="<?= $sanpham['image_sp'] ?>">
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="pwd" value="<?= $sanpham['name_sp'] ?>" placeholder="Tên Tên Sản Phẩm" name="name" required>
                </div>
           
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Img_sp:</label>
                    <input class="form-control" type="file" name="image_sp">
                    <img src="../public/uploads/<?= $sanpham['image_sp'] ?>" class="img-thumbnail" alt="" width="200">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giảm Giá:</label>
                    <input class="form-control" value="<?= $sanpham['giam_gia'] ?>" type="text" name="giam_gia" value="0">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Giá Tiền :</label>
                    <input class="form-control" value="<?= $sanpham['gia'] ?>" type="text" name="gia" value="0">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mô tả : </label>
                    <textarea class="form-control"   width='120px' height='100px' id="exampleFormControlTextarea1" rows="3" name="mo_ta"><?= $sanpham['mo_ta']  ?> </textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ngày nhập</label>

                    <input type="date" name="date" value="<?= $sanpham['ngay_nhap'] ?>" class="form-control" id="exampleInputPassword1">


                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Ảnh Mô Tả:</label>
                 <input class="form-control" type="file" name="img_mota[]" multiple="multiple">
                    <?php foreach ($img as $key => $value) : ?>
                        <img src="../public/uploads/<?= $value['img_url'] ?>" class="rounded" alt="Cinque Terre" width="250">
                    <?php endforeach ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giới Tính</label>
                    <select class="form-control" aria-label="Default select example" name="gt">
                        <option selected>-------- Chọn Giới Tính --------</option>
                        <option value="0" <?= ($sanpham['gioi_tinh']) == 0 ? 'selected' : '' ?>>Nam/Nữ</option>
                        <option value="1" <?= ($sanpham['gioi_tinh']) == 1 ? 'selected' : '' ?>>Nam</option>
                        <option value="2" <?= ($sanpham['gioi_tinh']) == 2 ? 'selected' : '' ?>>Nữ</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Danh mục : </label>
                    <select class="form-control" aria-label="Default select example" name="dm">
                        <option selected>-------- Chọn Danh Mục --------</option>
                        <?php foreach ($danhmuc as $key => $value) : ?>

                            <option value="<?= $value['id_dm'] ?>" <?= ($sanpham['id_dm']) == $value['id_dm'] ? 'selected' : '' ?>><?= $value['name_dm'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Cập Nhật" name="gui">
            </form>

        </div>
    </div>
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Biến Thể </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Thêm Mới <i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        
                            <tr>
                                <th>STT</th>
                                <th>Màu Sắc</th>
                                <th>Kích Cỡ</th>
                                <th>Số Lượng</th>
                                <th>Trạng Thái</th>
                                <th>Chức Năng</th>
                            </tr>
                    
                    </thead>

                    <tbody>
                    <?php foreach ($bienthe as $key => $value) : ?>
                            <tr>
                                <td><?=$key + 1 ?></td>
                                <td><?=$value['name_color']?></td>
                                <td><?=$value['name_size']?></td>
                                <td><?=$value['soluong']?></td>
                                <td><?php if($value['soluong'] <= 0 ){
                                    echo "<p class='alert alert-danger' width='50'>hết hàng</p>" ; 
                                } else {
                                    echo "<p class='alert alert-success' width='50' > còn hàng</p>" ; 
                                } ?></td>
                                <td> <a href="?act=suabt&idsp=<?= $value['id_sp'] ?>&idbt=<?=$value['id_spbt']?>" class="btn btn-success" ><i class="bi bi-pencil-square"></i> Sửa</a>
                                    <a href="?act=xoabt&idsp=<?= $value['id_sp'] ?>&idbt=<?=$value['id_spbt']?>" onclick="return confirm('Bạn có muốn xóa không ?') " class="btn btn-danger">Xóa</a></td>
                            </tr>
                        <?php endforeach ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-down" class="modal-dialog modal-fullscreen">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Thêm Mới </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="?act=upsp" method="post">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" name="id_sp" type="hidden" value="<?= $sanpham['id_sp'] ?>">
                                <label name="mau_sac" class="form-label">Màu Sắc:</label>
                                <select class="form-select" name="mau_sac">
                                    <?php foreach ($color as $key => $value) : ?>
                                        <option value="<?= $value['id_color'] ?>"><?= $value['name_color'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Size:</label>
                                <select class="form-select" name="kich_co">
                                    <?php foreach ($size as $key => $value) : ?>
                                        <option value="<?= $value['id_size'] ?>"><?= $value['name_size'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
<label name="mau_sac" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" placeholder="Số lượng sản phẩm" value="1" name="soluong">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" data-bs-dismiss="modal" name="bienthe" value="Thêm">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
