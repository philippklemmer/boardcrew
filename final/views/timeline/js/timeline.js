//ajax calls for the timeline

//selecting inputs
var $filterBtn = $(".generalFilter form label input");

$filterBtn.on("click touch", function(){
        //this = radio button
        var $filterValue = $(this).val();
        // change the data-sort to the active radionbtn value
        $(".timelineWrapper").attr('data-sort', $filterValue);

        $.ajax({

            url: "xhr/filterTimeline/" + $filterValue,
            data: {'auth': 'abc'},
            method: 'POST'

        }).done(function(data){
            if(data == "false"){
                    console.log("amk");
            }else{
                $(".timelineWrapper").html(data);

            }


        }).fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus);
            });
});

/**
*
*  load more posts, depending on which filter is on, while scrolling
*/

$(window).scroll(function(){

    //position of the last post
    var $lastpost = $(".timelineWrapper .posts").last();
    var distance = $lastpost.offset().top;
    var beforeLastElementHeight = $(".timelineWrapper .posts:last").prev("section").outerHeight();
    //if the scrollposition is 300 px before the
    if(  $(window).scrollTop() + 1000 >=  distance ){
        // select active filtervalue
        var filter = $(".timelineWrapper").attr('data-sort');
        //count length of posts
        var count = $(".timelineWrapper .posts").length + 1;
        $.ajax({

            url: "xhr/filterTimeline/" + filter + '/' + count,
            data: {'auth': 'abc'},
            method: 'POST'

        }).done(function(data){
            console.log(data);
            if(data == "false"){
                console.log("There is no data");
            }else{
                //insert data into the views
                $(".timelineWrapper").html(data).stop();

            }

        }).fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus);
            });
    }
});

//like the posts and refreshing the posts
var likeBtn = $(".timelineWrapper .heart");
$("body").on("click touch", '.heart' , function(){

    //get the id of the post
    var id = $(this).attr('data-count');

    $.ajax({

        url: "xhr/likePost/" + id,
        data: {'auth': 'abc'},
        method: 'POST'

    }).done(function(data){
        if(data == "false"){
            console.log("Data is not goodii");
        }

    });

});
