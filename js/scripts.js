//Hide the menu links and description of cards
$("#navmenu").hide();
$(".cardinfo").hide();
//Trigger animation for navigation bar
$(".header, .nav-social").addClass("animated fadeInDown");
//Hide the content
$(".post-container").hide();
//Show the content after navigation bar is displayed
$(".post-container").delay(1000).fadeIn(400);

//Listener to click event in the hamburger icon
$('#menu').on('click', menuAni);

//==============================================================================
//Function to load the hover effect in every card dinamically
//==============================================================================

var idImg = [];  //Array of image container IDs
var idCard = []; //Array of image IDs
var idInfo = []; //Array of info IDs


generateID(); //Calling the function that sets the ID dinamically

//Iterates the container array of IDs
for (var i = 0; i < idImg.length; i++) {
  //Calls the function for every "iteration as ID" in the container array
  hoverEffect(i);
}




//The function replaces X with the parameter acquired above when it's called
function hoverEffect(x){
  let info  = $('#'+idInfo[x]);
  let card  = $('#'+idCard[x]);
  let img = $('#'+idImg[x]);
  //Since the function generatedID includes the ID as a string, i just concatenate the ID with the selector
  //I do this for every ID handled in this function
  img.on({
    //stuff to do on mouse enter
      mouseenter: function () {
          card.delay(100).fadeOut(150);
          info.delay(250).fadeIn(0);
      },
      //stuff to do on mouse leave
      mouseleave: function () {
          info.fadeOut(0);
          card.fadeIn(150);
      }
  });
}


//==============================================================================
//Function to generate unique IDs to the card elements in HTML
//==============================================================================
function generateID(){

  //Create an array from the container class
  let $imgcontainer = Array.from($('.imgcontainer'));
  //Get the attribute "id" from the container so that it can add the ID
  let idsCont = $imgcontainer.map(imgcontainer => $(imgcontainer).attr('id'));

  //Create an array from the container class
  let $cardpreview = Array.from($('.cardpreview'));
  //Get the attribute "id" from the images so that it can add the ID
  let idsCard = $cardpreview.map(cardpreview => $(cardpreview).attr('id'));

  //Create an array from the info class
  let $cardinfo = Array.from($('.cardinfo'));
  //Get the attribute "id" from the images so that it can add the ID
  let idsInfo = $cardinfo.map(cardinfo => $(cardinfo).attr('id'));



  //Loop to .push the generated IDs into it's own array outside of the function scope
  for (let i = 0; i < idsCont.length; i++) {

    idImg.push(idsCont[i]);
    idCard.push(idsCard[i]);
    idInfo.push(idsInfo[i])
  }
}

//==============================================================================
//Function animate the menu and correct some spacing in lower resolution devices
//==============================================================================

function menuAni(){
    //First, i make sure the elements doesn't have the classes so that i can add later(triggering the animation)
    $("#menu").removeClass("rotate-center");
    $("#navmenu").removeClass("slide-in-left");

    //If the links are NOT visible (menu is deactivated)
    if(!$("#navmenu").is(":visible")){

        //If its resolution is lower than 550px
        if($(window).width()<550){
          //Before the links are displayed, remove the title
          $(".header-title").fadeOut(200);
          //Fix the margin for <550px && >400px to centralize the links
          $("#navmenu").css({"margin-right":"3em"});
          //If its resolution is lower than 400px
          if($(window).width()<400){
            //Fix the margin for <400px to centralize the links
            $("#navmenu").css({"margin-right":"2em"});
          }
        }
        //Add the class to the hamburger icon, triggering the animation
        $("#menu").addClass("rotate-center");
        //After 200ms, add the class to the links container, triggering the animation
        $("#navmenu").delay(200).addClass("slide-in-left");
        //The menis is not visible so it has to be faded in
        $("#navmenu").fadeIn(400);

        //If the links ARE visible (menu is activated)
    }else if($("#navmenu").is(":visible")){
        //If its resolution is lower than 550px
        if($(window).width()<550){
          //Show the title since the links are getting out
          $(".header-title").fadeIn(400);
          //Fix the margin for default to centralize the links
          $("#navmenu").css({"margin-right":"0"})
        };
        //Add the class to the hamburger icon, triggering the animation
        $("#menu").addClass("rotate-center");
        //Hide the links
        $("#navmenu").fadeOut(1).hide(100);
    }

}
