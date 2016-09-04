$(function(){
//---------LANDINGPAGEn START-------------------------------------------------------------------------------------------

// function to fix the Jquery SlideUp method
    let scrollNavigation = function (){
        // Navigation Change to fixed on Landingpage
        let view = $(window),
            navigation = $(".fullscreenHeader nav"),
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
                $targetHide.css({display:"none"});
            }
            if($targetShow !== "null"){
                $targetShow.css({display:"block"});
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

    //showing Terms of us and Privacy Terms
    var privacyBtn = $("#privacy"),
        termBtn = $("#termsOfUse"),
        privacyBackBtn = $("#privac.termsContainer") ,
        termsBackBtn = $("#term.termsContainer");


    let showHideTerms = function($btn, $secondBtn,$element){

        $btn.add($secondBtn).on("click touch", function(){
            $element.toggleClass('termShow');
        });
    }
    showHideTerms(privacyBtn, privacyBackBtn, privacyBackBtn);
    showHideTerms(termBtn, termsBackBtn, termsBackBtn);

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
    addPostBtn = $(".addPostBtn")
    //show addPostContainer
    addPostBtn.on("click touch", function(){
        addPostContainer.css({display:"flex"});
    });

    //Hide Element if the clode button gets clicked or somewhere around the box -> see also 287+
    $(".postExitBtn").on("click touch", function(){
        addPostContainer.removeAttr('style');
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

    // Animations On/Off Toggling CSS§ Transition
    let onOffAnimation = function($controller, $movedObject, $class){

        $controller.on("click touch", function(){
            $movedObject.toggleClass($class);
            if($controller === menuBtn ){
                menuBtn.toggleClass('open');
            }
        });
    }
    // Logged Filter & Searchbar
    onOffAnimation(filterBtn, filterContainer, "toggleUp");
    onOffAnimation(searchBtn, searchContainer, "toggleUp");
    // Logged Menu
    onOffAnimation(menuBtn, menuContainer, "toggleSide");







/*
TODO
LoadingBar -> Animate the loadingbar from left to right, adjusted to the loadingstatus
*/
//---------TIMELINE  END-------------------------------------------------------------------------------------------

//---------Userprofile  Start-------------------------------------------------------------------------------------------

let arrow = $(".selfDecidingArrow");
let additionalInfomartionsContainer = $(".additionalInformations");
arrow.on("click touch", function(){
    arrow.toggleClass('rotateArrow');
    additionalInfomartionsContainer.parent("div").css({paddingBottom:"20px"});
    additionalInfomartionsContainer.slideToggle('400', function(){});
});




//---------Userprofile  End-------------------------------------------------------------------------------------------
//---------Userbackend  Start-------------------------------------------------------------------------------------------

//Userbackend height on huge screens
if($("html").height() > $("body").height()){
    $("body").height($("html").height());

}


let pwCheckContainer = $(".pwCheck");
let pwCheckInput = $("#pwCheck");
let pwCheckSubmit = $(".pwCheck").find('input[type="submit"]');
let pwCheckCloseBtn = $(".pwCheck span");

//TODO AJAX and close smoothly the box and continue writing the new email
pwCheckInput.add(pwCheckSubmit).add(pwCheckCloseBtn).on("click touch", function(){
    pwCheckContainer.toggleClass("showUpCheck");
});


//---------Userbackend  End-------------------------------------------------------------------------------------------

//---------Additional Elements belong to each side Start-------------------------------------------------------------------------------------------

// Hiding Elements if the user clicks outside the box
//hide if clicked out of div
$(document).mouseup(function (e){
    let container = $(".landing-form-container");
    let addPostContainerForm = $(".addPostContainer form");

    //IndexFormular
    if (!container.is(e.target) && container.has(e.target).length === 0){
        registerContainer.hide();
        loginContainer.hide();
        pwResetContainer.hide();
    }
    // AddPostContainer
    if (!addPostContainerForm.is(e.target) && addPostContainerForm.has(e.target).length === 0 && !$(".resetEntrys").is(e.target) && !$(".stayWithEntrys").is(e.target) && !$(".resetEntrys a").is(e.target) && !$(".stayWithEntrys").is(e.target)){
        addPostContainer.hide();
    }

    //Function to hide elements triggering with buttons
    /*
        $input -> Object itself
        $classCheck -> togglingClass for CSS3 Animation
        $input -> the button can also be used to close the object
    */
    var hideingOutOfBox = function ($input, classCheck, $btnCheck ){
        //console.log(e.target);
        //console.log($("#nav-icon span:nth-child(1)")[0]);
        if($input.hasClass(classCheck)){
            if($btnCheck.is(e.target)){
                $input.toggleClass(classCheck);
            }
            if (!$input.is(e.target) && $input.has(e.target).length === 0 ){
                $input.toggleClass(classCheck);
            }
        }
    }
    //Menu
    hideingOutOfBox(menuContainer, "toggleSide", menuBtn);
    //Searchbar
    hideingOutOfBox(searchContainer, "toggleUp", searchBtn);
    // Filterbar
    hideingOutOfBox(filterContainer, "toggleUp", filterBtn);
    // userbackend check input
    hideingOutOfBox(pwCheckContainer.parent(), "showUpCheck", filterBtn);
});




});
