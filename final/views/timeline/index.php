<!--MAIN CONTEN -> Post on Timeline-->

<section class="container-fluid">
    <div class="contentHeader">
        <div class="profilImg"></div>
        <h4></h4>
        <span class="seperator"></span>
        <span class="timeAgo"></span>
        <p class="comment"></p>
    </div>
    <div class="mainContent">
        <!--Video oder Image-->
        <!--Check if Video or Image-->
        <div class="vidOrImg"></div>
        <div class="likeCountContainer">
            <span class="heart"></span>
            <p class="likeCount"></p>
        </div>
        <!--Foreach for the tags-->
        <div class="postTags"><p></p></div>
    </div>
</section >

<!-- JS COMPONENTS -> TIMELINE SLIDE DOWN IF THEY GOT CLICKED-->
<!--MENU-->
<!--Swipe from left left to right or right to left-->
    <div class="menuContainer">
        <div class="menuHeader">
            <img class="profileImg" src="" alt="" />
            <p class="username"></p>
        </div>
        <div class="menuMain">

                <span class="userprofileIcon"></span>
                <p><a href="#">UserProfile</a></p>

                <span class="editProfileIcon"></span>
                <p><a href="#">UserBackend</a></p>
        </div>
        <a href="#">Logout</a>
    </div>
<!--SearchBar-->
<!--Using the filterIcons to filter the output given with AJAX-->
<div class="searchBarContainer">
    <form class="" action="index.html" method="post">
        <input type="text" name="searchInput" value="Tap here to search...">
    </form>
    <div class="userFilterContainer">
        <div class="generalSearchIcon"></div>
        <div class="userSearchIcon"></div>
        <div class="hashSearchIcon"></div>
        <!--Only Show if Admin is logged in -->
        <div class="adminSearchIcon"></div>
    </div>
    <div class="searchResults">
        <!--Foreach for SearchResults-->
    </div>
</div>

<!--FILTERMETHOD-->
<div class="generalFilterContainer">
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

<!--Add another Post-->
<div class="addPost"></div>
<!--LoadingBar trought the screen-->
<div class="loadingBar"></div>
