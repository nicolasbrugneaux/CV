// Generated by CoffeeScript 1.6.3
/*
	@author: nicolasbrugneaux.me
*/


(function() {
  var slideUpDownNotifications;

  slideUpDownNotifications = function() {
    if ($(".notifications").children().size() === 1) {
      return $(".notifications").hide();
    } else {
      return $(".notifications").slideUp(0).slideDown(150).delay(5000).slideUp(150);
    }
  };

}).call(this);
