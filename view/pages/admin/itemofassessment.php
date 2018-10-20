<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Item of Assessment</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information" >
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>Complains</b></td>
                    <td style="border: 1px solid #222d32"><b>Courses</b></td>
                    <td style="border: 1px solid #222d32"><b>Departments</b></td>
                </tr>
                <?php
                $sql = "select dname,coursename,cname from department,course,complain "
                        . "where department.did=course.did and "
                        . "course.courseid=complain.courseid";
                $department = showData($sql);
//                print_r($result);
                foreach ($department as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["cname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["coursename"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["dname"]; ?></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
