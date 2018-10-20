<?php
include 'header.php';
include '../../../model/dataHandler.php';
include 'aside.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Manage Role</center>
        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-9 col-lg-9"> 
        <form action="../../../controller/permission.php" method="post">
            <table class="table table-user-information">
                <tbody>
                    <tr>
                        <td><b><?php
                                if ($_GET) {
                                    $msg = $_GET["msg"];
                                    if ($msg == 1) {
                                        echo "<span class='text-success'>Permission set successful</span>";
                                    }
                                }
                                ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>User Full Name:</b></span></td>
                        <td><select name="user">
                                <?php
                                $sql = "select fullname,uname from usercheck order by fullname asc";
                                $result = showData($sql);
                                // print_r($result);
                                foreach ($result as $row) {
                                    echo "<option value='" . $row['uname'] . "'>" . $row['fullname'] . " (" . $row['uname'] . ")</option>";
                                }
                                ?>"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Define Role</b></span></td>
                        <td><select name="role">
                                <option value="administrator">Administrator</option>
                                <option value="manager">Manager</option>
                                <option value="coordinator">Coordinator</option>
                                <option value="student">Student</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram" type="submit" value="Set Role" /></span>
                        </td></tr>
                </tbody></table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
