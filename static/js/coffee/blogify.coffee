###
	@author: nicolasbrugneaux.me
 ###
last = 0
blogify = () ->

	$.ajax( {
		url: './database/posts.php',		#the script to call to get data          
		data: "",						#you can insert url argumnets here to pass to posts.php
		dataType: 'json',				#data format      
		success: (data) ->				#on recieve of reply

			content = ""
			for item, index in data 
				if item == data[0]
					content +=
					"<div class='row'>
						<div class='span12'>
							<h2>#{item['title']}</a></h2>
							<small><b>By #{item['author']} </b>, <i> #{item['created']}</i></small>
							<br>
							<div class='post'>
								#{item['body']}
							</div>
							<div id='modal-#{item['id']}'class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button
									<h3>#{item['title']}</h3>
									<small><b>By #{item['author']} </b>, <i>#{item['created']}</i></small>
									<br>
								</div> <!-- .modal-header -->
								<div class='modal-body'>
									#{item['body']}
								</div> <!-- .modal-body -->
								<div class='modal-footer'>
									<!-- FACEBOOK SHARE BUTTON -->
									<a class='btn facebook'
										href='http://www.facebook.com/sharer.php?s=100
										&p[title]=\""+ item['title'].replace( /<[^>]*>/g, '') + "\"
										&p[summary]=\""+ $.trim(item['body'].replace(/<[^>]*>/g, '')).substring(0, 100).split(" ").slice(0, -1).join(" ") + "...\"
										&p[url]=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"'
										target='_blank'>
										<span data-icon='&#xe164;'> </span> Share
									</a>

									<!-- TWEET BUTTON -->
									<a class='btn twitter'
										href='https://twitter.com/share
										?url=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"
										&via=nicolasbrugneaux.me
										&text=#{item['title']} -'
										target='_blank'>
										<span data-icon='&#xe169;'> </span> Tweet
									</a>
				
									<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
								</div><!-- .modal-footer -->
							</div><!-- #modal-id -->
							<a href='#modal-#{item['id']}' role='button' class='btn btn-info' data-toggle='modal'>Share this post »</a>
						</div> <!-- .span12 -->
					</div><!-- .row -->"

				else

					content += if index%3 == 1 then "<hr><div class='row previews'>" else ""
					content += 
						"<div class='span4'>
							<h2>#{item['title']}</h2>
							<small><b>By #{item['author']}</b>, <i>#{item['created']}</i></small>
							<br>
							<div class='post'>"+ $.trim(item['body']).substring(0, 200).split(" ").slice(0, -1).join(" ") + "...</div>
							<div id='modal-#{item['id']}'class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
									<h3>#{item['title']}</h3>
									<small><b>By #{item['author']}</b>, <i>#{item['created']}</i></small>
									<br>
								</div> <!-- .modal-header -->
								<div class='modal-body'>
									#{item['body']}
								</div> <!-- .modal-body -->
								<div class='modal-footer'>
									<!-- FACEBOOK SHARE BUTTON -->
									<a class='btn facebook'
										href='http://www.facebook.com/sharer.php?s=100
										&p[title]=\""+ item['title'].replace(/<[^>]*>/g, '') + "\"
										&p[summary]=\""+ $.trim(item['body'].replace(/<[^>]*>/g, '')).substring(0, 100).split(" ").slice(0, -1).join(" ") + "...\"
										&p[url]=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"'
										target='_blank'>
										<span data-icon='&#xe164;'> </span> Share
									</a>

									<!-- TWEET BUTTON -->
									<a class='btn twitter'
										href='https://twitter.com/share
										?url=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"
										&via=nicolasbrugneaux.me
										&text=#{item['title']} -'
										target='_blank'>
										<span data-icon='&#xe169;'> </span> Tweet
									</a>
				
									<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
								</div><!-- .modal-footer -->
							</div><!-- #modal-id -->
							<a href='#modal-#{item['id']}' role='button' class='btn btn-info' data-toggle='modal'>Read More »</a>
						</div> <!-- .span4 -->"
					content += if ( index%3 == 0 or index == data.length-1 ) then "</div><!-- .row -->" else ""
				#endif
			# endfor
			$('#bar .progress .bar').width("100%")
			window.setTimeout () ->
				$(".blog .container").html(content)
				linkify( '.container a.no-btn' )
				$('#bar .progress .bar').width("0%")
				$("#btn").show()
				$('#bar').hide()
				if window.location.search != ''
					hu = window.location.search.substring(1)
					gys = hu.split("&")
					for gy in gys
						ft = gys.split("=")
						if (ft[0] == "id")
							$('#modal-'+ft[1]).modal()

				last = data.length
				$("#btn .btn").click () =>
					showNextPosts(last, 3)
			, 1000
		, error: (data) ->
			$('#bar .progress .bar').width("0%")
			$('#bar .progress').addClass("progress-danger")
			$('.notifications').append(
				"<div class='alert alert-danger'>
					<button class='close' type='button' data-dismiss='alert'>&times;</button>
					<p>The last posts couldn't be loaded.</p>
				</div>"
			)
			slideUpDownNotifications()
	})


