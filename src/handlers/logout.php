<?php
    session_start();
    session_destroy();
    header('Location: ../loaders/login.php');
?>