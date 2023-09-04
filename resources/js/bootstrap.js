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
