<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Solved Claim</center>

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
                    <td style="border: 1px solid #222d32"><b>Claim Solution</b></td>
                    <td style="border: 1px solid #222d32"><b>Complain Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Course</b></td>
                    <td style="border: 1px solid #222d32"><b>Department</b></td>
                </tr>
                <?php
                $username = $_SESSION["username"];
                $sql = "select dname,coursename,subjectcomplain.scid as cid,cname,sctitle,scdetails,subjectcomplain.scid,solution,submissiontime "
                        . "from department,student,course,complain,usercheck,subjectcomplain,solution "
                        . "where usercheck.uid=student.uid and "
                        . "department.did=student.did and "
                        . "course.did=department.did and "
                        . "complain.courseid=course.courseid and "
                        . "subjectcomplain.cid=complain.cid and "
                        . "subjectcomplain.status='solved' and "
                        . "subjectcomplain.scid=solution.scid and "
                        . "usercheck.uname='" . $username . "' group by submissiontime desc";
//                echo $sql;
                $result = showData($sql);
//                print_r($result);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["sctitle"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["scdetails"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["solution"]; ?></td>
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
