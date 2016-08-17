<!--MAIN CONTEN -> Post on Timeline-->
<div id="timelineWrapper">
    <section class="">
        <div class="postHeader">
            <div class="profilImg"></div>
            <div class="postTextContainer">
                <h4>Philipp Klemmer</h4>
                <span class="circleSeperator"></span>
                <span class="timeAgo">14min</span>
                <p class="comment">
                    Smooth raw run from teamrider @pieter.daenen 👌 Hope you all are enjoying the lovely weather as we are.
                </p>
            </div>
        </div>
        <div class="postMain">
            <!--Video oder Image-->
            <!--Check if Video or Image-->
            <div class="vidOrImg"></div>
            <div class="likeCountContainer">
                <span class="heart"></span>
                <p class="likeCount">Like</p>
            </div>
            <!--Foreach for the tags-->
            <div class="postTags">
                <a href="#"><span>#</span>longboard</a>,
                <a href="#"><span>#</span>star</a>,
                <a href="#"><span>#</span>dancing</a>,
            </div>
        </div>
    </section >
    <section class="">
        <div class="postHeader">
            <div class="profilImg"></div>
            <div class="postTextContainer">
                <h4>Philipp Klemmer</h4>
                <span class="circleSeperator"></span>
                <span class="timeAgo">14min</span>
                <p class="comment">
                    Smooth raw run from teamrider @pieter.daenen 👌 Hope you all are enjoying the lovely weather as we are.
                </p>
            </div>
        </div>
        <div class="postMain">
            <!--Video oder Image-->
            <!--Check if Video or Image-->
            <div class="vidOrImg"></div>
            <div class="likeCountContainer">
                <span class="heart"></span>
                <p class="likeCount">Like</p>
            </div>
            <!--Foreach for the tags-->
            <div class="postTags">
                <a href="#"><span>#</span>longboard</a>,
                <a href="#"><span>#</span>star</a>,
                <a href="#"><span>#</span>dancing</a>,
            </div>
        </div>
    </section >

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
<!--TODO adding POSTCONTAINER, -BTN AND LOADINGBAR-->
    <!--Add another Post-->
    <div class="addPostContainer">
        <form class="" action="index.html" method="post">
            <input id="postTitle" type="text" name="postTitle" value="" placeholder="Enter your title in here...">
            <span id="postExitBtn"></span>
            <!-- Choose between Img and Video Url , TODO build js animations -->
            <div class="postChooseContainer">
                <div id="imgContainer">
                    <label class="custom-file-upload">
                        <input type="file"/>
                    </label>
                    <span id="chooseImg"></span>
                    <span id="fileInput"></span>
                </div>
                <!--Preview Image with js-->
                <!-- $('your_selector').‌​attr('src', window.URL.createObj‌​ectURL(this.files[0])‌​) -->

                <div id="videoContainer">
                    <span id="chooseVideoUrl"></span>
                    <input type="text" name="videoUrl" value="">
                </div>
                <!-- if one type is selected then show another icon to swap between these two-->
                <p id="swapItem"></p>
                <!--selecting the drivingstyle-->
            </div>
            <div class="postChooseMainTags">
                <p>Choose your style</p>
                <div>
                    <input type="checkbox" name="dancingStyle" value="">
                    <label for="dancingStyle">#dancing</label>
                    <input type="checkbox" name="downhillStyle" value="">
                    <label for="downhillStyle">#downhill</label>
                    <input type="checkbox" name="freestyleStyle" value="">
                    <label for="freestyleStyle">#freestyle</label>
                </div>
            </div>

            <input type="text" name="addAdditionalTags" value="" placeholder="Add additional tags to your post...">
            <input type="submit" name="name" value="Post">
        </form>
    </div>
    <!--Btn to add another Post for your profile-->
    <div class="addPostBtn"></div>
    <!--LoadingBar trought the screen TODO -> adding js for the animation-->
    <div class="loadingBar"></div>
</div>
