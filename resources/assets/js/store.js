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
    leads: (state) => {
      return state.leads.items;
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
    projectsTotal: (state) => {
      return state.projects.total;
    },
    getProjectById: (state) => (id) => {
      return state.projects.items.find(project => project.id === id);
    },
    canLoadMoreProjects: (state) => {
      return state.projects.next_page_url !== null;
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
      // console.info('remove lead at pos ' + i);
      state.leads.items.splice(i,1);
    },
    setProjects: (state, data) => {
      state.projects.total = data.total;
      state.projects.items = data.data;
      state.projects.next_page_url = data.next_page_url;
    },
    addProjects: (state, data) => {
      state.projects.total = data.total;
      if(data.data.length > 0) {
        state.projects.items = state.projects.items.concat(data.data);
        state.projects.next_page_url = data.next_page_url;
      }
    },
    removeProject: (state, item) => {
      let i = state.projects.items.indexOf(item);
      if(i == -1) {
        console.error('Project not found');
        return;
      }
      state.projects.items.splice(i, 1);
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
