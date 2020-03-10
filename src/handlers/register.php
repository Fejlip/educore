<?php
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'librus');

        $query = "INSERT INTO users (email, login, name, surname, password, permissions) VALUES (?, ?, ?, ?, ?, 'user');";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssss', $email, $login, $name, $surname, $password);
        $stmt->execute();
        $stmt->close();
        header('Location: ../loaders/login.php');
    }
?>