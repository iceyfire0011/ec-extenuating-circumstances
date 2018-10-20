<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Claim report each Faculty</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody style="border: 1px solid #222d32">
                <?php
                $sql = "select year,numclaim from claimpercent group by year";
//                                echo $sql;
                $year = showData($sql);
                foreach ($year as $y) {
                    ?>
                    <tr>
                        <td><b>Total Claim</b></td>
                        <td colspan="2"><b><?php echo $y["numclaim"]; ?></b></td>
                    </tr>
                    <tr>
                        <td><b>Year</b></td>
                        <td colspan="2"><b><?php echo $y["year"]; ?></b></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #222d32"><b>number of claims</b></td>
                        <td style="border: 1px solid #222d32"><b>Department Name</b></td>
                        <td style="border: 1px solid #222d32"><b>Percentage</b></td>
                    </tr>
                    <?php
                    $sql = "select * from claimpercent where year='" . $y["year"] . "'";
//                                    echo $sql;
                    $result = showData($sql);
//                                print_r($result);
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td style="border: 1px solid #222d32"><b><?php echo $row["claims"]; ?></b></td>
                            <td style="border: 1px solid #222d32"><b><?php echo $row["dname"]; ?></b></td>
                            <td style="border: 1px solid #222d32"><b><?php echo round($row["percent"], 2) . "%"; ?></b></td>
                        </tr>
                    <?php }
                    ?>
                    <tr>
                        <td colspan="3">
                            <div id="chart" style="width: 350px; height: 250px; margin: 0 auto"></div>
                            <script language="JavaScript">
                                function drawChart() {
                                    // Define the chart to be drawn.
                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'Departments');
                                    data.addColumn('number', 'Percentage');
                                    data.addRows([
    <?php
    $i = 0;
    echo "['" . $result[0]["dname"] . "', " . round($result[0]["percent"], 2) . "]";
    foreach ($result as $row) {
        if ($i > 0) {
            echo ",['" . $row["dname"] . "', " . round($row["percent"], 2) . "]";
        }
        $i++;
    }
    ?>]);

                                    // Set chart options
                                    var options = {'title': 'Claim report each Faculty <?php echo $y["year"]; ?>',
                                        'width': 350,
                                        'height': 250};

                                    // Instantiate and draw the chart.
                                    var chart = new google.visualization.PieChart(document.getElementById('chart'));
                                    chart.draw(data, options);
                                }
                                google.charts.setOnLoadCallback(drawChart);
                            </script>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.content -->
</div>

<?php
include 'footer.php';
