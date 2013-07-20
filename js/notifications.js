/*!
@author: nicolasbrugneaux.me
*/
function slideUpDownNotifications()
{
	if ( $(".notifications").children().size() == 1 )
		$(".notifications").hide();
	else 
		$(".notifications").slideUp(0).slideDown(150).delay(5000).slideUp(150);
}
$(document).ready(function(){
	slideUpDownNotifications();
});
