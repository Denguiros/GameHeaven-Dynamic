$(function () {
  var $images = [];
  ($.each($('.product-image .image'), function () {
    $images[this.id] = this.style.backgroundImage;

  }));

  var currImage;

  $('.product-thumbnails img').hover(function () {
    $default = $(this).closest('.fksh').attr('id');
    currImage = $('.product-image .image').css('background-image');
    $('.product-image .image').css('background-image', 'url(' + $(this).attr("src") + ')');
    $('.product-image .image').hide().fadeIn(100);
  }, function () {
    if (currImage !== "") {
      $.each($('.product-image .image'), function () {
        this.style.backgroundImage = $images[this.id];

      });
    }
  });
});

