<?php
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $mysqli = new mysqli('127.0.0.1', 'root', '', 'librus');

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $query = "SELECT * FROM users WHERE login=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $login,);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_array()) {
            if (password_verify($password, $row['password'])) {
                echo "Zalogowano!";
                session_start();
                $_SESSION["logged"] = true;
                $_SESSION['login'] = $login;
                header('Location: ../loaders/overview.php');
                break;
            }
            else {
                header('Location: ../loaders/login.php');
            }   
        }
            session_start();
    }


?>