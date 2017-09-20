<template>
  <div class="container">
    <h1 class="title is-1 has-text-centered">Klanten</h1>
    <div class="columns is-multiline">
      <client v-for="client in records" :client="client" :key="client.id"></client>
    </div>
    <hr>
    <p v-if="records.length > 0" class="has-text-centered">Toont {{ records.length }} klanten van {{ total }} totaal</p>
    <p class="has-text-centered" v-if="canLoadMore">
      <a @click.prevent="loadMore" href="#" class="button is-primary">Laad meer klanten</a>
    </p>
  </div>
</template>

<script>
import client from './Client';
import { mapGetters } from 'vuex';

export default {
  components: {
    client: client
  },
  computed: {
    ...mapGetters({records: 'clients', total: 'clientsTotal', canLoadMore: 'canLoadMoreClients'})
  },
  methods: {
    loadMore() {
      axios.get(this.$store.state.clients.next_page_url).then((response) => {
        $this.$store.commit('addClients', response.data);
      });
    },
  }
}
</script>
