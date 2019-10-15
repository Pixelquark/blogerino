$(".addPost").hide();
// $(".remPost").hide();

$('#addPost').on('click', addPost);
$('#remPost').on('click', remPost);


function addPost(){
  $(".remPost").hide();
  if($(".addPost").is(':visible')){
    $(".addPost").fadeOut(100);
  }else{
    $(".addPost").fadeIn(100);
  }
}

function remPost(){
  $(".addPost").hide();
  if($(".remPost").is(':visible')){
    $(".remPost").fadeOut(100);
  }else{
    $(".remPost").fadeIn(100);
  }
}




// function uploadFile() {
//     let blobFile = $('#filechooser').files[0];
//     let formData = new FormData();
//     formData.append("fileToUpload", blobFile);
//
//     $.ajax({
//        url: "upload.php",
//        type: "POST",
//        data: formData,
//        processData: false,
//        contentType: false,
//        success: function(response) {
//            // .. do something
//        },
//        error: function(jqXHR, textStatus, errorMessage) {
//            console.log(errorMessage); // Optional
//        }
//     });
// }
