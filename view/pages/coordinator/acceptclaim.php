<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';

$username = $_SESSION["username"];
$sql = "select fid from usercheck,facultycoord "
        . "where facultycoord.uid=usercheck.uid and "
        . "uname='" . $username . "'";
$result= showData($sql);
$fid=$result[0]["fid"];

if ($_GET) {
    $scid = $_GET["scid"];
    $sctitle = $_GET["sctitle"];
    ?>    
    <div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <center>Accept Claim</center>

            </h1>
            <br>
        </section>

        <!-- Main content -->
        <div class=" col-md-9 col-lg-9"> 
            <form action="../../../controller/solution.php" method="post">
                <table class="table table-user-information">
                    <tbody style="border: 1px solid #222d32">
                        <tr>
                            <td><b>Claim Name</b></td>
                            <td><b><label><?php echo $sctitle; ?></label><input type="hidden" name="scid" value="<?php echo $scid; ?>"/><input type="hidden" name="fid" value="<?php echo $fid; ?>"/></b></td>
                        </tr>
                        <tr>
                            <td><b>Reply Solution</b></td>
                            <td><textarea name="solution" required></textarea></td>
                        </tr>
                        <tr>
                            <td class="text-right"><span class="style19"><input class="btn-instagram"type="submit" value="Solve" /></span></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <?php
    include 'footer.php';
}
?>