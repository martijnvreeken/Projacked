<template>
    <div class="container">
        <div class="columns is-multiline">
            <project v-for="project in records" :project="project"></project>
            <project_edit v-for="project in records" :project="project"></project_edit>
        </div>
        <hr>
        <p v-if="data.from" class="has-text-centered">Toont {{ amount }} projecten van {{ data.total }} totaal</p>
        <p class="has-text-centered"><a v-show="data.next_page_url" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer projecten</a></p>
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
                return this.records.length;
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