###
	@author: nicolasbrugneaux.me
 ###
index = 0

pages = [
	"home"
	"about"
	"skills"
	"contact"
	"blog"
]
loadFrom = (from, index) ->

	to = if from=="right" then "left" else "right"

	$("#main-content").hide "slide", { direction: from }, 300, () ->

		$("#main-content").load "pages/"+pages[index]+".php", () ->

			$("#main-content").show("slide", { direction: to },500)

			if window.location.hash.substring(1)=="blog"
				blogify()

			linkify( 'a.no-btn' )

changePage = (value) ->
	i = $.inArray value, pages
	if i != index
		if i < index
			loadFrom "right", i
		else
			loadFrom "left", i

		for page, key in pages
			if key == i
				$('#menu-'+page).parent().addClass 'active'
			else
				$('#menu-'+page).parent().removeClass 'active'

		if value == "skills" or value == "about"
			$('#menu-about').parent().addClass 'active'
		index = i

$(document).ready () ->
	slideUpDownNotifications()
	i =  $.inArray(
		(if window.location.hash.substring(1)=="" then 'home' else window.location.hash.substring(1)),
		pages
	)

	$("#main-content").load ( if i==-1 then "pages/home" else "pages/"+pages[i] )+".php", () ->
		linkify 'a.no-btn'
		if window.location.hash.substring(1)=="blog"
			blogify()
	index = i

	$(window).on 'hashchange', () ->
		if $.inArray(window.location.hash.substring(1),pages) >=0
			changePage(window.location.hash.substring(1))
		else
			changePage("home")