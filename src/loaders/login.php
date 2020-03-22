<?php
    session_start();
    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    $title = 'Login';
    $content = '/../views/login.php';
    require __DIR__ . '/../layouts/layout-public.php';
    
?>
