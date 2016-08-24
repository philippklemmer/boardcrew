<!DOCTYPE html>
<html>
    <head>
        <title>BoardCrew</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
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
                        <a id="indexLogoSmall" href="index">
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


                      <!-- JS COMPONENTS -> TIMELINE SLIDE DOWN IF THEY GOT CLICKED-->
                      <!--MENU-->
                      <!--Swipe from left left to right or right to left-->
                          <div class="menuContainer">
                              <div class="menuHeader">
                                  <img class="profileImg" src="/public/img/testThumnail.png" alt="" />
                                  <p class="username">Philipp Klemmer</p>
                              </div>
                              <div class="menuMain">
                                  <div>
                                      <p><a href="#"><span class="userprofileIcon"></span>Profile</a></p>
                                      <p><a href="#"><span class="editProfileIcon"></span>Edit</a></p>
                                  </div>

                              </div>
                              <div class="menuFooter">
                                  <a href="#">Logout</a>
                              </div>
                          </div>

                      <!--SearchBar-->
                      <!--Using the filterIcons to filter the output given with AJAX-->
                      <div class="searchBarContainer">
                          <form class="" action="index.html" method="post">
                              <input type="text" name="searchInput" value="" placeholder="Tap here to search...">
                          </form>
                          <div class="userFilterContainer">
                              <div class="generalSearchIcon"></div>
                              <div class="userSearchIcon"></div>
                              <div class="hashSearchIcon"></div>
                              <!--Only Show if Admin is logged in -->
                              <div class="adminSearchIcon"></div>
                          </div>
                          <div class="searchResults">
                              <p><span class="searchHash"></span>freestyle</p>
                              <p><span class="searchUser"></span>flipper_skate</p>
                              <!--Foreach for SearchResults-->
                          </div>
                      </div>

                      <!--FILTERMETHOD-->
                      <div class="generalFilterContainer">
                          <div class="generalFilter">
                              <p>Sort by:</p>
                              <form class="" action="index.html" method="post">
                                  <label for="">
                                      <input type="checkbox" name="name" value="">
                                      Recent
                                  </label>
                                  <label for="">
                                      <input type="checkbox" name="name" value="">
                                      Top
                                  </label>
                                  <label for="">
                                      <input type="checkbox" name="name" value="">
                                      Buddies
                                  </label>
                              </form>
                          </div>
                      </div>

          <?php endif; ?>
        </header>
