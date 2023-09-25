/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

// Syntax

window.syntaxKey = function(key) {
    key = key.split('');
    for (var i = 0; i < key.length; i++) {
        if (key[0].replace(/\d+/g, '') == '') {
            key.splice(0, 1);
        } else if (key[0].replace(/[^ا-يa-zA-Z0-9]/g, '') == '') {
            key.splice(0, 1);
        }
    }
    key = key.join('');
    key = key.trim();
    key = key.replaceAll(" ", "_");
    key = key.replaceAll("-", "_");
    key = key.replace(/_+/g, '_');
    key = key.toLowerCase();
    key = key.replace(/[^ا-يa-zA-Z0-9-_]/g, '');

    return key;
}

window.selectSyntax = function (input, syntax) {

    syntax = syntax.replaceAll(' ', '-');
    input += " " + syntax;

    var value = input.split(" ");
    value.splice(value.length - 2, 1);
    input = value.join(' ') + ' ';

    input = input.replaceAll('-', ' ');
    return input;
}

window.filterSyntax = function(input, valueSelect, syntaxesLocal, syntaxesServer) {
    const value = input.trim().replace(/\s{2,}/g, ' ');

    syntaxesLocal = [];

    for (let index = 0; index < syntaxesServer.length; index++) {
        const element = syntaxesServer[index];

        var v = '';
        var vList = input.split(' ');
        if(vList.length > 1) {
            v = vList[vList.length-1];
        }else {
            v = value;
        }
        v = v.toLowerCase();
        v = v.replaceAll('إ', 'ا');
        v = v.replaceAll('أ', 'ا');
        if(element.includes(v)) {
            syntaxesLocal.push(element);
        }
    }

    if(value == '') {
        syntaxesLocal = [];
    }

    if(input[input.length-1] == ' ') {
        syntaxesLocal = [];
        valueSelect.push(value);

        input = valueSelect[valueSelect.length-1]+' ';
    }else {
        valueSelect = [];
    }

    return [syntaxesLocal, input];
}

// All Links Nofllow And Target _blank
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
var mft = setTimeout("myFunction()", 0);

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
