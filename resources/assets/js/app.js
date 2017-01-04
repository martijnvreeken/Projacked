require('./bootstrap');

const dashboard = require('./components/Dashboard.vue');
Vue.component('dashboard', dashboard);
const clients = require('./components/Clients.vue');
Vue.component('clients', clients);
Vue.component('client', require('./components/Client.vue'));

const routes = [
  { name: 'home', path: '/', component: dashboard },
  { name: 'clients', path: '/klanten', component: clients }
];

const router = new VueRouter({
  routes
});

const app = new Vue({
    router
}).$mount('#app');