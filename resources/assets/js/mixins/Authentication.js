export default {
  data() {
    return {
      token: ""
    };
  },
  computed: {
    authenticated: () => {
      return this.token !== "";
    }
  },
  methods: {
    setToken(token) {
        this.token = token;
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    },
    setAccount(user){
      this.$store.commit('setAccount', user);
    },
    getAccount() {
      return this.$store.state.account;
    }
  }

}
