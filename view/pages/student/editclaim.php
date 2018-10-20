<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Edit Claim</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <form action="../../../controller/editevidence.php" method="post">
            <table class="table table-user-information" >
                <tbody style="border: 1px solid #222d32">
                    <tr>
                        <td ><b>Claim Name</b></td>
                        <td ><b>
                                <?php
                                if ($_GET["claim"]) {
                                    $scid = $_GET["claim"];
                                    $sql = "select sctitle,scdetails from subjectcomplain where scid='" . $scid."'";
                                    $result = showData($sql);
                                    echo $result[0]["sctitle"];
                                }
                                ?>
                            </b><input name="scid" value="<?php echo $scid; ?>" type="hidden"/></td>
                    </tr>
                    <tr>
                        <td ><b>Claim Details</b></td>
                        <td ><textarea name="scdetails" ><?php echo $result[0]["scdetails"]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram"type="submit" value="Edit Claim" /></span></td>
                    </tr> 
                </tbody>
            </table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
