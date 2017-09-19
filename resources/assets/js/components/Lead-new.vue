<template>
  <div class="container">
    <form>
      <div class="field">
        <label class="label">Bedrijfsnaam</label>
        <p class="control">
          <input class="input" type="text" placeholder="Volledige bedrijfsnaam" v-model="client" required>
        </p>
      </div>
      <div class="field">
        <label class="label">Contactpersoon</label>
        <p class="control">
          <input class="input" type="text" placeholder="Volledige naam van de klant" v-model="client_name" required>
        </p>
      </div>
      <div class="field">
        <label class="label">Emailadres</label>
        <p class="control">
          <input class="input" type="email" placeholder="Emailadres van de klant" v-model="client_email" required>
        </p>
      </div>
      <div class="field">
        <label class="label">Telefoonnummer</label>
        <p class="control">
          <input class="input" type="phone" placeholder="Telefoonnummer van de klant" v-model="client_phone">
        </p>
      </div>
      <div class="field">
        <label class="label">Omschrijving werkzaamheden</label>
        <p class="control">
          <textarea class="textarea" type="text" v-model="description" required rows="6"></textarea>
        </p>
      </div>
      <div class="field">
        <label class="label">Voorstel</label>
        <p class="control">
          <textarea class="textarea" type="text" v-model="proposal" rows="6"></textarea>
        </p>
      </div>
      <div class="box">
        <label class="label">Urenschatting</label>
        <p class="control">
          <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="hour_estimate">
        </p>
        <label class="label">Uurtarief</label>
        <p class="control">
          <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="hour_rate">
        </p>
        <p>óf...</p>
        <label class="label">Vast prijs</label>
        <p class="control">
          <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="fixed_price">
        </p>
      </div>
      <footer class="footer">
        <button type="button" class="button is-primary" @click="submit">Opslaan</button>
      </footer>
    </form>
  </div>
</template>

<script>
import { eventBus } from '../app';

export default {
  data() {
    return {
      client: '',
      client_name: '',
      client_email: '',
      client_phone: '',
      description: '',
      proposal: '',
      fixed_price: '',
      hour_rate: '',
      hour_estimate: ''
    };
  },
  methods: {
    submit() {
      if(this.validates()) {
        let $this = this;
        axios.post('/api/leads', this.$data).then(
          function (response) {
            $this.$store.commit('addLead', response.data);
            app.$router.push('/aanvragen');
          }
        ).catch(
          function (error) {
            console.log(error);
          }
        );
      }
    },
    validates() {
      return true;
    }
  }
}
</script>
