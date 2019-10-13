$(".addPost").hide();

$('#addPost').on('click', addPost);

function addPost(){
  if($(".addPost").is(':visible')){
    $(".addPost").fadeOut(100);
  }else{
    $(".addPost").fadeIn(100);
  }
}
