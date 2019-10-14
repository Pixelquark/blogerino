// $(".addPost").hide();

$('#addPost').on('click', addPost);

function addPost(){
  if($(".addPost").is(':visible')){
    $(".addPost").fadeOut(100);
  }else{
    $(".addPost").fadeIn(100);
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
