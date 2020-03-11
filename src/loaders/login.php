<?php
    session_start();
    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    $title = 'Login';
    $content = '../views/login.php';
    include('../layouts/layout-public.php');
?>
