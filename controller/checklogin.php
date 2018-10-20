<?php

session_start();
include '../model/dataHandler.php';
include '../model/User.php';

openConnection();
if (isset($_POST)) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from user where uname='$username' or email='$username'";
    $user = showData($sql);
//    echo sizeof($user);
//    print_r($user);

    if (sizeof($user) > 0) {
//            print_r($user['attempts']);
        $tempUser = new User();
        $tempUser->setUname($user[0]['uname']);
        $tempUser->setEmail($user[0]['email']);
        $tempUser->setAttempts($user[0]['attempts']);
        $tempUser->setPass($user[0]['password']);
        $tempUser->setTimestamps($user[0]['timestamps']);
        $tempUser->setCatagory($user[0]['ucatagori']);
//            echo $tempUser->getUname();
        if ($tempUser->getPass() == $password) {
            if ($tempUser->getTimestamps() > time()) {
                $err = "timeout";
                header("location:../view/error.php?err=" . $err);
//                echo User::$message;
                header("location:../view/error.php?err=" . $err);
            } else {
                $sql = "update usercheck set attempts='0' where uname='".$username."'";
                update($sql);
                setcookie("loggin", "true", time() + 3600, "/");
//                echo $_COOKIE["loggin"];
                $_SESSION["username"] = $tempUser->getUname();
                $_SESSION["email"] = $tempUser->getEmail();
                $_SESSION["catagory"] = $tempUser->getCatagory();
//                print_r($_SESSION);
//                print_r($_COOKIE);
                if ($_SESSION["catagory"] == "administrator") {
                    header("location:../view/pages/admin/admin.php");
                } elseif ($_SESSION["catagory"] == "manager") {
                    header("location:../view/pages/manager/manager.php");
                } elseif ($_SESSION["catagory"] == "coordinator") {
                    header("location:../view/pages/coordinator/coordinator.php");
                } elseif ($_SESSION["catagory"] == "student") {
                    header("location:../view/pages/student/student.php");
                }
            }
        } else {
            $tempUser->setAttempts($tempUser->getAttempts() + 1);
            $sql = "update usercheck set attempts=" . $tempUser->getAttempts() . " where uname='$username'";
            update($sql);
//			echo $sql;

            if ($tempUser->getAttempts() > 3) {
                $tempUser->setTimestamps(time() + (180));
                $sql = "update user set timestamps=" . $tempUser->getTimestamps() . " where uname='$username'";
                update($sql);
				// echo $sql;
                $err = "attempt";
                header("location:../view/error.php?err=" . $err);
            } else {
                $err = "password";
                header("location:../view/error.php?err=" . $err);
            }
        }
    } else {
        $err = "username";
        header("location:../view/error.php?err=" . $err);
    }
}
