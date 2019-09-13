$("#navmenu").hide();
$(".post-container").hide();
$(".header, .nav-social").addClass("animated fadeInDown");
$(".post-container").delay(1000).fadeIn(400);




$("#menu").click(function(){
  if(!$("#navmenu").is(":visible")){

    $("#menu").toggleClass("rotate-center");
    $("#navmenu").toggleClass("slide-in-left");
    $("#navmenu").fadeIn(400);

  }else{
    $("#menu").toggleClass("rotate-center");
    $("#navmenu").toggleClass("slide-out-left");
  }
});
