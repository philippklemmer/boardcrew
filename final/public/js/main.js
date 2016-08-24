$(function(){
//---------LANDINGPAGEn START-------------------------------------------------------------------------------------------

// function to fix the Jquery SlideUp method
    let scrollNavigation = function (){
        // Navigation Change to fixed on Landingpage
        let view = $(window),
            navigation = $(".fullscreenHeader .navbar"),
            header = $(".fullscreenHeader").height();


        let animateNavigationUp = function(){
            navigation.stop().removeClass("navigateFixed");
            navigation.removeAttr('style');
        }

        view.scroll(function(){
            //if scrolled pixel bigger then the height of the header element
            if(view.scrollTop() > header){
                navigation.addClass("navigateFixed ").slideDown(400);
            }
            //if scrolled pixel smaller then header height and the nav has the fixed class
            if(view.scrollTop() < header && navigation.hasClass("navigateFixed")){
                navigation.slideUp(200, animateNavigationUp);
            }
        });




    }
    //INIT SCROLL FUNCTION
    scrollNavigation();

    // SHOW | HIDE FORMCONTAINER ON LANDINGPAGE
    // Form Container
    let registerContainer   = $("#register"),
        loginContainer      = $("#login"),
        pwResetContainer    = $("#pw-reset"),
    //Buttons
        joinBtn         = $(".join-btn"),
        enterBtn        = $(".enter-btn"),
        loginOnRegister = $("#login-on-register"),
        registerOnLogin = $("#registerOnLogin"),
        pwRepeat        = $("#pwRepeat"),
        backToLogin     = $("#backToLogin");

    // FUNCTION FOR THE ELEMENT TO HIDE AND SHOW
    let showHideLanding = function ($target, $targetHide = null , $targetShow = null){
        $target.on("click touch", function(e){
            e.preventDefault();
            if($targetHide !== "null"){
                $targetHide.hide();
            }
            if($targetShow !== "null"){
                $targetShow.show();
            }
        });
    }
    // INIT
    // Register
    showHideLanding(joinBtn, "null", registerContainer);
    // Show Login if clicked on RegisterView
    showHideLanding(loginOnRegister, registerContainer , loginContainer);
    // Login
    showHideLanding(enterBtn, "null", loginContainer);
    // Show Register if clicked on LoginView
    showHideLanding(registerOnLogin, loginContainer, registerContainer);
    // Password Repeat
    showHideLanding(pwRepeat, loginContainer, pwResetContainer);
    //show LoginViewagain
    showHideLanding(backToLogin, pwResetContainer, loginContainer);

    //hide if clicked out of div
    $(document).mouseup(function (e){
        let container = $(".landing-form-container");

        if (!container.is(e.target) && container.has(e.target).length === 0){
            registerContainer.hide();
            loginContainer.hide();
            pwResetContainer.hide();
        }
    });

//---------LANDINGPAGE  END-------------------------------------------------------------------------------------------
//---------TIMELINE  START-------------------------------------------------------------------------------------------

// ADDPOSTCONTAINER IMAGE/VIDEO URL SHOW/HIDE START -------------------------------------------------------------------------------------------
    let addPostContainer    = $(".addPostContainer"),
        postChooseContainer   = $(".postChooseContainer"),
        imgContainer   = $(".imgContainer"),
        videoContainer = $(".videoContainer"),
        swapItem       = $(".swapItem"),
        //ChildSelector
        videoUrlActive  = $(".chooseVideoUrlActive"),
        inputFileData = $(".custom-file-upload input"),
        $imgUploadFileInput = $(".fileInput");

    // Init
    imgContainer.on("change", function(){
        //get the inputFile value to let the user know which input it selected
        $inputFileData = inputFileData[0].value.split("\\");
        $inputFileData = $inputFileData[2];
        if($inputFileData !== "" || $inputFileData !== "undefined"){
            $imgUploadFileInput.text("Selected: "+ $inputFileData);
            imgContainer.css({padding:"41px 0"});
        }
        inputFile($(this));
    });
    videoContainer.on("click touch", function(){
        inputFile($(this));
    });
    //swapItem = Blue Arrow
    swapItem.on("click touch", function(){
        rebootInterface();
    });
    // Funktion zum zeigen und verstecken der ausgwählten elemente
    let inputFile = function(input){
        // Funktion, welcher Container wurde ausgewählt und wird fullscreen angezeigt
        let decideWhichInput = function(hideObject, showObject){
            hideObject.hide();
            showObject.css({width:"calc(95%)"}).addClass("active");
            swapItem.css({display:"flex"});
        }
        // wenn ein Foto hochgeladen werden soll
        if(input[0].className == "imgContainer"){
            decideWhichInput(videoContainer, imgContainer);
            imgContainer.css({marginRight: "5%"});
        }
        // wenn eine VideoUrl gespeichert werden soll
        if(input[0].className == "videoContainer"){
            decideWhichInput(imgContainer, videoContainer);
            videoContainer.css({
                padding:"29px 0",
                margin: "0 5% 0 0"
            });
            videoUrlActive.css({
                display: "block",
                margin: "0 auto",
                width: "100%"
            });

        }
    }
    //Funktion damit sich die interfaces wieder zurücksetzen und auch die Daten die dort eingegeben wurden
    let rebootInterface = function(){
        that = postChooseContainer.find(".active");
        if(that[0].className == "imgContainer active"){
            if($inputFileData == ""){
                that.removeAttr('style', 'class').removeClass('active');
                swapItem.css({display:"none"});
                videoContainer.css({display:"inline-block"});
            }else{
                showAlertBox("Are you sure to delete your entrys?", "press yes if you want to use an URL", addPostContainer);
                timelineSaftyQuery(
                    function(){
                        inputFileData[0].value = "";
                        $imgUploadFileInput.text("");
                        $inputFileData = "";
                        rebootInterface();
                        $(".securityCheck").hide();
                    },
                    function(){
                        $(".securityCheck").hide();
                    }
                );
            }
        }
        // if videoIMage was clicked decide
        if(that[0].className == "videoContainer active"){

            videoFileInput = $("input[name='videoUrl']");
            // if the value is empty so go back the normal status or
            if(videoFileInput[0].value == ""){
                that.removeAttr('style', 'class').removeClass('active');
                swapItem.css({display:"none"});
                imgContainer.css({display:"inline-block"});
                videoUrlActive.css({display:"none"});
            // it's not empty and do the saftyquery
            }else{
                showAlertBox("Are you sure to delete your entrys?", "press yes if you want to use an URL", addPostContainer);
                timelineSaftyQuery(
                    function(){
                        //iwie super buggy
                        videoFileInput[0].value ="";

                        that.removeAttr('style', 'class').removeClass('active');
                        swapItem.css({display:"none"});
                        imgContainer.css({display:"inline-block"});
                        videoUrlActive.css({display:"none"});
                        $(".securityCheck").hide();
                    },
                    function(){
                        $(".securityCheck").hide();
                    }
                );
            }
        }
    }
    //showing/building the SaftyQuery-Layout
    let showAlertBox = function(headline, paragraph, aim){
        if($(".securityCheck").is(":visible") !== true ){
            $("<div class='securityCheck'><h4>" + headline + "</h4><div class='resetEntrys'><a href=''>Yes</a></div><div class='stayWithEntrys'><a href=''>No</a></div></div>").appendTo(aim);
        }
    }
    // checking if the alertbox return true or false
    let timelineSaftyQuery = function(successFunction, failFunction){
        $(".securityCheck").children().on("click touch", function(){
            event.preventDefault();
            if($(this)[0].innerText == "Yes"){
                successFunction();
            }else{
                failFunction();
            }
        });
    }
    // hide the ADDPOSTCONTAINER
    $(".postExitBtn").on("click touch", function(){
        addPostContainer.hide();
    });

// ADDPOSTCONTAINER IMAGE/VIDEO URL SHOW/HIDE START -------------------------------------------------------------------------------------------

// INIT THE BUTTONS TO SLIDE DOWN AND UP, OR POPUP AND HIDE
    //btns
    let logo = $("#logo"),
        filterBtn = $("#filter"),
        searchBtn = $("#search"),
        menuBtn = $("#menu"),
        view = $(window),
        // links to btns
        filterContainer = $(".generalFilterContainer"),
        searchContainer = $(".searchBarContainer"),
        menuContainer = $(".menuContainer");
    //scroll back to top
    let scrollToTopOrIndex = function ($click){
        $click.on("click touch", function(){
            event.preventDefault();
            if(view.scrollTop() > 0){
        		$('body,html').animate({
        			scrollTop: 0
                }, 600);
            }else{
                if(window.location == "index"){
                    window.location.replace("index");
                }else{
                    if(window.location != "timeline"){
                        window.location.replace("timeline");
                    }
                }

            }
    	});
    }
    //index scroll top
    scrollToTopOrIndex($("#indexLogoSmall"));
    //timeline scroll top
    scrollToTopOrIndex(logo);

    let hideShowOptions = function($action, $linkContainer){
        flag = 0;
        $action.on("click touch", function(){
            if(flag !== 1){
                $linkContainer.show();
                flag = 1;
            }else{
                $linkContainer.hide();
                flag = 0;
            }

        });
    }
    hideShowOptions(filterBtn, filterContainer);

    let swipeMenu = function (){
        flag = 0;
        menuBtn.on("click touch", function(e){
            console.log(e);
            if(flag == 0){
                flag++
                menuContainer.css({display: "block"});
                menuContainer.stop().animate({
                    "left": "0px"
                },500);
            }else{
                flag--
                menuContainer.stop().animate({
                    "left": "-" + menuContainer.outerWidth()
                },500);
                menuContainer.css({display: "block"});
            }
        });
    }
    swipeMenu();


/*
TODO
Menu -> menuslider also with on smartphones with touchSlides
using same functions for both slide up and downs
Filter -> filterSlide down and up
Search -> searchSlidedown and up
Logo -> SlideUp to Top
AddButton -> open Userinterface to add a new post
    -> animate the decisision between img and video url
LoadingBar -> Animate the loadingbar from left to right, adjusted to the loadingstatus
*/
//---------TIMELINE  END-------------------------------------------------------------------------------------------

});
