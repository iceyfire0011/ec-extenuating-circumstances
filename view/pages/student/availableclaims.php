<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Available Claim List</center>

        </h1>
        <center><span>(Select Complain to Submit a Claim)</span></center>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information" >
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>complain name</b></td>
                    <td style="border: 1px solid #222d32"><b>Description</b></td>
                    <td style="border: 1px solid #222d32"><b>Course</b></td>
                    <td style="border: 1px solid #222d32"><b>Departments</b></td>
                    <td style="border: 1px solid #222d32"><b>Due Date</b></td>
                    <td style="border: 1px solid #222d32"><b>Final Date (upload evidence)</b></td>
                </tr>
                <?php
                $datetime = date('Y/m/d h:i:s', time());
                $username = $_SESSION["username"];
                $sql = "select dname,coursename,cname,complain.cid as cid,cdetails,duedate,finaldate "
                        . "from department,student,course,complain,usercheck "
                        . "where department.did=student.did and "
                        . "course.did=department.did and "
                        . "complain.courseid=course.courseid and "
                        . "usercheck.uid=student.uid and "
                        . "usercheck.uname='" . $username . "' and "
                        . "complain.duedate >'" . $datetime . "'";
//                echo $sql;
                $result = showData($sql);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><a href='claiming.php?cname=<?php echo $row["cname"]."&cid=".$row["cid"]; ?>'><?php echo $row["cname"]; ?></a></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["cdetails"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["coursename"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["dname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["duedate"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["finaldate"]; ?></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
