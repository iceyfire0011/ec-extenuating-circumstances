<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Student List</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information" >
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>Student Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Username</b></td>
                    <td style="border: 1px solid #222d32"><b>Departments</b></td>
                </tr>
                <?php
                $sql = "select dname,fullname,uname from user,department,student "
                        . "where department.did=student.did and "
                        . "student.uid=user.uid";
//                echo $sql;
                $result = showData($sql);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["fullname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["uname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["dname"]; ?></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
