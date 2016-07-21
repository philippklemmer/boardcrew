$(function(){
//---------LANDINGPAGEn START-------------------------------------------------------------------------------------------

// function to fix the Jquery SlideUp method
    function scrollNavigation(){
        // Navigation Change to fixed on Landingpage
        let view = $(window);
        let navigation = $(".fullscreenHeader .navbar");
        let header = $(".fullscreenHeader").height();

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
    let registerContainer   = $("#register");
    let loginContainer      = $("#login");
    let pwResetContainer    = $("#pw-reset");
    //Buttons
    let joinBtn         = $(".join-btn");
    let enterBtn        = $(".enter-btn");
    let loginOnRegister = $("#login-on-register");
    let registerOnLogin = $("#registerOnLogin");
    let pwRepeat        = $("#pwRepeat");
    let backToLogin     = $("#backToLogin");

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
    var container = $(".landing-form-container");

    if (!container.is(e.target) && container.has(e.target).length === 0){
        registerContainer.hide();
        loginContainer.hide();
        pwResetContainer.hide();
    }
});

//---------LANDINGPAGE  END-------------------------------------------------------------------------------------------
//---------TIMELINE  START-------------------------------------------------------------------------------------------

/*
TODO
Menu -> menuslider also with on smartphones with touchSlides
using same functions for both slide up and downs
Filter -> filterSlide down and up
Search -> searchSlidedown and up
Logo -> SlideUp to Top
AddButton -> open Userinterface to add a new post
LoadingBar -> Animate the loadingbar from left to right, adjusted to the loadingstatus
*/
//---------TIMELINE  END-------------------------------------------------------------------------------------------

});
