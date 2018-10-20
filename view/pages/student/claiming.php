<?php
if (!$_GET) {
    header("location:myclaim.php");
}
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Add Complain</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <form action="../../../controller/claimInfo.php" method="post">
            <table class="table table-user-information">
                <tbody>
                    <tr>
                        <td><b><?php
                                if ($_GET) {
                                    if ( isset($_GET["clid"])){
                                    //echo 1;
                                     $cid=$_GET["clid"];
                                        //echo $cid;
                                        $sql="select cname from complain where cid='".$cid."'";
                                        //echo $sql;
                                        $res = showData($sql);
                                        //print_r($res );
                                        $cnme=$res[0]["cname"];
                                        //echo $cnme;
                                        
                                    }
                                    
                                    if(isset($_GET["err"]) || isset($_GET["msg"])) {
                                        $err = $_GET["err"];
                                        $msg = $_GET["msg"];
                                       
                                        if ($err == 1) {
                                            echo "<span class='text-danger'>Please fill all data correctly or check complain already exists</span>";
                                        } elseif ($msg == 1) {
                                        
                                            echo "<span class='text-success'>New Claim added successfully</span>";
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
                            if (isset($_GET['cname'])) {
                                $cname = $_GET['cname'];
                                $cid=$_GET["cid"];
                                echo "<label>" . $cname. "</label><input name='cname' type='hidden' value='" . $cid . "'/>";
                            }
                            if (isset($_GET['clid'])) {
                                
                                
                                echo "<label>" . $cnme. "</label><input name='cname' type='hidden' value='" . $cid . "'/>";
                            }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Subject:</b></span></td>
                        <td><span class="style19"><input type="text" name="scname" required/></span></td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Claim Details:</b></span></td>
                        <td><span class="style19"><textarea name="scdetails" required></textarea></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram"type="submit" value="Add Claim" /></span>
                        </td></tr>
                </tbody></table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
?>
