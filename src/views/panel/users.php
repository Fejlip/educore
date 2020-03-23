<div class="row">
    <div class="col-12">
        <div class="row justify-content-center text-center">
            <div class="col">Login</div>
            <div class="col">Email</div>
            <div class="col">Name</div>
            <div class="col">Surname</div>
            <div class="col">Account type</div>
            <div class="col">Actions</div>
        </div>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'librus');
    $query = "SELECT * FROM users;";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    mysqli_error($mysqli);
    while ($row = $res->fetch_array()) {
        echo "<div class='row justify-content-center users-row text-center'>";
        echo '<div class="col">'.$row['login'].'</div><div class="col">'.$row['email'].'</div><div class="col">'.$row['name'].'</div><div class="col">'.$row['surname'].'</div><div class="col">'.$row['premissions'].'</div><div class="col"><a><i class="fas fa-cog"></i></a><a><i class="fas fa-times"></i></a></div>'; 
        echo "</div>";
    }
    ?>
</div>
</div>