showNextPosts = (from, howMany) ->

	$("#btn .btn").attr('disabled','disabled')
	$("#btn").hide()

	$.ajax( {
		url: "./database/posts.php?from=#{from}&howMany=#{howMany}",  #the script to call to get data          
		data: "",					#you can insert url argumnets here to pass to posts.php
		dataType: 'json',			#data format      
		success: (data) ->			#on recieve of reply

			content = ""

			if not $.isEmptyObject(data)

				$('#bar').show()
				for item, index in data

					content += if index%3 == 1 then "<hr><div class='row previews'>" else ""
					content += 	
						"<div class='span4'>
							<h2>#{item['title']}</h2>
							<small><b>By #{item['author']}</b>, <i>#{item['created']}</i></small>
							<br>
							<div class='post'>" + $.trim(item['body']).substring(0, 200).split(" ").slice(0, -1).join(" ") + "...
							</div>
							<div id='modal-#{item['id']}'class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
									<h3>#{item['title']}</h3>
									<small><b>By #{item['author']}</b>, <i>#{item['created']}</i></small>
									<br>
								</div> <!-- .modal-header -->
							<div class='modal-body'>
								#{item['body']}
							</div> <!-- .modal-body -->
							<div class='modal-footer'>
								<!-- FACEBOOK SHARE BUTTON -->
								<a class='btn facebook'
									href='http://www.facebook.com/sharer.php?s=100
									&p[title]=\""+ item['title'].replace(/<[^>]*>/g, '') +"\"
									&p[summary]=\""+ $.trim(item['body'].replace(/<[^>]*>/g, '')).substring(0, 100).split(" ").slice(0, -1).join(" ") + "...\"
									&p[url]=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"'
									target='_blank'>
									<span data-icon='&#xe164;'> </span> Share
								</a>

								<!-- TWEET BUTTON -->
								<a class='btn twitter'
									href='https://twitter.com/share
									?url=\"http://nicolasbrugneaux.me/posts/?id=#{item['id']}\"
									&via=nicolasbrugneaux.me
									&text=#{item['title']} -'
									target='_blank'>
									<span data-icon='&#xe169;'> </span> Tweet
								</a>
			
								<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
							</div><!-- .modal-footer -->
						</div><!-- #modal-id -->
						<a href='#modal-#{item['id']}' role='button' class='btn btn-info' data-toggle='modal'>Read More »</a>
					</div> <!-- .span4 -->"
					content += if ( index%3 == 0 or index == data.length-1 ) then "</div><!-- .row -->" else ""
				#endfor

				$('#bar .progress .bar').width("100%")
				window.setTimeout () ->
					$(".blog .container").append(content)
					linkify( '.container a.no-btn' )
					$("#btn").show () =>
						$("#btn .btn").removeAttr('disabled')
					$('#bar').hide()
					$('#btn').show()
					$('#bar .progress .bar').width("0%")
					if window.location.search != ''
						hu = window.location.search.substring(1)
						gys = hu.split("&")
						for gys in gys
							ft = gy[i].split("=")
							if ft[0] == "id"
								$('#modal-'+ft[1]).modal()
					last = data.length + last
					$("#btn .btn").click () => 
						showNextPosts(last, 3)
				, 1000

			else if $('#notif-post').length == 0
				content = 	"<div id='notif-post' class='well well-small' style='text-align:center;'>
								<button class='close' type='button' data-dismiss='alert'>&times;</button>
								<p>No more posts to show.</p>
							</div>"
				$(".blog .loaders").prepend(content)
				$('#bar').hide()
				$('#btn').hide()
		, error: (data) ->
			$('#bar .progress .bar').width("0%")
			$('#bar .progress').addClass("progress-danger")
			$('.notifications').append(
				"<div class='alert alert-danger'>
					<button class='close' type='button' data-dismiss='alert'>&times;</button>
					<p>The last posts couldn't be loaded.</p>
				</div>"
			)
			slideUpDownNotifications()
	})