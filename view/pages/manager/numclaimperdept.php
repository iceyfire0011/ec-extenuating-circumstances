<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Number of Claims each Department</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>Department Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Number of Claim</b></td>
                </tr>
                <?php
                $sql = "select * from numclaimperdept";
//                echo $sql;
                $result = showData($sql);
//                print_r($result);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["dname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["claims"]; ?></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
