const article = document.getElementById('article');
const widget = document.getElementById('widget-0');

window.addWidget = function(idOrType, pos) {
    const element = document.getElementById(idOrType);
    const newWidget = widget.cloneNode(true);

    const parent = element.parentNode.parentNode.parentNode.parentNode;
    article.appendChild(newWidget);

    var index = Array.prototype.indexOf.call(article.children, parent);

    console.log(index);
}
