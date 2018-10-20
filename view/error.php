<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'header.php';
include '../model/User.php';
?>
<div class="content-wrapper" style="min-height: 1461px;overflow: auto;margin:0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <center>Error</center>

        </h1>
        <br>
    </section>

    <!-- Main content -->
    <div class=" col-md-12 col-lg-12"> 

        <table class="table table-user-information">
            <tbody style="border: 1px solid #222d32">
                <tr>
                    <td style="border: 1px solid #222d32"><b>
                            <?php
                            $err = $_GET["err"];

                            if ($err == "username") {
                                echo "<h2 align='center'>Invalid email or username<br/><a href = 'login.php'>Login</a>";
                            }

                            if ($err == "password") {
                                echo "<h2 align='center'>Invalid username or password</h2><h2 align='center'><a href = 'login.php'>Try again</a></h2>";
                            }

                            if ($err == "attempt") {
                                echo "<h2 align='center'>Invalid Attempts more than 3 times, <a href = 'login.php'> Try again</a> 3 minute later!</h2>";
                            }

                            if ($err == "timeout") {
                                echo "<p>Timeout</p><a href = 'login.php'>Try again some time later</a>";
                            }
                            ?>
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
    include_once 'footer.php';
    