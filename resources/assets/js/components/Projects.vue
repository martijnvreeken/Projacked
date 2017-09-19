<template>
    <div class="container">
        <h1 class="title is-1 has-text-centered">Projecten</h1>
        <div class="columns is-multiline">
            <project v-for="project in records" :project="project" :key="project.id"></project>
        </div>
        <hr>
        <p v-if="records.length > 0" class="has-text-centered">Toont {{ records.length }} projecten van {{ total }} totaal</p>
        <p class="has-text-centered"><a v-show="canLoadMore" @click.prevent="loadMore" href="#" class="button is-primary">Laad meer projecten</a></p>
    </div>
</template>

<script>
    import { eventBus } from '../app';
    import project from './Project';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            project: project
        },
        created() {
            let $this = this;
            eventBus.$on('leadPromoted', (event) => {
                $this.loadData();
            });
        },
        computed: {
          ...mapGetters({total_worth: 'projectsWorth', records: 'projects', total: 'projectsTotal', canLoadMore: 'canLoadMoreProjects'})
        },
        methods: {
            loadData() {
              this.$store.dispatch('init');
            },
            loadMore() {
                axios.get(this.data.next_page_url).then((response) => {
                    this.$store.commit('addProjects', response.data);
                });
            },
        }
    }
</script>
