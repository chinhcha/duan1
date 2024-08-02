<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Size</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=listsize">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=uploadcolor" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Id:</label>
                    <input class="form-control" value="<?= $color['id_color'] ?>" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="<?= $color['name_color'] ?>" id="pwd" placeholder="Tên Size" name="name_color">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="color" class="form-control" value="<?= $color['color'] ?>" id="pwd" placeholder="Tên color" name="color">
                </div>

                <input type="submit" class="btn btn-primary" value="Cập nhật" name="gui">
            </form>

        </div>
    </div>

</div>