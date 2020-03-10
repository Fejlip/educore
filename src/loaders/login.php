<?php
    //session_start();
    //if ($_SESSION["login_fail"]) {
    //    $login_fail =  $_SESSION["login_fail"];
    //    if ($login_fail) {
    //        $message = "Invalid login or password";
    //        $_SESSION["message"] = $message;
    //    }
    //}
    //else {
    //    $_SESSION["login_fail"] = false;
    //    $message = '';
    //    $_SESSION["message"] = $message;
    //}
    $title = 'Login';
    $content = '../views/login.php';
    include('../layouts/layout-public.php');
?>