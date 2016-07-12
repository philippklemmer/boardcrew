<!DOCTYPE html>
<html>
    <head>
        <title>BoardCrew</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="public/css/main.css"/>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <script src="https://use.typekit.net/wla5xmr.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>


      <!--Header for the Landingpage-->
        <header>

        <?php if($_GET['url'] === "index" || !isset($_GET) ): ?>
        <!--wenn alles cool ist geh auf die landingpage -> index.php-->
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

          <?php else: ?>
          <!--wenn es die Seite/Class nicht gibt geh auf ErroPage-->
              <div class="error-page">
                  <div class="error-msg">
                      <h2>Error Page 404</h2>
                      <small>Don't do something dumb like this.</small>
                  </div>
                  <div class="back-to-home-arrow">
                      <a href="index"></a>
                  </div>
              </div>

          <?php endif; ?>

        </header>
