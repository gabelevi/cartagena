(function(){
  var $j = jQuery.noConflict();
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  var img = new Image();

  var zoom = 1;
  var panX = 0;
  var panY = 0;

  var redraw = function () {
    context.fillStyle = '#808080';
    context.fillRect(0, 0, canvas.width, canvas.height);

    var x = (1 - zoom) * canvas.width / 2;
    var y = (1 - zoom) * canvas.height / 2;
    if (canvas.width / canvas.height < img.width / img.height) {
      // width limited
      var ratio = zoom * canvas.width / img.width;
      var y = (canvas.height - ratio * img.height) / 2;
    } else {
      // height limited
      var ratio = zoom * canvas.height / img.height;
      var x = (canvas.width - ratio * img.width) / 2;
    }
    if (zoom > 1) {
      panX = Math.min(-x / zoom, Math.max(x / zoom, panX));
      panY = Math.min(-y / zoom, Math.max(y / zoom, panY));
    } else {
      panX = panY = 0;
    }
    x = x + panX * zoom;
    y = y + panY * zoom;

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

  canvas.addEventListener('touchstart', function (e) {
    if (e.targetTouches.length == 1) {
      var touch = e.targetTouches[0];
      var startX = touch.clientX;
      var startY = touch.clientY;
      var origPanX = panX;
      var origPanY = panY;
      var updatePan = function (e) {
        if (e.targetTouches.length == 1) {
          var dX = touch.clientX - startX;
          var dY = touch.clientY - startY;
          panX = origPanX + dX / zoom;
          panY = origPanY + dY / zoom;
          redraw();
        }
        e.preventDefault();
      }
      var onEnd = function (e) {
        updatePan(e);
        canvas.removeEventListener('touchmove', updatePan);
        canvas.removeEventListener('touchend', onEnd);
      }
      canvas.addEventListener('touchmove', updatePan, false);
      canvas.addEventListener('touchend', onEnd, false);
      e.preventDefault();
    }
  }, false);

  canvas.onmousedown = function (e) {
    var startX = e.clientX;
    var startY = e.clientY;
    var origPanX = panX;
    var origPanY = panY;
    var updatePan = function (e) {
      var dX = e.clientX - startX;
      var dY = e.clientY - startY;
      panX = origPanX + dX / zoom;
      panY = origPanY + dY / zoom;
      redraw();
    }
    canvas.onmousemove = updatePan;
    canvas.onmouseup = function (e) {
      updatePan(e);
      canvas.onmouseup = function () {}
      canvas.onmousemove = function() {}
    }
  }

  $j('#zoom-in').on('click', function () {
    zoom = Math.min(16, zoom * 2);
    redraw();
  });
  $j('#zoom-out').on('click', function () {
    zoom = Math.max(1, zoom / 2);
    redraw();
  });

  $j(window).resize(resize);
  resize();
  img.onload = redraw;
  img.src = 'http://www.html5canvastutorials.com/demos/assets/darth-vader.jpg';
})();
