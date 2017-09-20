<template>
  <div class="section">
    <div class="container">
      <h2 class="title is-4">Bewerk aanvraag</h2>
      <div class="box">
        <k-text v-model="client.name" title="Klantnaam" placeholder="Volledige bedrijfsnaam"></k-text>
        <k-text v-model="client.contact" title="Contactpersson" placeholder="Volledige naam van de klant"></k-text>
        <k-text v-model="client.email" title="Emailadres" placeholder="Emailadres van de klant"></k-text>
        <k-text v-model="client.phonenumber" title="Telefoonnummer" placeholder="Telefoonnummer van de klant"></k-text>
        <k-text v-model="client.mobilenumber" title="Mobiel nummer" placeholder="Mobiel nummer van de klant"></k-text>
      </div>
      <div class="box">
        <k-text v-model="client.code" title="Klantcode" placeholder="Unieke code"></k-text>
        <k-text v-model="client.debit_number" title="Debiteurnummer" placeholder="Uniek nummer"></k-text>
        <k-text v-model="client.coc_number" title="KvK nummer" placeholder="Nummer van inschrijving Kamer Van Koophandel"></k-text>
        <k-text v-model="client.tax_number" title="BTW nummer" placeholder="Belastingdienst kenmerk"></k-text>
      </div>
      <div class="box">
        <k-text v-model="client.address" title="Straat en huisnummer" placeholder=""></k-text>
        <k-text v-model="client.zipcode" title="Postcode" placeholder=""></k-text>
        <k-text v-model="client.city" title="Plaats" placeholder=""></k-text>
        <k-text v-model="client.country" title="Land" placeholder=""></k-text>
      </div>
      <footer class="footer">
        <a type="button" class="button is-primary" @click="submit">Opslaan</a>
        <a type="button" class="button" @click="redirect">Sluiten</a>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      client: {}
    };
  },
  mounted() {
    // get the lead based on leadId from the uri
    this.client = this.$store.getters.getClientById(this.$route.params.clientId);
  },
  watch: {
    '$route' (to, from) {
      if(typeof to.params.clientId !== 'undefined') {
        this.client = this.$store.getters.getClientById(to.params.clientId);
      }
    }
  },
  methods: {
    submit() {
      if(this.validates()) {
        const $this = this;
        axios.put('/api/clients/' + this.client.id, this.client).then(
          (response) => { $this.redirect(); }
        ).catch(
          (error) => { console.log(error); }
        );
      }
    },
    validates() {
      return true;
    },
    redirect() {
      this.$router.push({
        name: 'clients'
      });
    },
  }
}
</script>
