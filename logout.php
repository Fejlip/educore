<?php
    session_start();
    session_destroy();
    header('Location: /librus/login.php');
?>