<template>
    <div class="container">
        <ul class="collection">
            <client v-for="client in clients" :client="client"></client>
        </ul>
        <p v-if="data.from">Toont {{ amount }} klanten van {{ data.total }} totaal</p>
        <a v-show="data.next_page_url" @click.prevent="loadMore" href="#">Laad meer klanten</a>
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
        mounted() {
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