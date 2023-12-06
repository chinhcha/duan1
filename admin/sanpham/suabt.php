<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=editsp&idsp=<?= $btsp['id_sp'] ?>">Quay Lại</a>
        </div>
        <div class="card-body">

            <form action="?act=suabt" method="post">
                <div class="row">
                    <div class="col">
                        <input class="form-control" name="id_sp" type="hidden" value="<?= $btsp['id_spbt'] ?>">
                        <input class="form-control" name="id" type="hidden" value="<?= $btsp['id_sp'] ?>">
                        <label name="mau_sac" class="form-label">Màu Sắc:</label>
                        <select class="form-select" name="mau_sac">
                            <?php foreach ($color as $key => $value) : ?>
                                <option value="<?= $value['id_color'] ?>" <?= ($btsp['id_color']) == $value['id_color'] ? 'selected' : '' ?>><?= $value['name_color'] ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Size:</label>
                        <select class="form-select" name="kich_co">
                            <?php foreach ($size as $key => $value) : ?>
                                <option value="<?= $value['id_size'] ?>" <?= ($btsp['id_size']) == $value['id_size'] ? 'selected' : '' ?>><?= $value['name_size'] ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label name="mau_sac" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" placeholder="Số lượng sản phẩm" value="<?= $btsp['soluong'] ?>" name="soluong">
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" data-bs-dismiss="modal" name="bienthe" value="Cập Nhật">
                </div>
            </form>

        </div>
    </div>


</div>