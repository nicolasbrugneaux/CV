###
    @inspired: by hakim.se
 ###
supports3DTransforms =  document.body.style['webkitPerspective'] is not undefined or document.body.style['MozPerspective'] is not undefined

linkify = ( selector ) ->
    if supports3DTransforms
        
        nodes = document.querySelectorAll( selector );

        for node in nodes
            if not node.className or not node.className.match( /roll/g )
                node.className += ' roll'
                node.innerHTML = '<span data-title="'+ node.text +'">' + node.innerHTML + '</span>'