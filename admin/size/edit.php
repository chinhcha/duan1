<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Size</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?act=listsize">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="?act=uploadsize" enctype="multipart/form-data" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Id:</label>
                    <input class="form-control" value="<?= $size['id_size'] ?>" placeholder="AUTO NUMBER" readonly name="id_size">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="<?= $size['name_size'] ?>" id="pwd" placeholder="Tên Size" name="name_size">
                </div>

                <input type="submit" class="btn btn-primary" value="Cập nhật" name="gui">
            </form>

        </div>
    </div>

</div>