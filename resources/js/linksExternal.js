// All Links Nofllow And Target blank
window.myFunction = function() {
    var x = document.getElementsByTagName("a");
    var i;
    for (i = 0; i < x.length; i++) {
        if (location.hostname != x[i].hostname) {
            x[i].rel = "nofollow";
            x[i].target = "_blank";
            x[i].title = "Click to open in new window";
        }
    }
}
setTimeout("myFunction()", 0);

window.LoadEvent = function(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function() {
            if (oldonload) {
                oldonload();
            }
            func();
        }
    }
}
window.LoadEvent(function() {
    window.myFunction();
});
