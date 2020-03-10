<?php 
        if (isset($_SESSION['login'])) {
        echo "Witaj ".$_SESSION['login']."!";
        } else {
            header('Location: ./login.php');
        }
    ?>
<br>
<a href="../handlers/logout.php">Logout</a>
