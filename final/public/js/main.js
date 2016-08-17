$(function(){
//---------LANDINGPAGEn START-------------------------------------------------------------------------------------------

// function to fix the Jquery SlideUp method
    function scrollNavigation(){
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
    function showHideLanding($target, $targetHide = null , $targetShow = null){
        $target.on("click touch tap", function(e){
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

    //AddPostContainer Imgae/Video Url show/hide

    let postChooseContainer   = $(".postChooseContainer"),
        imgContainer   = $("#imgContainer"),
        videoContainer = $("#videoContainer"),
        swapItem       = $("#swapItem"),
        //ChildSelector
        videoUrlInput  = $("input[name='videoUrl']");


    // Init
    imgContainer.on("change", function(){
        inputFile($(this));
    });
    videoContainer.on("click tap", function(){
        inputFile($(this));
    });
    //swapItem = Blue Arrow
    swapItem.on("click tap", function(){
        rebootInterface();
    });
    // Funktion zum zeigen und verstecken der ausgwählten elemente
    let inputFile = function(input){
        // Funktion, welcher Container wurde ausgewählt und wird fullscreen angezeigt
        let decideWhichInput = function(hideObject, showObject){
            hideObject.hide();
            showObject.css({width:"calc(95% - 2px)"}).addClass("active");
            swapItem.css({display:"flex"});
        }
        // wenn ein Foto hochgeladen werden soll
        if(input[0].id == "imgContainer"){
            decideWhichInput(videoContainer, imgContainer);

        }
        // wenn eine VideoUrl gespeichert werden soll
        if(input[0].id == "videoContainer"){
            decideWhichInput(imgContainer, videoContainer);
            videoContainer.css({padding:"38px 0"});
            videoUrlInput.css({
                display: "block",
                margin: "0 auto",
                width: "50%"
            });

        }
    }
    //Funktion
    let rebootInterface = function(){
        that = postChooseContainer.find(".active");
        that.removeAttr('style').toggleClass("active");
        swapItem.css({display:"none"});

        if(that[0].id = "imgContainer"){
            videoContainer.css({display:"inline-block"});
        }
        if(that[0].id = "videoContainer"){
            imgContainer.css({display:"inline-block"});
            videoUrlInput.css({display:"none"});
        }
    }


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
