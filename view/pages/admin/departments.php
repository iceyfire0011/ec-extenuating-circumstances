<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Department List</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information" >
            <thead>
                <tr><th>Departments</th></tr>
            </thead>
            <tbody>
                <?php
                $sql = "select dname from department order by dname asc";
                $department = showData($sql);
//                print_r($result);
                foreach ($department as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["dname"]; ?></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
