<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi Tiết Đơn Hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình sản phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Màu</th>
                            <th>size</th>
                            <th>Thành Tiền</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sumtotal = 0;
                        foreach ($ds as $key => $value) {
                            extract($value);
                           
                        ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $name_sp ?>
                                </td>
                                <td><img src="./public/uploads/<?= $image_sp ?>" width="80px"></td>
                                <td>
                                    <?= $so_luong ?>
                                </td>
                                <td>
    
                                    <?= $gianew = $gia - $gia * ($giam_gia * 0.01) ?>
                                </td>
                                <td>
                                    <?php
                                
                                    ?>
                                </td>
                                <td>
                                    <?php
                                   
                                    ?>
                                </td>
                                <td>
                                    <?= $gianew * $so_luong ?>
                                </td>

                            </tr>
                        <?php  $sumtotal += $gianew * $so_luong; } ?>
                        <tr>
                            <td colspan="7">Tổng tiền</td>
                            <td>$
                                <?= $sumtotal ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>

</div>