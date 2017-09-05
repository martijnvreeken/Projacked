/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

import Vue from 'vue';
import VueRouter from 'vue-router';

// import VueResource from 'vue-resource';

// Vue.use(VueResource);
Vue.use(VueRouter);

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Vue.component('k-text', require('./components/k-text.vue'));

import { routes } from './routes';

const router = new VueRouter({
  routes // short for `routes: routes`
});

router.beforeEach((to, from, next) => {
    if(app.token) {
        next();
        return;
    }
    // going anywhere but the login page without a token set
    if(to.path !== '/') {
        next('/');
        return;
    }
    next();
})

// Add a request interceptor
axios.interceptors.request.use(function (config) {
    return config;
  }, function (error) {
    // Do something with request error
    return Promise.reject(error);
  });

// Add a response interceptor
axios.interceptors.response.use(function (response) {
    if (response.headers.authorization) {
      let token = response.headers.authorization.split(' ');
      window.app.setToken(token[1]);
    }
    return response;
  }, function (error) {
    // Do something with response error
    return Promise.reject(error);
  });

export const eventBus = new Vue();

window.app = new Vue({
    router,
    data() {
        return {
            token: '',
            account: null
        };
    },
    methods: {
        setToken(token) {
            this.token = token;
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        },
        setAccount(user) {
            let account = Vue.extend(require('./components/Account-edit.vue'));
            this.account = new account();
            this.account.setData(user);
            this.account.$mount('#mount-point');
        },
        editAccount() {
            this.account.activate();
        }
    }
}).$mount('#app');
