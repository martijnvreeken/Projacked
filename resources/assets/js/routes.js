export const routes = [
  { name: 'login', path: '/', component: require('./pages/login.vue') },
  { name: 'home', path: '/dashboard', component: require('./pages/dashboard.vue') },
  { name: 'clients', path: '/klanten', component: require('./pages/clients.vue') },
  { name: 'projects', path: '/projecten', component: require('./pages/projects.vue') },
  { name: 'leads', path: '/aanvragen', component: require('./pages/leads.vue') },
  { name: 'texts', path: '/offerte-teksten', component: require('./pages/texts.vue') },
  { name: 'new_lead', path: '/aanvragen/nieuw', component: require('./pages/lead-new.vue') },
];
