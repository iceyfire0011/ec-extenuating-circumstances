<?php
include 'header.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Student Home</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody><tr>
                    <td><span class="style19"><a href="availableclaims.php"><b>Available Claims</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="myclaim.php"><b>My Claims</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="solvedclaim.php"><b>Solved claims</b></a></span>
                    </td></tr>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
