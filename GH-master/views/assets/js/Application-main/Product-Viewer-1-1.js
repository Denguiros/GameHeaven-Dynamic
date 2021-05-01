$(function() {
  var $image = $('.product-image .image');
  var imgContainre = $('#image_container');
  var currImage;
   var $playingVid=false;
    
  $('.product-thumbnails img').on('click', function() {
     $playingVid=false;
    imgContainre.show();
    $image.css('background-image', 'url(' + $(this).attr("src") + ')');
    currImage = "";
  });
  
$('#video_select').on('click',function(){
    imgContainre.hide();
    $playingVid=true;
   });
    
});

 if($playingVid==false){

      $('.product-thumbnails img').hover(function(){

        currImage = $image.css('background-image');
        $image.css('background-image', 'url(' + $(this).attr("src") + ')');
        $image.hide().fadeIn(100);
      }, function() {
        if (currImage !== "") {
          $image.css('background-image', currImage);
        }
      }



    );
        
}
    



