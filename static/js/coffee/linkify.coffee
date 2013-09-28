###
    @inspired: by hakim.se
 ###
supports3DTransforms =  document.body.style['webkitPerspective'] != undefined or document.body.style['MozPerspective'] != undefined

linkify = ( selector ) ->
    if supports3DTransforms
        
        nodes = document.querySelectorAll( selector );

        for node in nodes
            if !node.className or !node.className.match( /roll/g )
                node.className += ' roll'
                node.innerHTML = "<span data-title=\"#{node.text} \">#{node.innerHTML}</span>"