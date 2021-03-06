// Generated by CoffeeScript 1.6.3
/*
    @inspired: by hakim.se
*/


(function() {
  var linkify, supports3DTransforms;

  supports3DTransforms = document.body.style['webkitPerspective'] !== void 0 || document.body.style['MozPerspective'] !== void 0;

  linkify = function(selector) {
    var node, nodes, _i, _len, _results;
    if (supports3DTransforms) {
      nodes = document.querySelectorAll(selector);
      _results = [];
      for (_i = 0, _len = nodes.length; _i < _len; _i++) {
        node = nodes[_i];
        if (!node.className || !node.className.match(/roll/g)) {
          node.className += ' roll';
          _results.push(node.innerHTML = "<span data-title=\"" + node.text + " \">" + node.innerHTML + "</span>");
        } else {
          _results.push(void 0);
        }
      }
      return _results;
    }
  };

}).call(this);
