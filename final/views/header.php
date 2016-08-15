<!DOCTYPE html>
<html>
    <head>
        <title>BoardCrew</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=URL ?>public/css/main.css"/>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <script src="https://use.typekit.net/wla5xmr.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>
        <header>

        <?php if($_GET['url'] === "index" || !isset($_GET['url']) ): ?>
            <!-- Show Landingpage Header if url is not set, url = "index", first open the platform, NOT LOGGED IN-->
            <div class="fullscreenHeader">
                  <nav class="navbar">
                    <div class="container-fluid">
                      <h1 class="navbar-brand">
                        <a href="index">
                          <img src="public/img/navLogo.svg" alt="Kleinere Version des Logos von Boardcrew." />
                        </a>
                      </h1>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a class="join-btn" href="#">Join</a></li>
                        <li><a class="enter-btn" href="#">Enter</a></li>
                      </ul>
                    </div>
                  </nav>
                  <div class="headerBackground">
                      <ul class="">
                        <li><a class="join-btn" href="#">Join</a></li>
                        <li><a class="enter-btn" href="#">Enter</a></li>
                      </ul>
                    <img src="public/img/großesLogo.svg" alt="Logo von BoardCrew." />
                  </div>
              </div>

          <?php elseif($_GET['url'] === "timeline"): ?>

              <!--If User is LoggedIn TODO IF USER IS LOGGED IN, TEMPORARELY ONLY IF PAGE ON TIMELINE AND SO ON  -->
                  <nav id="loggedinNav" class="navbar">
                    <div class="container-fluid">
                        <ul>
                            <li id="logo" class="navbar-"></li>
                            <ul class="navbar-right">
                                <li id="filter"></li>
                                <li id="search"></li>
                                <li id="menu" ></li>
                            </ul>
                        </ul>
                    </div>
                  </nav>         

          <?php endif; ?>

        </header>
