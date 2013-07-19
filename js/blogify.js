/*!
 * @author: nicolasbrugneaux.me
 */
function blogify () {
	$.ajax({                                  
		url: './database/posts.php',  	//the script to call to get data          
		data: "",                       	//you can insert url argumnets here to pass to posts.php
		dataType: 'json',                	//data format      
		success: function(data)         	//on recieve of reply
		{
			var content ="";
			for (var i = 0; i < data.length; i++) 
			{
				if ( i == 0)
				{
					content += "<div class='row'>"
							+"<div class='span12'>"
					   			+"<h2>"+data[i]['title']+"</a></h2>"
					   			+"<small><b>By " + data[i]['author'] + "</b>"
					   			+", <i>" + data[i]['created'] + "</i></small><br>"
					   			+"<div class='post'>"  + data[i]['body'] + "</div>"
					   			+"<div id='modal-"+data[i]['id']+"'class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
					   			+	"<div class='modal-header'>"
					   			+		"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>"
					   			+		"<h3>"+data[i]['title']+"</h3>"
					   			+		"<small><b>By " 	+ data[i]['author'] + "</b>"
				   				+		", <i>"		+ data[i]['created']+ "</i></small><br>"
					   			+	"</div> <!-- .modal-header -->"
				   				+	"<div class='modal-body'>"
				   				+		data[i]['body']
				   				+	"</div> <!-- .modal-body -->"
				   				+	"<div class='modal-footer'>"
				   				//FACEBOOK SHARE BUTTON
				   				+		"<a class='btn facebook'"
								+			"href='http://www.facebook.com/sharer.php?s=100"
								+				"&p[title]="+data[i]['title']
								+				"&p[summary]="+jQuery.trim(data[i]['body']).substring(0, 100).split(" ").slice(0, -1).join(" ") + "..."
								+				"&p[url]="+"http://nicolasbrugneaux.me/posts/?id="+data[i]['id']+"'"
								//+				"&p[images[0]]="
								+			" target='_blank'>"
								+			"<span data-icon='&#xe164;'> </span>"
								+			" Share"
				   				+		"</a>"

				   				//TWEET BUTTON

				   				+		"<a class='btn twitter'"
				   				+			"href='https://twitter.com/share"
				   				+			"?url="+"http://nicolasbrugneaux.me/posts/?id="+data[i]['id']
				   				+			"&via=nicolasbrugneaux.me"
				   				+			"&text="+data[i]['title']+" -'"
				   				+			" target='_blank'>"
				   				+			"<span data-icon='&#xe169;'> </span> Tweet"
				   				+		"</a>"
				   				
								+		"<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>"
								+	"</div><!-- .modal-footer -->"
					   			+"</div><!-- #modal-id -->"
					   			+"<a href='#modal-"+data[i]['id']+"' role='button' class='btn btn-info' data-toggle='modal'>Share this post »</a>"
					   		+"</div> <!-- .span12 -->"
					   	+"</div><!-- .row -->";
				}
				else
				{
					content += (i%3 == 1) ?"<hr><div class='row'>":"";
						content +="<div class='span4'>"
						   			+"<h2>"+data[i]['title']+"</h2>"
						   			+"<small><b>By " + data[i]['author'] + "</b>"
						   			+", <i>" + data[i]['created'] + "</i></small><br>"
						   			+"<div class='post'>"  + jQuery.trim(data[i]['body']).substring(0, 150).split(" ").slice(0, -1).join(" ") + "..." + "</div>"
						   			+"<div id='modal-"+data[i]['id']+"'class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
						   			+	"<div class='modal-header'>"
						   			+		"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>"
						   			+		"<h3>"+data[i]['title']+"</h3>"
						   			+		"<small><b>By " 	+ data[i]['author'] + "</b>"
					   				+		", <i>"		+ data[i]['created']+ "</i></small><br>"
						   			+	"</div> <!-- .modal-header -->"
					   				+	"<div class='modal-body'>"
					   				+		data[i]['body']
					   				+	"</div> <!-- .modal-body -->"
					   				+	"<div class='modal-footer'>"

					   				//FACEBOOK SHARE BUTTON

					   				+		"<a class='btn facebook'"
									+			"href='http://www.facebook.com/sharer.php?s=100"
									+				"&p[title]="+data[i]['title']
									+				"&p[summary]="+jQuery.trim(data[i]['body']).substring(0, 100).split(" ").slice(0, -1).join(" ") + "..."
									+				"&p[url]="+"http://nicolasbrugneaux.me/posts/?id="+data[i]['id']+"'"
									//+				"&p[images[0]]="
									+			" target='_blank'>"
									+			"<span data-icon='&#xe164;'> </span>"
									+			" Share"
					   				+		"</a>"

									//TWEET BUTTON

					   				+		"<a class='btn twitter'"
					   				+			"href='https://twitter.com/share"
					   				+			"?url="+"http://nicolasbrugneaux.me/posts/?id="+data[i]['id']
					   				+			"&via=nicolasbrugneaux.me"
					   				+			"&text="+data[i]['title']+" -'"
					   				+			" target='_blank'>"
					   				+			"<span data-icon='&#xe169;'> </span> Tweet"
					   				+		"</a>"
    								+		"<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>"
    								+	"</div><!-- .modal-footer -->"
						   			+"</div><!-- #modal-id -->"
						   			+"<a href='#modal-"+data[i]['id']+"' role='button' class='btn btn-info' data-toggle='modal'>Read More »</a>"
						   		+"</div> <!-- .span4 -->";
					content += (i%3 == 0 || i==data.length-1)?"</div><!-- .row -->":"";
				}
			}
			$('.container .progress .bar').width("100%");
			window.setTimeout(function() {
				$(".blog .container").html(content);
				linkify( '.container a.no-btn' );
				if(window.location.search != '')
				{
					hu = window.location.search.substring(1);
				    gy = hu.split("&");
				    for (i=0;i<gy.length;i++) {
				        ft = gy[i].split("=");
				        if (ft[0] == "id") {
				            $('#modal-'+ft[1]).modal();
				        }
				    }
				}
			}, 1000);
		} ,
		error: function(data) 
		{
			$('.blog .container .progress .bar').css("width:0%");
			$('.blog .container .progress').addClass("progress-danger");
		}
	});
}