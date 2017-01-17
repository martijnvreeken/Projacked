require('./bootstrap');

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('clients', require('./components/Clients.vue'));
Vue.component('client', require('./components/Client.vue'));
Vue.component('leads', require('./components/Leads.vue'));
Vue.component('latest-leads', require('./components/Leads-latest.vue'));
Vue.component('lead', require('./components/Lead.vue'));
Vue.component('lead_new', require('./components/Lead-new.vue'));
Vue.component('lead_edit', require('./components/Lead-edit.vue'));

const routes = [
  { name: 'home', path: '/', component: require('./pages/dashboard.vue') },
  { name: 'clients', path: '/klanten', component: require('./pages/clients.vue') },
  { name: 'leads', path: '/aanvragen', component: require('./pages/leads.vue') },
  { name: 'new_lead', path: '/aanvragen/nieuw', component: require('./pages/lead-new.vue') },
];

const router = new VueRouter({
  routes
});

window.app = new Vue({
    router
}).$mount('#app');