<template>
    <div class="container">
        <h1 class="title is-1 has-text-centered">Projecten</h1>
        <div class="columns is-multiline">
            <project v-for="project in records" :project="project" :key="project.id"></project>
        </div>
        <hr>
        <p v-if="data.from" class="has-text-centered">Toont {{ amount }} projecten van {{ data.total }} totaal</p>
        <p class="has-text-centered"><a v-show="data.next_page_url" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer projecten</a></p>
    </div>
</template>

<script>
    import { eventBus } from '../app';
    import project from './Project';

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
        components: {
            project: project
        },
        created() {
            let $this = this;
            eventBus.$on('projectDeleted', (event) => {
                let index = $this.records.indexOf(event.project);
                if(index > -1) {
                    $this.records.splice(index, 1);
                }
            });
            eventBus.$on('leadPromoted', (event) => {
                $this.loadData();
            });
            this.loadData();
        },
        computed: {
            amount() {
                return this.records.length;
            },
        },
        methods: {
            loadData() {
              axios.get(this.api_url).then((response) => {
                  this.data = response.data;
                  this.records = this.records.concat(response.data.data);
              });
            },
            loadMore() {
                axios.get(this.data.next_page_url).then((response) => {
                    this.data = response.data;
                    this.records = this.records.concat(response.data.data);
                });
            },
        }
    }
</script>
