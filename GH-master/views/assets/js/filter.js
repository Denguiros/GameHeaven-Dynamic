$(document).ready(function() {

  const $valueSpan = $('.valueSpan');
  const $value = $('#price');
    if($value.val()==0)
        {
            $valueSpan.html("Free");
        }
    else if($value.val()<65)
        {
            $valueSpan.html("Under "+$value.val()+" $");
        }
    else
        {
           $valueSpan.html("Any price"); 
        }
  $value.on('input change', () => {
    if($value.val()==0)
        {
            $valueSpan.html("Free");
        }
    else if($value.val()<65)
        {
            $valueSpan.html("Under "+$value.val()+" $");
        }
    else
        {
           $valueSpan.html("Any price"); 
        }
    
  });
});