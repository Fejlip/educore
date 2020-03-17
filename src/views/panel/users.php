<div class="row">
    <div class="col-xs-12">
        <div class="row center-xs">
            <div class="col-xs">Login</div>
            <div class="col-xs">Email</div>
            <div class="col-xs">Name</div>
            <div class="col-xs">Surname</div>
            <div class="col-xs">Account type</div>
            <div class="col-xs">Actions</div>
        </div>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'librus');
    $query = "SELECT * FROM users;";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    mysqli_error($mysqli);
    while ($row = $res->fetch_array()) {
        echo "<div class='row center-xs users-row'>";
        echo '<div class="col-xs">'.$row['login'].'</div><div class="col-xs">'.$row['email'].'</div><div class="col-xs">'.$row['name'].'</div><div class="col-xs">'.$row['surname'].'</div><div class="col-xs">'.$row['premissions'].'</div><div class="col-xs"><a class="users-edit">E</a><a class="users-remove">R</a></div>'; 
        echo "</div>";
    }
    ?>
</div>
</div>
