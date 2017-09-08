export default {
  data() {
    return {
      token: "",
      account: {
        name: "",
        email: ""
      }
    };
  },
  computed: {
    authenticated: () => {
      return this.token !== "";
    },
  },
  methods: {
    setToken(token) {
        this.token = token;
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    },
    setAccount(user){
      this.account = user;
    }    
  }

}
