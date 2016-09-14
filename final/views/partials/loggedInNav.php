
<header>
<!--    If User is LoggedIn TODO IF USER IS LOGGED IN, TEMPORARELY ONLY IF PAGE ON TIMELINE AND SO ON  -->
    <nav id="loggedinNav" class="navbar">
      <div class="container-fluid">
          <ul>
              <li id="logo" class="navbar-"></li>
              <ul class="navbar-right">
                  <?php if($_GET['url'] !== "search"):?>
                    <li id="filter"></li>
                  <?php endif;?>
                  <li id="search"></li>
                  <li id="menu" ></li>
              </ul>
          </ul>
      </div>
    </nav>
</header>

<!-- JS COMPONENTS -> TIMELINE SLIDE DOWN IF THEY GOT CLICKED-->
<!--MENU-->
<div class="menuContainer">
    <div class="menuHeader">
        <img class="profileImg" src="/public/img/testThumnail.png" alt="" />
        <p class="username">Philipp Klemmer</p>
    </div>
    <div class="menuMain">
        <div>
            <p><a href="<?=URL?>timeline"><span class="timelineIcon"></span>Timeline</a></p>
            <p><a href="<?=URL?>user"><span class="userprofileIcon"></span>Profile</a></p>
            <p><a href="<?=URL?>userbackend"><span class="editProfileIcon"></span>Edit</a></p>
        </div>

    </div>
    <div class="menuFooter">
        <a href="<?= URL ?>index/logout">Logout</a>
    </div>
</div>

<!--SearchBar-->
<!--Using the filterIcons to filter the output given with AJAX-->
<div class="searchBarContainer showHide">
    <form class="" action="index.html" method="post">
        <input type="text" name="searchInput" value="" placeholder="Tap here to search...">
    </form>
    <div class="userFilterContainer">
        <div class="generalSearchIcon"></div>
        <div class="userSearchIcon"></div>
        <div class="hashSearchIcon"></div>
<!--        Only Show if Admin is logged in -->
        <div class="adminSearchIcon"></div>
    </div>
<!--     <div class="searchResults">
        <p><span class="searchHash"></span>freestyle</p>
        <p><span class="searchUser"></span>flipper_skate</p>
        Foreach for SearchResults   
    </div> -->
</div>


