$(".franchises").select2({
  placeholder: "Select an already existing franchise",
  allowClear: true
})
$(".pegi").select2({
  placeholder: "Select a pegi rating",
  allowClear: true
});
$(".os").select2({
  placeholder: "Select an OS",
  allowClear: true
});
$(".processor").select2({
  placeholder: "Select a processor",
  allowClear: true
});
$(".ram").select2({
  placeholder: "Select ram",
  allowClear: true
});
$(".gpu").select2({
  placeholder: "Select a graphics card",
  allowClear: true
});
$(".directx").select2({
  placeholder: "Select a directx version",
  allowClear: true
});
$(".location").select2({
  placeholder: "",
  allowClear: true
});
function format(item, state) {
  if (!item.id) {
    return item.text;
  }
  var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
  var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
  var url = state ? stateUrl : countryUrl;
  if(item.element.value.toLowerCase()=="none"){
    var img = $("<img>", {
      class: "img-flag",
      width: 26,
      src: "views/assets/img/flagplaceholder.svg"
    }); 
  }else{
    var img = $("<img>", {
      class: "img-flag",
      width: 26,
      src: url + item.element.value.toLowerCase() + ".svg"
    });
  }
  
  var span = $("<span>", {
    text: " " + item.text
  });
  span.prepend(img);
  return span;
}

$(document).ready(function() {
  $("#countries").select2({
    templateResult: function(item) {
      return format(item, false);
    }
  });

});