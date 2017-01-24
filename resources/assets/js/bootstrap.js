
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
//require('bootstrap-sass');
//require('materialize-css');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
window.VueRouter = require('vue-router');

var VueResource = require('vue-resource');

Vue.use(VueResource);
Vue.use(VueRouter);

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    if (app.token) {
        request.headers.set('Authorization', 'Bearer ' + app.token);
    }

    next((response) => {
        if (response.status == 401 && response.body.error == 'token_expired') {
            app._router.push('/');
            return;
        }
        if(response.headers.map.Authorization) {
            var token = response.headers.map.Authorization[0];
            app.setToken(token.split(' ')[1]);
        }
    });
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
