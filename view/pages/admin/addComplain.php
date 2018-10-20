<?php
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
        <form action="../../../controller/complainInfo.php" method="post">
            <table class="table table-user-information">
                <tbody>
                    <tr>
                        <td><b><?php
                                if ($_GET) {
                                    $err = $_GET["err"];
                                    $msg = $_GET["msg"];
                                    if ($err == 1) {
                                        echo "<span class='text-danger'>Please fill all data correctly or check complain already exists</span>";
                                    } elseif ($msg == 1) {
                                        echo "<span class='text-success'>New complain added successfully</span>";
                                    }
                                }
                                ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="style19"><b>Course Name:</b></span></td>
                        <td><select name="dname">
                                <?php
                                $sql = "select coursename,dname from course,department where department.did=course.did order by coursename asc";
                                $result = showData($sql);
                                //echo $sql;
                                // print_r($result);
                                foreach ($result as $row) {
                                    echo "<option value='" . $row['coursename'] . "'>" . $row['coursename'] ."-(". $row['dname'].")</option>";
                                }
                                ?>"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Complain Name:</b></span></td>
                        <td><span class="style19"><input type="text" name="cname" required/></span></td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Complain Details:</b></span></td>
                        <td><span class="style19"><textarea name="cdetails" required></textarea></span></td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Complain Due Date:</b></span></td>
                        <td>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="duedate" type="date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" date-mask required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style19"><b>Complain Final Closer Date:</b></span></td>
                        <td>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="finaldate" type="date" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" date-mask required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"><span class="style19"><input class="btn-instagram"type="submit" value="Add Complain" /></span>
                        </td></tr>
                </tbody></table>
        </form>
    </div>
    <!-- /.content -->
</div>
<?php
include 'footer.php';
?>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

    });
</script>