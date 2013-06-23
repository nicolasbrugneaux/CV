var index=0;

var pages = [
	"home",
	"about",
	"skills",
	"contact"
			];

function changePage(value)
{
	var i = $.inArray(value, pages);
	if(i!=index)
	{
		if(i<index)
		{
			$("#main-content").hide("slide", { direction: "right" }, 300, function () {
				$("#main-content").load("pages/"+pages[i]+".html",function()    {
					$("#main-content").show("slide", { direction: "left" },500);
				})
			});
		}
		else
		{
			$("#main-content").hide("slide", { direction: "left" }, 300, function () {
				$("#main-content").load("pages/"+pages[i]+".html",function()    {
					$("#main-content").show("slide", { direction: "right" }, 500);
				})
			});
		}
		for(var j=0;j<pages.length;j++)
		{
			if(j==i)
				$('#menu-'+pages[j]).parent().addClass('active');
			else
				$('#menu-'+pages[j]).parent().removeClass('active');
		}
		if(value=="skills")
			$('#menu-about').parent().addClass('active');
		index=i;
	}
}

$(document).ready(function(){ 
	var i = $.inArray(window.location.hash.substring(1)==""?'home':window.location.hash.substring(1), pages);
	$("#main-content").load("pages/"+pages[i]+".html");
	index=i;
});