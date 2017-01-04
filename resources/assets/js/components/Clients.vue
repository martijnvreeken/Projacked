<template>
    <div class="container">
        <div class="is-clearfix">
            <client v-for="client in clients" :client="client"></client>
        </div>
        <hr>
        <p v-if="data.from" class="has-text-centered">Toont {{ amount }} klanten van {{ data.total }} totaal</p>
        <p class="has-text-centered"><a v-show="data.next_page_url" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer klanten</a></p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {},
                clients: [],
            }
        },
        created() {
            this.$http.get('/api/clients').then((response) => {
                this.data = response.data;
                this.clients = this.clients.concat(response.data.data);
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
                    this.clients = this.clients.concat(response.data.data);
                });
            },
        }
    }
</script>