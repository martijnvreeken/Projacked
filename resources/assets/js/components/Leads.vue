<template>
    <div class="container">
        <h1 class="title is-1 has-text-centered">Aanvragen</h1>
        <p v-if="! amount" class="has-text-centered">Geen aanvragen gevonden</p>
        <div class="columns is-multiline">
            <lead v-for="lead in records" :lead="lead" :key="lead.id"></lead>
        </div>
        <hr>
        <p v-if="amount" class="has-text-centered">Toont {{ amount }} aanvragen van {{ data.total }} totaal</p>
        <p class="has-text-centered"><router-link to="/aanvragen/nieuw">Voeg een aanvraag toe</router-link></p>
        <p v-if="data.next_page_url" class="has-text-centered"><a @click.prevent="loadMore" href="#" class="button is-primary">Laad meer aanvragen</a></p>
    </div>
</template>

<script>
    import { eventBus } from '../app';
    import lead from './Lead';
    import { mapGetters } from 'vuex';

    export default {
        props: {
            api_url: String,
        },
        components: {
            lead: lead
        },
        data() {
            return {
                data: {},
                edit: false
            }
        },
        created() {
            axios.get(this.api_url).then((response) => {
                this.data = response.data;
                if(response.data.data.length > 0) {
                    this.$store.commit('addLeads', response.data.data);
                }
            });
        },
        computed: {
            ...mapGetters({records: 'leads'}),
            amount() {
                return this.records.length;
            },
        },
        methods: {
            loadMore() {
                axios.get(this.data.next_page_url).then((response) => {
                    this.data = response.data;
                    if(response.data.data.length > 0) {
                        $this.$store.commit('addLeads', response.data.data);
                    }
                });
            },
        }
    }
</script>
