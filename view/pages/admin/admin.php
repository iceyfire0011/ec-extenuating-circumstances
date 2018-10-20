<?php
include 'header.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Admin Home</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <table class="table table-user-information">
            <tbody><tr>
                    <td><span class="style19"><a href="departments.php"><b>Departments</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="claims.php"><b>All Claims</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="itemofassessment.php"><b>Items of Assessments</b></a></span></td>
                </tr>
                <tr>
                    <td><span class="style19"><a href="studentlist.php"><b>Students</b></a></span>
                    </td></tr>
                <tr>
                    <td><span class="style19"><a href="chngpass.php"><b>Change  password</b></a></span>
                    </td></tr>
            </tbody></table>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
