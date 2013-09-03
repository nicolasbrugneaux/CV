/*!
 * @author: nicolasbrugneaux.me
 */
var index=0;

var pages = [
	"home",
	"about",
	"skills",
	"contact",
	"blog"
			];
function loadFrom(from, index)
{
	var to = from=="right"?"left":"right";
	$("#main-content").hide("slide", { direction: from }, 300, function () {
		$("#main-content").load("pages/"+pages[index]+".php",function()    {
			$("#main-content").show("slide", { direction: to },500);
			if(window.location.hash.substring(1)=="blog")
			{
				blogify();
			}
			linkify( 'a.no-btn' );
		})
	});
}
function changePage(value)
{
	var i = $.inArray(value, pages);
	if(i!=index)
	{
		if(i<index)
		{
			loadFrom("right", i);
		}
		else
		{
			loadFrom("left", i);
		}
		for(var j=0, l=pages.length; j<l; j++)
		{
			if(j==i)
				$('#menu-'+pages[j]).parent().addClass('active');
			else
				$('#menu-'+pages[j]).parent().removeClass('active');
		}
		if(value=="skills" || value=="about")
			$('#menu-about').parent().addClass('active');
		index=i;
	}
}

$(document).ready(function(){ 
	var i = $.inArray(window.location.hash.substring(1)==""?'home':window.location.hash.substring(1), pages);
	$("#main-content").load((i==-1?"pages/home":"pages/"+pages[i])+".php", function(){
		linkify( 'a.no-btn' );
		if(window.location.hash.substring(1)=="blog")
		{
			blogify();
		}
	});
	index=i;

	$(window).on('hashchange', function(){
	if($.inArray(window.location.hash.substring(1),pages)>=0)
		changePage(window.location.hash.substring(1));
	else
		changePage("home");
	});
});