$("#navmenu").hide();
$(".post-container").hide();
$(".header, .nav-social").addClass("animated fadeInDown");
$(".post-container").delay(1000).fadeIn(400);




$('#menu').bind('click', menuAni);

function menuAni(){
    $("#menu").removeClass("rotate-center");
    $("#navmenu").removeClass("slide-in-left");

    if(!$("#navmenu").is(":visible")){

        if($(window).width()<550){
          $(".header-title").fadeOut(200);
          $("#navmenu").css({"margin-right":"3em"});
          if($(window).width()<400){
            $("#navmenu").css({"margin-right":"2em"});
          }
        }

        $("#menu").addClass("rotate-center");
        $("#navmenu").delay(200).addClass("slide-in-left");
        $("#navmenu").fadeIn(400);




    }else if($("#navmenu").is(":visible")){
        if($(window).width()<550){
          $(".header-title").fadeIn(400);
          $("#navmenu").css({"margin-right":"0"})
        };

        $("#menu").addClass("rotate-center");
        $("#navmenu").fadeOut(1).hide(100);

    }

}
