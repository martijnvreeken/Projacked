<template>
    <div class="container box">
        <h4 class="title is-4">Recente projecten <!-- <router-link class="button is-pulled-right" to="/projecten/nieuw"><i class="fa fa-plus" aria-hidden="true"></i></router-link> --></h4>
        <p v-if="! amount" class="has-text-centered">Geen projecten gevonden</p>
        <table v-if="amount" class="table is-striped is-narrow">
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
                    <td v-if="project.fixed_price > 0"><strong>&euro;{{ project.fixed_price }}</strong></td>
                    <td v-if="project.hour_estimate > 0"><strong>&euro; {{ project.hour_estimate * project.hour_rate }}</strong></td>
                    <td v-if="project.fixed_price > 0"><i class="fa fa-lock"></i></td>
                    <td v-if="project.hour_estimate > 0"><i class="fa fa-unlock"></i></td>
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
        <component :is="form"></component>
        <hr>
        <p v-if="amount" class="has-text-centered"><router-link to="/projecten">Bekijk alle</router-link></p>
    </div>
</template>

<script>
    import Vue from 'vue';
    import { eventBus } from '../app';
    import form from './Project-edit';
    import { mapGetters } from 'vuex';

    export default {
        props: {
            api_url: String,
        },
        components: {
            projectEdit: form
        },
        data() {
            return {
                records: [],
                form: form
            }
        },
        created() {
            let $this = this;
            eventBus.$on('projectDeleted', (event) => {
                let index = $this.indexOf(event.project);
                console.info('dash::project deleted: ' + index);
                if(index > -1) {
                    $this.records.splice(index, 1);
                }
            });
            eventBus.$on('leadPromoted', (event) => {
                $this.refresh();
            });

            this.refresh();
        },
        computed: {
            ...mapGetters({total_worth: 'projectsWorth'}),
            amount() {
                return this.records.length;
            }
        },
        methods: {
            edit(project) {
                console.info('Editing project: ' + project.id);
                Vue.set(this.form, 'project', project);
                Vue.set(this.form, 'show', true);
                console.log(this.form);
            },
            refresh() {
                axios.get(this.api_url).then((response) => {
                    this.records = response.data.data;
                });
            },
            indexOf(search) {
                this.records.forEach((project) => {
                    if(project.id === search.id) {
                        return this.records.indexOf(project);
                    }
                    return -1;
                });
            }
        }
    }
</script>
