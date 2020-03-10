<?php    
    error_reporting(-1);
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    $school_name = '';
    $street_name = '';
    $street_nr = '';
    $zip_code = '';
    $city_name = '';
    $nip = NULL;
    $mysqli = new mysqli('localhost', 'root', '', 'librus');
    $query = "SELECT * FROM metadata";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_array()) {
        $school_name = $row['school_name'];
        $street_name = $row['street_name'];
        $street_nr = $row['street_nr'];
        $zip_code = $row['zip_code'];
        $city_name = $row['city_name'];
        $nip= $row['nip'];
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css"
        type="text/css">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Educore - <?php echo $title ?></title>
</head>

<body class="row">
    <div id="side_panel" class="col-xs-3">
        <h1>EDUCORE</h1>
        <ul id="side_panel-nav">
            <li class="<?= ($activePage == 'overview') ? 'active':''; ?> side_panel-nav--li"><a href="">Overview</a></li>
            <li class="side_panel-nav--li"><a href="">Agenda</a></li>
            <li class="side_panel-nav--li"><a href="">Grades</a></li>
            <li class="side_panel-nav--li"><a href="">Timetable</a></li>
            <li class="side_panel-nav--li"><a href="">Messages</a></li>
            <li class="side_panel-nav--li"><a href="">Attendance</a></li>
            <li class="side_panel-nav--li"><a href="">Homework</a></li>
        </ul>
        <div class="line"></div>
        <a id="side_panel-logout" href="../handlers/logout.php">LOGOUT</a>
    </div>

    <?php include($content); ?>
    <section id="school_info">
        <h3>Dane placówki</h3>
        <ul>
            <li>Nazwa szkoły - <?php echo $school_name ?></li>
            <li>Ulica - <?php echo $street_name.' '.$street_nr ?></li>
            <li>Kod pocztowy i miasto - <?php echo $zip_code.', '.$city_name ?></li>
            <li>NIP - <?php echo $nip ?></li>
        </ul>
    </section>
</body>

</html>
