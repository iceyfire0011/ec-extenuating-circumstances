<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Unsolved Claim List</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>Claim Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Claim Details</b></td>
                    <td style="border: 1px solid #222d32"><b>Complain Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Course</b></td>
                    <td style="border: 1px solid #222d32"><b>Department</b></td>
                </tr>
                <?php
                $datetime = date('Y/m/d h:i:s', time());
                $username = $_SESSION["username"];
                $sql = "select dname,coursename,scid as cid,cname,sctitle,scdetails,scid "
                        . "from department,facultycoord,course,complain,usercheck,subjectcomplain "
                        . "where usercheck.uid=facultycoord.uid and "
                        . "department.fid=facultycoord.fid and "
                        . "course.did=department.did and "
                        . "complain.courseid=course.courseid and "
                        . "subjectcomplain.cid=complain.cid and "
                        . "subjectcomplain.status='unsolved' and "
                        . "usercheck.uname='" . $username . "' and "
                        . "subjectcomplain.replyabledate <'" . $datetime . "'";
//                echo $sql;
                $result = showData($sql);
//                print_r($result);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["sctitle"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["scdetails"]; ?></td>
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
