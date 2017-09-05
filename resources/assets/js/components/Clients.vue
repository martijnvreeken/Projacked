<template>
    <div class="container">
        <div class="columns is-multiline">
            <client v-for="client in records" :client="client" :key="client.id"></client>
        </div>
        <hr>
        <p v-if="data.from" class="has-text-centered">Toont {{ amount }} klanten van {{ data.total }} totaal</p>
        <p class="has-text-centered"><a v-show="data.next_page_url" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer klanten</a></p>
    </div>
</template>

<script>
    import client from './Client';
    export default {
        props: {
            api_url: '',
        },
        data() {
            return {
                data: {},
                records: [],
            }
        },
        components: {
          client: client
        },
        created() {
            axios.get(this.api_url).then((response) => {
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
                axios.get(this.data.next_page_url).then((response) => {
                    this.data = response.data;
                    this.records = this.records.concat(response.data.data);
                });
            },
        }
    }
</script>
