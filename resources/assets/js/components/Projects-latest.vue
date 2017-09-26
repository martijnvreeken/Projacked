<template>
    <div class="container box">
        <h4 class="title is-4">Recente projecten <!-- <router-link class="button is-pulled-right" to="/projecten/nieuw"><i class="fa fa-plus" aria-hidden="true"></i></router-link> --></h4>
        <p v-if="! amount" class="has-text-centered">Geen projecten gevonden</p>
        <table v-if="amount" class="table is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>Klant</th>
                    <th>Waarde</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in records">
                    <td><a @click="edit(project)">{{ project.client.name }}</a></td>
                    <td>
                      <span v-if="project.fixed_price > 0"><strong>&euro; {{ project.fixed_price }}</strong></span>
                      <span v-if="project.hour_estimate > 0"><strong>&euro; {{ project.hour_estimate * project.hour_rate }}</strong></span>
                      <span v-else>&nbsp;</span>
                    </td>
                    <td>
                      <span v-if="project.fixed_price > 0"><i class="fa fa-lock"></i></span>
                      <span v-if="project.hour_estimate > 0"><i class="fa fa-unlock"></i></span>
                      <span v-else>&nbsp;</span>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Totaal:</th>
                    <th>&euro; {{ total_worth }}</th>
                    <th>&nbsp;</th>
                </tr>
            </tfoot>
        </table>
        <hr>
        <p v-if="amount" class="has-text-centered"><router-link to="/projecten">Bekijk alle</router-link></p>
    </div>
</template>

<script>
    import { eventBus } from '../app';
    import { mapGetters } from 'vuex';

    export default {
        created() {
            let $this = this;
            eventBus.$on('leadPromoted', (event) => {
                $this.refresh();
            });
        },
        computed: {
            ...mapGetters({total_worth: 'projectsWorth', records: 'topProjects', amount: 'projectsTotal'})
        },
        methods: {
            edit(project) {
                this.$router.push({
                  name: 'project-edit',
                  params: {
                    projectId: project.id
                  }
                });
            },
            refresh() {
                this.$store.dispatch('init');
            // },
            // indexOf(search) {
            //     this.records.forEach((project) => {
            //         if(project.id === search.id) {
            //             return this.records.indexOf(project);
            //         }
            //         return -1;
            //     });
            }
        }
    }
</script>
