<template>
    <div class="container">
        <p v-if="! amount" class="has-text-centered">Geen aanvragen gevonden</p>
        <div class="columns is-multiline">
            <lead v-for="lead in records" :lead="lead" :key="lead.id"></lead>
            <lead_edit v-for="lead in records" :lead="lead" :key="lead.id"></lead_edit>
        </div>
        <hr>
        <p v-if="amount" class="has-text-centered">Toont {{ amount }} aanvragen van {{ data.total }} totaal</p>
        <p class="has-text-centered"><router-link to="/aanvragen/nieuw">Voeg een aanvraag toe</router-link></p>
        <p v-if="data.next_page_url" class="has-text-centered"><a @click.prevent="loadMore" href="#" class="button is-primary">Laad meer aanvragen</a></p>
    </div>
</template>

<script>
    export default {
        props: {
            api_url: String,
        },
        data() {
            return {
                data: {},
                records: [],
            }
        },
        created() {
            axios.get(this.api_url).then((response) => {
                this.data = response.data;
                if(response.data.data.length > 0) {
                    this.records = this.records.concat(response.data.data);
                }
            });
        },
        computed: {
            amount() {
                return this.records.length;
            },
        },
        methods: {
            loadMore() {
                axios.get(this.data.next_page_url).then((response) => {
                    this.data = response.data;
                    if(response.data.data.length > 0) {
                        this.records = this.records.concat(response.data.data);
                    }
                });
            },
        }
    }
</script>
