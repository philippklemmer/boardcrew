// Js for the user

//follow the user
var followButton = $(".followUser a");

followButton.on("click touch", function(){
    event.preventDefault();

    $userId = $(this).attr('data-user');

    $.ajax({

        url: URL + "xhr/followUser/" + $userId,
        data: {'auth': 'abc'},
        method: 'POST'

    }).done(function(data){
        if(data == "this user is not in your friendlist"){
            $("#successMessageItem").text('Your unfollow');
            $(".successmessageContainer").toggleClass('visibleSuccess');
            setTimeout(function(){
                $(".successmessageContainer").removeClass('visibleSuccess');
                $(".successmessageContainer").css({opacity: 0});
            },2000);

        }

        // if the user followed allready, this function checks if the user wants to unfollow
        if(data == 'this user is allready in your friendlist'){
            $(".securityCheckContainer").addClass('visible');
            $(".securityCheck .resetEntrys a").on('click touch', function(){
                $.ajax({
                    url: URL + 'xhr/unfollowUser/' + $userId,
                    data: {'auth': 'abc'},
                    method: 'POST'
                }).done(function(data){

                });
            });
            $(".securityCheck .stayWithEntrys a").on("click touch", function(){
                event.preventDefault();
                $(".securityCheckContainer").removeClass('visible');
            });

        }

    });
});
