<?php
include 'header.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Add Department</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <form action="../../../controller/departmentInfo.php" method="post">
            <table class="table table-user-information">
                <tbody>
                    <tr>
                        <td><b><?php
                                if ($_GET) {
                                    $err = $_GET["err"];
                                    $msg = $_GET["msg"];
                                    if ($err == 1) {
                                        echo "<span class='text-danger'>Department already exists</span>";
                                    } elseif ($msg == 1) {
                                        echo "<span class='text-success'>Department added successfully</span>";
                                    }
                                }
                                ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Department Name:</b></span></td>
                        <td><span class="style19"><input type="text" name="dname" required/></span></td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram" type="submit" value="Add Department" /></span>
                        </td></tr>
                </tbody></table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
