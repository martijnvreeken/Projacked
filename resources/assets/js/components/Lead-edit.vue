<template>
  <div class="section">
    <div class="container">
      <h2 class="title is-4">Bewerk aanvraag</h2>
        <div class="field">
          <label class="label">Bedrijfsnaam</label>
          <p class="control">
            <input class="input" type="text" placeholder="Volledige bedrijfsnaam" v-model="lead.client" required>
          </p>
        </div>
        <div class="field">
          <label class="label">Contactpersoon</label>
          <p class="control">
            <input class="input" type="text" placeholder="Volledige naam van de klant" v-model="lead.client_name" required>
          </p>
        </div>
        <div class="field">
          <label class="label">Emailadres</label>
          <p class="control">
            <input class="input" type="email" placeholder="Emailadres van de klant" v-model="lead.client_email" required>
          </p>
        </div>
        <div class="field">
          <label class="label">Telefoonnummer</label>
          <p class="control">
            <input class="input" type="phone" placeholder="Telefoonnummer van de klant" v-model="lead.client_phone">
          </p>
        </div>
        <div class="field">
          <label class="label">Omschrijving werkzaamheden</label>
          <p class="control">
            <textarea class="textarea" type="text" v-model="lead.description" required rows="6"></textarea>
          </p>
        </div>
        <div class="field">
          <label class="label">Voorstel</label>
          <p class="control">
            <textarea class="textarea" type="text" v-model="lead.proposal" rows="6"></textarea>
          </p>
        </div>
        <div class="box">
          <label class="label">Uurtarief</label>
          <p class="control">
            <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="lead.hour_rate">
          </p>
          <label class="label">Urenschatting</label>
          <p class="control">
            <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="lead.hour_estimate">
          </p>
          <p>óf...</p>
          <label class="label">Vast prijs</label>
          <p class="control">
            <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="lead.fixed_price">
          </p>
        </div>
      <footer class="footer">
        <a type="button" class="button is-default" @click.prevent="submit">Opslaan</a>
        <a class="button is-primary" @click.prevent="quote">Offerte</a>
        <a class="button is-success" @click.prevent="promote">Akkoord</a>
        <a class="button is-danger" @click.prevent="remove">Verwijder</a>
        <a type="button" class="button" @click.prevent="redirect">Sluiten</a>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lead: {}
    };
  },
  mounted() {
    // get the lead based on leadId from the uri
    this.lead = this.$store.getters.getLeadById(this.$route.params.leadId);
  },
  watch: {
    '$route' (to, from) {
      if(typeof to.params.leadId !== 'undefined') {
        this.lead = this.$store.getters.getLeadById(to.params.leadId);
      }
    }
  },
  methods: {
    submit() {
      let $this = this;
      if(this.validates()) {
        axios.put('/api/leads/'+this.lead.id, this.lead).then(
          function (response) {
            $this.redirect();
          }
        ).catch(
          function (error) {
            console.log(error);
          }
        );
      }
    },
    promote() {
      let $this = this;
      axios.post('/api/leads/promote', this.lead).then(
        function (response) {
          // successfuly promoted the lead, it's no longer available
          // $this.$store.commit('removeLead', $this.lead);
          $this.$store.dispatch('init');
          app.$router.push({ name: 'projects'});
        }
      ).catch(
        function (error) {
          console.log(error);
        }
      );
    },
    quote() {
      axios.post('/api/quotations', this.lead).then(
        function (response) {
          // successfuly created the quotation
          this.redirect();
        }
      ).catch(
        function (error) {
          console.log(error);
        }
      );
    },
    remove() {
      // TODO: put this in a Promise
      this.$store.dispatch('removeLead', { lead: this.lead });
      this.redirect();
    },
    validates() {
      return true;
    },
    redirect() {
      app.$router.push({
        name: 'leads'
      });
    },
  }
}
</script>
