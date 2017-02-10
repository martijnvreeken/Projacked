require('./bootstrap');

Vue.component('k-text', require('./components/k-text.vue'));

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('login-form', require('./components/Login.vue'));

Vue.component('leads', require('./components/Leads.vue'));
Vue.component('latest-leads', require('./components/Leads-latest.vue'));
Vue.component('lead', require('./components/Lead.vue'));
Vue.component('lead_new', require('./components/Lead-new.vue'));
Vue.component('lead_edit', require('./components/Lead-edit.vue'));

Vue.component('projects', require('./components/Projects.vue'));
Vue.component('latest-projects', require('./components/Projects-latest.vue'));
Vue.component('project', require('./components/Project.vue'));
Vue.component('project_edit', require('./components/Project-edit.vue'));

Vue.component('clients', require('./components/Clients.vue'));
Vue.component('client', require('./components/Client.vue'));
Vue.component('client-edit', require('./components/Client-edit.vue'));

Vue.component('quotation-texts', require('./components/QuotationTexts.vue'));
Vue.component('q-text', require('./components/QuotationText.vue'));
Vue.component('q-text_edit', require('./components/QuotationText-edit.vue'));

const routes = [
  { name: 'login', path: '/', component: require('./pages/login.vue') },
  { name: 'home', path: '/dashboard', component: require('./pages/dashboard.vue') },
  { name: 'clients', path: '/klanten', component: require('./pages/clients.vue') },
  { name: 'projects', path: '/projecten', component: require('./pages/projects.vue') },
  { name: 'leads', path: '/aanvragen', component: require('./pages/leads.vue') },
  { name: 'texts', path: '/offerte-teksten', component: require('./pages/texts.vue') },
  { name: 'new_lead', path: '/aanvragen/nieuw', component: require('./pages/lead-new.vue') },
];

const router = new VueRouter({
  routes
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
    },
    mounted() {
    }
}).$mount('#app');