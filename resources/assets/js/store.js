export const store_config = {
  state: {
    leads: {
      total: 0,
      items: [],
      next_page_url: null
    },
    projects: [],
    clients: [],
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
    projectsWorth: (state) => {
      return state.projects.reduce( (sum, project) => {
        if(project.hour_estimate) {
            return sum + (project.hour_estimate * project.hour_rate);
        } else {
            return sum + project.fixed_price;
        }
      }, 0);
    },
    leads: (state) => {
      return state.leads.items;
    },
    leadsTotal: (state) => {
      return state.leads.total;
    },
    getLeadById: (state) => (id) => {
      return state.leads.items.find(lead => lead.id === id);
    },
    canLoadMore: (state) => {
        return state.leads.next_page_url !== null;
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
    addLeads: (state, data) => {
      state.leads.total = data.total;
      if(data.data.length > 0) {
          state.leads.items = state.leads.items.concat(data.data);
          state.leads.next_page_url = data.next_page_url;
      }
    },
    removeLead: (state, item) => {
      let i = state.leads.items.indexOf(item);
      if(i == -1) {
        console.error('lead not found!');
        return;
      }
      console.info('remove lead at pos ' + i);
      state.leads.items.splice(i,1);
    },
    addProjects: (state, items) => {
      state.projects = state.projects.concat(items);
    }
  },
  actions: {
    init (context) {
      console.info('init store');
      axios.get('/api/leads').then((response) => {
          context.commit('addLeads', response.data);
      });
    },
    removeLead (context, payload) {
      axios.delete('/api/leads/'+payload.lead.id).then((response) => {
        context.commit('removeLead', payload.lead);
      });
    }
  }
}
