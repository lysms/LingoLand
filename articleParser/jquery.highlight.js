/*JQuery plugin to highlight text inside of a text block displayed on a webpage.*/
jQuery.fn.highlight = function (pat, color, id) {
    function innerHighlight(node, pat, color, id) {
        var skip = 0;
        if (node.nodeType == 3) {
            var pos = node.data.toUpperCase().indexOf(pat);
            if (pos >= 0) {
                var spannode = document.createElement('span');
                spannode.className = 'highlight';
                spannode.id = id.toString();
                spannode.setAttribute("style", "background-color: " + color + ";");
                console.log(spannode);
                var middlebit = node.splitText(pos);
                var endbit = middlebit.splitText(pat.length);
                var middleclone = middlebit.cloneNode(true);
                spannode.appendChild(middleclone);
                middlebit.parentNode.replaceChild(spannode, middlebit);
                skip = 1;
            }
        } else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {
            for (var i = 0; i < node.childNodes.length; ++i) {
                i += innerHighlight(node.childNodes[i], pat, color, id);
            }
        }
        return skip;
    }
    return this.length && pat && pat.length ? this.each(function () {
        innerHighlight(this, pat.toUpperCase(), color, id);
    }) : this;
};
/*JQuery plugin to remove highlighted text inside of a text block displayed on a webpage.*/
jQuery.fn.removeHighlight = function (id) {
    return this.find("span" + "#" + id + ".highlight").each(function () {
        this.parentNode.firstChild.nodeName;
        with(this.parentNode) {
            replaceChild(this.firstChild, this);
            normalize();
        }
    }).end();
};