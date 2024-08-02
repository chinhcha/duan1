<div class="main">
    <div class="main-content dashboard">


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="piechart" style="width:95%; height:500px;margin-top:10px;margin-left:2.4%;clear:both;"></div>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Sản phẩm'],
                    <?php
                    $tongdm = count($listthongke);
                    $i = 1;
                    foreach ($listthongke as $tk) {
                        extract($tk);
                        if ($i == $tongdm) $dauphay = "";
                        else $dauphay = ",";
                        echo "
                            ['" . $tk['tenloai'] . "', " . $tk['countsp'] . "]
                        " . $dauphay;
                        $i += 1;
                    }
                    // var_dump($tongdm); die;

                    ?>
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': 'Sản phẩm theo danh mục',
                    'width': 650,
                    'height': 500
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
        <br>
        <br>
        <a class="" href="index.php?act=sldanhmuc"><input type="button" class="btn btn-info" value="Xem danh sách"></a>
    </div>

</div>