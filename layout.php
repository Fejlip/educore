<?php    
    $school_name = '';
    $street_name = '';
    $street_nr = '';
    $zip_code = '';
    $city_name = '';
    $nip = NULL;
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'librus');
    $query = "SET NAMES UTF8";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600|Poppins:300,400,400i,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
    <title>Educore - <?php echo $title ?></title>
</head>
<style>
    * {
        font-family: 'Open Sans', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    #logo {
        display: inline-block;
    }

    #user-icon {
        display: inline-block;
        margin-right: 0.5rem;

    }

    a, a:hover {
        text-decoration: none;
    }
</style>
<body>
<section id="header" class="row middle-xs between-xs">
<h1 id="logo" class="col-xs-3">Lorem</h1>
<div id="user-icon">
<a href="/librus/login.php">Login</a>
<a href="/librus/register.php">Register</a>
<!--
<img src="./user.png" alt="" width="50">
-->
</div>
</section>
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