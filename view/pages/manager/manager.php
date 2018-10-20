<?php
include 'header.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Manager Home</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody><tr>
                    <td><span class="style19"><a href="numclaimperdept.php"><b>Number of Claims each Department</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="claimpercent.php"><b>Claim report each faculty</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="numstdcompindept.php"><b>Number of Student complained in Department</b></a></span>
                    </td></tr>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
