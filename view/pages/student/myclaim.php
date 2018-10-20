<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>My Claim</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information" >
            <tbody style="border: 1px solid #222d32">
					<tr>
                        <td><b><?php
                                if ($_GET) {
                                    if (isset($_GET["err"]) || isset($_GET["msg"])) {
                                        $err = $_GET["err"];
                                        $msg = $_GET["msg"];
                                        if ($err == 1) {
                                            echo "<span class='text-danger'>Only .JPEG, .JPG, .PNG, .GIF and .PDF files are allowed to upload within 5MB size limit.</span>";
                                        } elseif ($msg == 1) {
                                            echo "<span class='text-success'>New claim evidence added successfully</span>";
                                        }
                                    }
                                }
                                ?></b>
                        </td>
                    </tr>
                <tr>
                    <td style="border: 1px solid #222d32"><b>Claim Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Claim Details</b></td>
                    <td style="border: 1px solid #222d32"><b>No of Evidence</b></td>
                    <td style="border: 1px solid #222d32"><b>Complain Name</b></td>
                    <td style="border: 1px solid #222d32"><b>Course</b></td>
                    <td style="border: 1px solid #222d32"><b>Edit Claim</b></td>
                    <td style="border: 1px solid #222d32"><b>Upload Evidence</b></td>
                </tr>
                <?php
                $username = $_SESSION["username"];
                $datetime = date('Y/m/d h:i:s', time());
                $sql = "select scid,cname,sctitle,scdetails,numevidence,coursename,finaldate  from user,department,student,subjectcomplain,complain,course "
                        . "where department.did=student.did and "
                        . "course.did=department.did and "
                        . "complain.courseid=course.courseid and "
                        . "subjectcomplain.cid=complain.cid and "
                        . "subjectcomplain.status= 'unsolved' and "
                        . "subjectcomplain.sid=student.sid and "
                        . "student.uid=user.uid and "
                        . "uname='" . $username . "' and "
                        . "complain.finaldate >'" . $datetime . "' order by finaldate";
//                echo $sql;
                $result = showData($sql);
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td style="border: 1px solid #222d32"><?php echo $row["sctitle"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["scdetails"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["numevidence"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["cname"]; ?></td>
                        <td style="border: 1px solid #222d32"><?php echo $row["coursename"]; ?></td>
                        <td style="border: 1px solid #222d32"><a href="editclaim.php?claim=<?php echo $row["scid"];?>">edit</a></td>
                        <td style="border: 1px solid #222d32"><a href="uploadevidence.php?scid=<?php echo $row["scid"]."&scname=".$row["sctitle"];?>">Upload</a></td>
                    </tr><?php } ?>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
