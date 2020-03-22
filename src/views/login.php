<!--<form action="../handlers/login.php" method="post">
        <?php echo $message; ?>
        Login<br>
        <input type="text" name="login" id=""><br>
        Password<br>
        <input type="password" name="password" id=""><br>
        <button type="submit">Login</button>
    </form>
</body>-->

<div class="row justify-content-center">
    <div id="particles-js"></div>
    <div class="col-5 login-col-info">
        <img src="../../public/img/logo.svg" alt="" srcset="" class="login-logo" >
        <h4 class="login-info text-left">
            Sprawiamy, że zarządzanie procesem nauczania jest dziecinnie proste.
        </h4>
    </div>

    <div class="col-3 login-col-loginBox py-5">
        <h1 class="text-center mt-0">Log In</h1>
        <form action="/login-handler" method="post">
            <div class="form-group">
                <label for="">Login</label>
                <div class=icon-wrapper>
                <input type="text" class="form-control shadow-none " name="login">
                <span class="icon"><i class="fas fa-user"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <div class=icon-wrapper>
                <input type="password" class="form-control shadow-none password-input" name="password">
                <span class="icon"><i class="fas fa-lock"></i></span>
                </div>
            </div>
            <div class="text-danger text-center error-message "><?php echo $message; ?></div>
            <button type="submit" class="login-button btn py-2 col-12 mt-4 mb-3 text-light">Log in</button>     
        </form>
    </div>
</div>

<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- stats.js lib -->
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="../../public/js/main.js"></script>
