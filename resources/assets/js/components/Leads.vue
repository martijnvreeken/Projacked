<template>
    <div class="container">
        <div class="columns is-multiline">
            <lead v-for="lead in records" :lead="lead"></lead>
            <lead_edit v-for="lead in records" :lead="lead"></lead_edit>
        </div>
        <hr>
        <p v-if="data.from" class="has-text-centered">Toont {{ amount }} aanvragen van {{ data.total }} totaal</p>
        <p class="has-text-centered"><router-link to="/aanvragen/nieuw">Voeg een aanvraag toe</router-link></p>
        <p class="has-text-centered"><a v-show="data.next_page_url" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer aanvragen</a></p>
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
            this.$http.get(this.api_url).then((response) => {
                this.data = response.data;
                this.records = this.records.concat(response.data.data);
            });
        },
        computed: {
            amount() {
                return Math.min((this.data.current_page * this.data.per_page), this.data.total);
            },
        },
        methods: {
            loadMore() {
                this.$http.get(this.data.next_page_url).then((response) => {
                    this.data = response.data;
                    this.records = this.records.concat(response.data.data);
                });
            },
        }
    }
</script>
