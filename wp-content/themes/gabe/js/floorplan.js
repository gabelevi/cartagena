(function(){
  var $j = jQuery.noConflict();
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  var img = new Image();

  var redraw = function () {
    context.fillStyle = '#808080';
    context.fillRect(0, 0, canvas.width, canvas.height);

    if (canvas.width / canvas.height < img.width / img.height) {
      // width limited
      var ratio = canvas.width / img.width;
      var x = 0;
      var y = (canvas.height - ratio * img.height) / 2;
    } else {
      // height limited
      var ratio = canvas.height / img.height;
      var x = (canvas.width - ratio * img.width) / 2;
      var y = 0;
    }
    console.log(x, y);

    context.drawImage(img, x, y, ratio * img.width, ratio * img.height);
  };

  var resize = function () {
    var wHeight = $j(window).height();
    var wWidth = $j(window).width();
    var cPos = $j('#canvas').position();
    canvas.width = Math.ceil(wWidth - cPos.left);
    canvas.height = Math.ceil(wHeight - cPos.top - $j('footer').height());
    redraw();
  }
  $j(window).resize(resize);
  resize();
  img.onload = redraw;
  img.src = 'http://www.html5canvastutorials.com/demos/assets/darth-vader.jpg';
})();
