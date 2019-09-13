$("#navmenu").hide();
$(".header, .nav-social").addClass("animated fadeInDown");




$("#menu").click(function(){
  if(!$("#navmenu").is(":visible")){

    $("#menu").toggleClass("rotate-center");
    $("#navmenu").toggleClass("slide-in-left");
    $("#navmenu").fadeIn(400);

  }else{
    $("#menu").toggleClass("rotate-center");
    $("#navmenu").toggleClass("slide-out-left");
    // $("#navmenu").fadeOut(400);

  }
});
