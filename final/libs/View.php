<?php

class View {
    
    // Extra data of view
    private $view_data;

    // Get extra view data
    public function getData() {
        return $this->view_data;
    }

    // Set extra view Data
    public function setData($data) {
        $this->view_data = $data;
    }

    function render($name, $nav = null, $footerPartial = null){
        
        require_once 'views/partials/header.php';
        //if user is on view where he is logged in 
        if($nav === "loggedIn"){
            require_once 'views/partials/loggedInNav.php';
        }
        //if there is or there is not another navpartial for the view
        if($nav !== null){
            require_once "views/$name/inc/nav.php";
        }
        
        require_once "views/$name/index.php";
        //if there is or there is not another footerpartial for the view
        if($footerPartial !== null){
            require_once "views/$name/inc/footer.php";
        }
        
        require_once 'views/partials/footer.php';
    }
    
    /**
     * Rendering the html for the timeline
     */
    public function renderTimeline(){
        //decide if the url = timeline || user
        $result = $this->getData();
        if(array_key_exists("profileData", $result) === (bool)FALSE){
            $data = $this->getData();
        }else{
            $data = $this->getData()["posts"];    
        }
        foreach($data as $key => $value):
            ?>
            <section class="posts">
                            <div class="postHeader">
                                <div class="profilImg"></div>
                                <div class="postTextContainer">
                                    <h4><a href="<?= URL ."user/profile/" .$value["user_username"] ?>" ><?= $value["user_username"] ?></a></h4>
                                    <span class="circleSeperator"></span>
                                    <span class="timeAgo"><?= Time::setTime($value["posts_date"]) ?></span>
                                    <p class="comment">
                                        <?= $value["posts_title"] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="postMain">


                                <?php if ($value["posts_mediaPathCheck"] == "1"): ?>
                                    <div class="vidOrImg">
                                        <img src="<?= "/public/img/userFiles/" . $value["user_username"] . "/" . $value["posts_mediaPath"] ?>" alt="" />
                                    </div>
                                <?php else: ?>
                                    <iframe width="420" height="315" frameborder="0" allowfullscreen src="<?= $value["posts_mediaPath"] ?>"></iframe>
                                <?php endif; ?>
                                    <div class="likeCountContainer">
                                        <span class="heart" data-count="<?= $value["posts_id"] ?>" ></span>
                                        <p class="likeCount">
                                <?php 
                                    if(isset($value[0][0]["likes"])){
                                        echo ($value[0][0]["likes"] !== "0") ? $value[0][0]["likes"] : $value[0][0]["likes"] = "LIKE"; 
                                    }else{
                                        echo "LIKE";
                                    }
                                        
                                    
                                
                                
                                ?>
                                        </p>
                                    </div>
                                    <div class="postTags">
                                        <a href="#"><span>#</span><?= $value["posts_mainTag"] ?></a>,
                                <?php if (isset($value["posts_additionaltags"][$key][0])): ?>
                                        <a href="#"><span>#</span><?= $value["posts_additionaltags"][$key][0] ?></a>
                                <?php elseif (isset($value["posts_additionaltags"][$key][1])): ?>
                                        ,<a href="#"><span>#</span><?= $value["posts_additionaltags"][$key][1] ?></a>
                                <?php endif; ?>

                                </div>
                            </div>
                        </section>
                <?php
        endforeach;
    }
    /**
     * Render the Profile of the User
     */
    public function renderUserProfile(){
        
        foreach($this->getData()["profileData"] as $value):  ?>

           <!--UserProfileHeader-->
        <div class="UPHeader">
            <div class="UPHeaderImg" style="background:<?= (isset($value["profile_backgroundImg"])) ? $value["profile_backgroundImg"] : "" ?>;">
                <span>
                    <?php if(empty($value["profile_profileImg"])): // if user has no profileImage build an own image with the first letter of his name ?>
                        <div class='noImage'><?= strtoupper($value["user_username"][0]) ?></div>
                    <?php else: ?>
                        <img src="<?= "/public/userFiles/" . $value["user_username"] ."/". $value["profile_profileImg"] ?>" alt="<?= (isset($value["profile_profileImg"])) ? $value["user_username"] . "'s Profil Image" : ""  ?>" />
                    <?php endif; ?>
                </span>
            </div>
            <div class="UPMain" style="padding-bottom:20px;">
                <p>
                    <?= $value["user_username"] ?>
                </p>
                <span><?= $value["following"][0][0]["followedUser"] ?><span> Following</span></span>
                <span>|</span>
                <span><?= $value["following"][1][0]["followingUsers"]?> <span> Followers</span></span>
                <?php if($value["user_id"] == Session::get("id_user")): ?>
                    <div class="editProfile" ><a href="<?= URL ?>userbackend">Edit your Profile</a></div>
                <?php else: ?>
                    <div class="followUser"><a href="" data-user="<?= $value['user_id'] ?>">Follow</a></div>
                <?php endif; ?>
            </div>
            <?php if($value["profile_gender"] != "" && $value["profile_style"] != "" && $value["profile_country"] != "" && $value["profile_city"] != "" ): ?>
                <style>.UPMain{padding-bottom:0;}</style>
                <!-- additionalInformationsContainer only showing if the user has enter the informations-->
                <div class="additionalInfomartionsContainer">
                    <span class="selfDecidingArrow"></span>
                    <div class="additionalInformations">
                        <h4>About</h4>
                        <p>
                            I love to <span><?= $value["profile_style"] ?></span> with my board,
                        </p>
                        <p>
                            I am from <span><?= $value["profile_country"] ?></span> and i live in <span><?= $value["profile_city"] ?></span>.
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach;
    }
    
}