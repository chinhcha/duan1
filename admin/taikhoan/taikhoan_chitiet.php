<div class="container mt-3">
    <h2>Chi Tiết Tài Khoản</h2>

    <form method="post" action="?act=uptk">
        <div class="row">
            <div class="col">
                <label name="mau_sac" class="form-label">Tài Khoản Đăng Nhập:</label>
                <input type="text" value="<?= $tk['name_tk'] ?>" class="form-control" readonly>
            </div>
            <div class="col">
                <label name="mau_sac" class="form-label">Mật Khẩu</label>
                <input type="text" value="<?= $tk['pass'] ?>" class="form-control" readonly>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label name="mau_sac" class="form-label">Họ Và Tên:</label>
                <input type="text" value="<?= $tk['full_name'] ?>" class="form-control" readonly>
            </div>
            <div class="col">
                <label name="mau_sac" class="form-label">Số Điện Thoại</label>
                <input type="text" value="<?= $tk['phone'] ?>" class="form-control" readonly>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label name="mau_sac" class="form-label">Địa Chỉ</label>
                <textarea class="form-control" rows="5" id="comment" name="text"><?= $tk['dia_chi'] ?></textarea>
            </div>
            <div class="col">
                <label name="mau_sac" class="form-label">Ảnh đại diện</label>
                <img src="../public/uploads/<?= $tk['image_tk'] ?>" class="img-thumbnail">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label name="mau_sac" class="form-label">Email:</label>
                <input type="text" value="<?= $tk['email'] ?>" class="form-control" readonly>
            </div>
            <div class="col">
                <label name="mau_sac" class="form-label">Chức Vụ</label>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="chucvu">
                        n>
                        <option value="1" <?= ($tk['chucvu']) == 1 ? 'selected' : '' ?>>Quản Trị Viên</option>
                        <option value="0" <?= ($tk['chucvu']) == 0 ? 'selected' : '' ?>>Khách Hàng</option>
                    </select>
                </div>

            </div>

        </div>
        <div class="col1" style="margin-top:25px ;">
        <input type="hidden" name="id" value="<?= $tk['id_tk'] ?>" class="form-control" readonly>
            <a href="?act=taikhoan" class="btn btn-primary"><i class="bi bi-arrow-left-square-fill"></i> Quay Lại</a>
            <input type="submit" value="cập nhật" name="gui" class="btn btn-info">
        </div>

    </form>

</div>