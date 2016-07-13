<!--Section for the Presentationvideo-->
<section id="landing-presentation-vid">
    <div align="center" class="embed-responsive embed-responsive-16by9">
        <video height="500" width="500" class="embed-responsive-item" src="../public/img/awhou-intro.mp4" autoplay poster="posterimage.jpg">
            <source src="http://" type="video/mp4">
        </video>
    </div>
</section>

<!--Section for the explanation for the video-->
<section id="landing-explain">
    <div class="explain-container">
        <figure><img src="../public/img/graphics/kamera.svg" alt="Kamera zur Visualisierung der Aufgabe des Nutzers, Bilder und Bideos nutzen zu können" /></figure>
        <p>
            Board Crew is a fun and quirky way to share your skatelife with friends through a series of pictures. We're building BoardCrew to allow you to experience moments in your friends' lives through pictures or videos as they happen.
        </p>
    </div>

    <div class="explain-container"><figure><img class="seperator" src="../public/img/graphics/arrowDown.svg" alt="Pfeil nach unten in ästhetisch anschprechender Form" /></figure></div>

    <div class="explain-container">
        <figure><img src="../public/img/graphics/smartphone.svg" alt="" /></figure>
        <p>
            Place these on your profile and your timline will grow. Other User can follow your progress and get inspired by your results. You just need a internet compatible device. Open your Browser and save it as a bookmark, to get there as simple as possible.
        </p>
    </div>

    <div class="explain-container"><figure><img class="seperator" src="../public/img/graphics/arrowDown.svg" alt="Pfeil nach unten in ästhetisch anschprechender Form" /></figure></div>

    <div class="explain-container">
        <figure><img src="../public/img/graphics/lightbulb.svg" alt="" /></figure>
        <p>
            Board Crew brougth to life, because Longboarding isn’t just a sport. Longboarding on it’s own stands for fellowship, freedom and coherence. We want to support you as a community to grow together.
        </p>
    </div>
</section>

<!--Section for the statistics-->
<section id="landing-stats">
    <div class="inner-wrap">
        <h2>Users Allready registered</h2>
        <small><span>-</span>123.456<span>-</span></small>
        <figure><img src="../public/img/graphics/stats.svg" alt="" /></figure>
    </div>
    <div class="inner-wrap">
        <h2>Most viewed Video or Image</h2>
        <small><span>-</span>123.456<span>-</span></small>
        <figure><img src="../public/img/graphics/tv.svg" alt="" /></figure>
    </div>
</section>

<!-- Pop-Ups for the Register/Login/PasswordRepeat-->
<!-- REGISTER START -->
<div id="register" class="form-container" >
    <div class="landing-form-container">
        <small><a id="login-on-register" href="#">Allready have an acoount? Log in here</a></small>
        <div class="landing-form-container-head">
            <h3>Hooray!<br/>Almost on Board</h3>
            <div class="landing-form-logo"></div>
        </div>
        <main>
            <form class="" action="" method="post">
                <!--Username-->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    <!-- TODO if user is trying to register fail or success-->
                    <!-- <span class="input-group-addon glyphicon glyphicon-ok" id="basic-addon1"></span> -->
                    <!-- <span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span> -->
                </div>
                <!--Mail-->
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Mail" aria-describedby="basic-addon1">
                    <!-- <span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span> -->
                </div>
                <!--Password-->
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    <!-- <span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span> -->
                </div>
                <!--Confirm Password-->
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm password" aria-describedby="basic-addon1">
                    <!--<span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span>-->
                </div>
                <!--Fehlermeldungen will shown here-->
                <div class="error-msg"></div>
                <!--Submit-->
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Sign Up">
                    <small class="form-text">
                        <a href="#">By clicking this button you agree <br/> to Board Crew’s Terms of Service</a>
                    </small>
                </div>
            </form>
        </main>
    </div>
</div>
    <!-- REGISTER END -->
<!-- Login START -->
<div id="login" class="form-container" >
    <div class="landing-form-container">
        <small><a id="registerOnLogin" href="#">Don't have an account? Sign up</a></small>
        <div class="landing-form-container-head">
            <h3>Welcome back</h3>
            <div class="landing-form-logo"></div>
        </div>
        <main>
            <form class="" action="" method="post">
                <!--Username-->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    <!-- TODO if user is trying to register fail or success-->
                    <!-- <span class="input-group-addon glyphicon glyphicon-ok" id="basic-addon1"></span> -->
                    <!-- <span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span> -->
                </div>
                <!--Password-->
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    <!-- <span class="input-group-addon glyphicon glyphicon-remove" id="basic-addon1"></span> -->
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Remember me
                  </label>
                </div>
                <!--Submit-->
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Login">
                    <small class="form-text">
                        <a id="pwRepeat" href="#">Reset your password</a>
                    </small>
                </div>
            </form>
        </main>
    </div>
</div>
<!-- Login END -->
<!-- Password Reset START -->
<div id="pw-reset" class="form-container" >
    <div class="landing-form-container">
        <small><a id="backToLogin" href="#">Go back to the login page</a></small>
        <div class="landing-form-container-head">
            <div class="landing-form-logo"></div>
            <h3>Reset your password</h3>
        </div>
        <main>
            <form class="" action="" method="post">
                <!--Username-->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    <!-- TODO if user is trying to register fail or success-->
                </div>
                <!--Submit-->
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Reset password">
                </div>
            </form>
        </main>
    </div>
</div>
<!-- Password Reset END -->
