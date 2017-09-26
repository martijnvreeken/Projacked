export const store_config = {
  state: {
    leads: {
      total: 0,
      items: [],
      next_page_url: null
    },
    projects: {
      total: 0,
      items: [],
      next_page_url: null
    },
    clients: {
      total: 0,
      items: [],
      next_page_url: null
    },
    account: {}
  },
  getters: {
    leadsWorth: (state) => {
      return state.leads.items.reduce( (sum, lead) => {
        if(lead.hour_estimate) {
            return sum + (lead.hour_estimate * lead.hour_rate);
        } else if(lead.fixed_price) {
            return sum + lead.fixed_price;
        }
        return sum;
      }, 0);
    },
    leads: (state) => {
      return state.leads.items;
    },
    topLeads: (state) => {
      return state.leads.items.slice(0,5);
    },
    leadsTotal: (state) => {
      return state.leads.total;
    },
    getLeadById: (state) => (id) => {
      return state.leads.items.find(lead => lead.id === id);
    },
    canLoadMoreLeads: (state) => {
        return state.leads.next_page_url !== null;
    },
    projectsWorth: (state) => {
      return state.projects.items.reduce( (sum, project) => {
        if(project.hour_estimate) {
          return sum + (project.hour_estimate * project.hour_rate);
        } else {
          return sum + project.fixed_price;
        }
      }, 0);
    },
    projects: (state) => {
      return state.projects.items;
    },
    topProjects: (state) => {
      return state.projects.items.slice(0,5);
    },
    projectsTotal: (state) => {
      return state.projects.total;
    },
    getProjectById: (state) => (id) => {
      return state.projects.items.find(project => project.id === id);
    },
    canLoadMoreProjects: (state) => {
      return state.projects.next_page_url !== null;
    },
    clients: (state) => {
      return state.clients.items;
    },
    clientsTotal: (state) => {
      return state.clients.total;
    },
    getClientById: (state) => (id) => {
      return state.clients.items.find(client => client.id === id);
    },
    canLoadMoreClients: (state) => {
      return state.clients.next_page_url !== null;
    }
  },
  mutations: {
    setAccount: (state, account) => {
      state.account = account;
    },
    addLead: (state, lead) => {
      state.leads.total++;
      state.leads.items = state.leads.items.concat(lead);
    },
    setLeads: (state, data) => {
      state.leads.total = data.total;
      state.leads.items = data.data;
      state.leads.next_page_url = data.next_page_url;
    },
    addLeads: (state, leads) => {
      state.leads.total = leads.total;
      if(leads.data.length > 0) {
          state.leads.items = state.leads.items.concat(leads.data);
          state.leads.next_page_url = leads.next_page_url;
      }
    },
    removeLead: (state, item) => {
      let i = state.leads.items.indexOf(item);
      if(i == -1) {
        console.error('lead not found!');
        return;
      }
      // console.info('remove lead at pos ' + i);
      state.leads.items.splice(i,1);
    },
    setProjects: (state, data) => {
      state.projects.total = data.total;
      state.projects.items = data.data;
      state.projects.next_page_url = data.next_page_url;
    },
    addProjects: (state, projects) => {
      state.projects.total = projects.total;
      if(projects.data.length > 0) {
        state.projects.items = state.projects.items.concat(projects.data);
        state.projects.next_page_url = projects.next_page_url;
      }
    },
    removeProject: (state, item) => {
      let i = state.projects.items.indexOf(item);
      if(i == -1) {
        console.error('Project not found');
        return;
      }
      state.projects.items.splice(i, 1);
    },
    setClients: (state, clients) => {
      state.clients.total = clients.total;
      state.clients.items = state.clients.items.concat(clients.data);
      state.clients.next_page_url = clients.next_page_url;
    },
    addClients: (state, clients) => {
      state.clients.total = clients.total;
      if(clients.data.length > 0) {
        state.clients.items = state.clients.items.concat(clients.data);
        state.clients.next_page_url = clients.next_page_url;
      }
    }
  },
  actions: {
    init (context) {
      console.info('init store');
      axios.get('/api/leads').then((response) => {
        context.commit('setLeads', response.data);
      });
      axios.get('/api/projects').then((response) => {
        context.commit('setProjects', response.data);
      });
      axios.get('/api/clients').then((response) => {
        context.commit('setClients', response.data);
      });
    },
    removeLead (context, payload) {
      axios.delete('/api/leads/' + payload.lead.id).then((response) => {
        context.commit('removeLead', payload.lead);
      });
    },
    removeProject (context, payload) {
      axios.delete('/api/projects/' + payload.project.id).then((response) => {
        context.commit('removeProject', payload.project);
      });
    }
  }
}
