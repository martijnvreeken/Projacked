<template>
    <div class="container">
        <h1 class="title is-1 has-text-centered">Aanvragen</h1>
        <p v-if="records.length == 0" class="has-text-centered">Geen aanvragen gevonden</p>
        <div class="columns is-multiline" v-else>
            <lead v-for="lead in records" :lead="lead" :key="lead.id"></lead>
        </div>
        <hr>
        <p v-if="records.length >= 1" class="has-text-centered">Toont {{ records.length }} aanvragen van {{ total }} totaal</p>
        <p class="has-text-centered"><router-link to="/aanvragen/nieuw">Voeg een aanvraag toe</router-link></p>
        <p class="has-text-centered" v-if="canLoadMore">
          <a @click.prevent="loadMore" href="#" class="button is-primary">Laad meer aanvragen</a>
        </p>
    </div>
</template>

<script>
    import lead from './Lead';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            lead: lead
        },
        computed: {
            ...mapGetters({records: 'leads', total: 'leadsTotal', canLoadMore: 'canLoadMoreLeads'})
        },
        methods: {
            loadMore() {
                axios.get(this.$store.state.leads.next_page_url).then((response) => {
                    $this.$store.commit('addLeads', response.data);
                });
            },
        }
    }
</script>
