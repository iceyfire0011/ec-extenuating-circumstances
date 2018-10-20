<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Add Evidence</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <form action="../../../controller/evidenceInfo.php" method="post" enctype="multipart/form-data">
            <table class="table table-user-information">
                <tbody>
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
                        <td><span class="style19"><b>Complain Name:</b></span></td>
                        <td>
                            <?php
                            if (isset($_GET['scid'])) {
								$scid=$_GET['scid'];
								$scname=$_GET['scname'];
                                echo "<label>" . $scname . "</label><input name='scid' type='hidden' value='" . $scid . "'/>";
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Previous Evidences</b></span></td>
                        <td></td>
                    </tr>
                    <?php
                    $sql = "select eid,ename,etype  from evidence,subjectcomplain "
                            . "where evidence.scid=subjectcomplain.scid and "
                            . "subjectcomplain.scid='" . $scid . "'";
                    $result = showData($sql);
                    if ($result) {
                        foreach ($result as $row) {
                            ?>
                            <tr>
                                <td></td>
                                <td><span class="style19"><a target="_blank" href="../../../evidence/<?php echo $row["eid"].".".$row["etype"]; ?>"><?php echo $row["ename"]; ?></a></span></td>
                            </tr>
                        <?php }
                    }
                    ?>
                    <tr>
                        <td><span class="style19"><b>Upload file</b></span></td>
                        <td><span class="style19"><input type="file" name="ename"  required/></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram"type="submit" value="Add Evidence" /></span>
                        </td></tr>
                </tbody></table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
?>
