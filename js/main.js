$(document).ready(function () {
  setInterval(function() {
    $.get("php/nearestLectureCoutdown.php", function (result) {
      $('.time').html(result);
    });
  }, 1000);
});
