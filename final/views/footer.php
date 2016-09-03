<?php if($_GET['url'] == "index"): ?>
    <!--Footer on the landingpage-->
    <footer>
        <div id="footer-left">
            <p id="privacy">Privacy</p>
            <p id="termsOfUse">Terms</p>
        </div>
        <div id="footer-right">
            <p>© 2016 Board Crew</p>
        </div>
    </footer>
<?php elseif($_GET['url'] == "timeline" || $_GET['url'] == "profil" || $_GET['url'] == "timeline"): ?>


    <!--Add another Post-->
    <div class="addPostContainer">
        <form class="" action="index.html" method="post">

            <input class="postTitle" type="text" name="postTitle" value="" placeholder="Enter your title in here..." />
            <span class="postExitBtn"></span>

            <div class="postChooseContainer">
                <!--Custom FileUpload-->
                <div class="imgContainer">
                    <label class="custom-file-upload">
                        <input type="file"/>
                    </label>
                    <span class="chooseImg"></span>
                    <span class="fileInput"></span>
                </div>
                <!--Custom VideoUrl upload-->
                <div class="videoContainer">
                    <span class="chooseVideoUrl"></span>
                    <div class="chooseVideoUrlActive">
                        <p>Youtube URL</p>
                        <input type="input" name="videoUrl" value="">
                    </div>

                </div>
                <!-- if one type is selected then show another icon to swap between these two-->
                <p class="swapItem"></p>
                <!--selecting the drivingstyle-->
            </div>
            <div class="postChooseMainTags">
                <p>Choose your style</p>
                <div class="radioprefix">
                    <input type="radio" name="danceStyle" value="">
                    <label for="dancingStyle">#dancing</label>
                    <input type="radio" name="danceStyle" value="">
                    <label for="downhillStyle">#downhill</label>
                    <input type="radio" name="danceStyle" value="">
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




<?php endif; ?>

<!--Scripts einbinden-->
<!-- doing a loop for scripts to get fewest amount of code -->
<script type="text/javascript" src="<?=URL?>public/js/jquery-3.0.0.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/main.js"></script>
    </body>
</html>
