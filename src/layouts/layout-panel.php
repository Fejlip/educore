<?php    
    error_reporting(-1);
    $activePage = basename($_SERVER['PHP_SELF'], ".php");

    session_start();
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600|Poppins:300,400,400i,600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/839fad7795.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="../../../public/css/private.css">
    <title>Educore - <?php echo $title; ?></title>
</head>

<body class="row">
    <div class="col-3"></div>
    <div id="side_panel" class="col-3">
        <img src="../../../public/img/logo.svg" alt="Educore logo." id="site-logo" class="col-11 mx-3">
        <h4 id="side_panel-userinfo" class="col-12">Logged as <?php echo $name." ".$surname; ?></h4>
        <div class="line"></div>
        <ul id="side_panel-nav">
            <a href="../panel/users.php">
                <li class="<?= ($activePage == 'users') ? 'active':''; ?> side_panel-nav--li">User Management</li>
            </a>
            <a href="">
                <li class="<?= ($activePage == 'agenda') ? 'active':''; ?> side_panel-nav--li">todo</li>
            </a>
            <a href="">
                <li class="<?= ($activePage == 'grades') ? 'active':''; ?> side_panel-nav--li">todo</li>
            </a>
        </ul>
        <div class="line"></div>
        <a id="side_panel-logout" href="/logout-handler">LOGOUT</a>
    </div>

    <div class="col-9">
        <div class="row">
            <h2 id="page_title" class="col-12"><?php echo $title; ?></h2>
            <div class="col">
                <?php require __DIR__ . $content ?>
            </div>
        </div>
    </div>


    <!--<section id="school_info">
        <h3>Dane placówki</h3>
        <ul>
            <li>Nazwa szkoły - <?php echo $school_name ?></li>
            <li>Ulica - <?php echo $street_name.' '.$street_nr ?></li>
            <li>Kod pocztowy i miasto - <?php echo $zip_code.', '.$city_name ?></li>
            <li>NIP - <?php echo $nip ?></li>
        </ul>
    </section>
-->
</body>

</html>
