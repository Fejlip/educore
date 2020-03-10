<div class="row center-sm">
        <div id="particles-js"></div>
        <div class="col-sm-5 login-col-info">
                <h1 class="login-logo ">EDUCORE</h1>
                <p class="login-info">
                           Educore to gwarancja profesjonalizmu popartego kilkunastoletnim doświadczeniem. Nasze unikalne
                        systemy wspierają tysiące polskich szkół i jednostek samorządowych w ich codziennej pracy.
                        Ponadto działalność firmy obejmuje również szkolenia, warsztaty oraz konferencje przygotowywane
                        przez naszych wewnętrznych trenerów oraz doświadczonych edukatorów współpracujących z Centrum
                        Kształcenia Nauczycieli Educore.
                </p>
        </div>

        <div class="col-sm-4x` login-col-loginBox">
                <form action="/librus/login-handler.php" method="post">
                        <?php //echo $_SESSION["message"]; ?>
                        <div class="row center-sm">
                                <div class="col-sm-10">
                                        <p class="login-input--text">School Account Name</p>
                                        <input type="text" name="login" id="login-input" class="login-input--style" placeholder="E-mail">
                                </div>
                        </div>
                        <div class="row center-sm">
                                <div class="col-sm-10">
                                        <p class="login-input--text">Password</p>
                                        <input type="password" name="password" id="password-input" class="login-input--style" placeholder="Password">
                                </div>
                        </div>
                        <div class="row center-sm">
                                <div class="col-sm-10">
                                        <button type="submit" class="login-button">Sign In</button>        
                                </div>
                        </div>
                </form>
        </div>
</div>

<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<!-- stats.js lib --> 
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="../../public/js/main.js"></script>