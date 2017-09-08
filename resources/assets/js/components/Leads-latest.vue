<template>
    <div class="container box">
        <h4 class="title is-4">Recente aanvragen <router-link class="button is-pulled-right" to="/aanvragen/nieuw"><i class="fa fa-plus" aria-hidden="true"></i></router-link></h4>
        <p v-if="! amount" class="has-text-centered">Geen aanvragen gevonden</p>
        <table v-if="amount" class="table is-striped is-narrow">
            <thead>
                <tr>
                    <th>Prospect</th>
                    <th>Waarde</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="lead in records">
                    <td><a @click="edit(lead)">{{ lead.client }}</a></td>
                    <td v-if="lead.fixed_price > 0"><strong>&euro;{{ lead.fixed_price }}</strong></td>
                    <td v-if="lead.hour_estimate > 0"><strong>&euro; {{ lead.hour_estimate * lead.hour_rate }}</strong></td>
                    <td v-if="lead.fixed_price > 0"><i class="fa fa-lock"></i></td>
                    <td v-if="lead.hour_estimate > 0"><i class="fa fa-unlock"></i></td>
                    <lead-edit :lead="lead"></lead-edit>
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
        <p v-if="amount" class="has-text-centered"><router-link to="/aanvragen">Bekijk alle</router-link></p>
    </div>
</template>

<script>
    import { eventBus } from '../app';
    import form from './Lead-edit';
    import { mapGetters } from 'vuex';

    export default {
        props: {
            api_url: String,
        },
        components: {
            leadEdit: form
        },
        data() {
            return {
                records: [],
            }
        },
        created() {
            let $this = this;
            eventBus.$on('newLead', (event) => {
                $this.records = $this.records.concat(event.lead);
            });
            eventBus.$on('leadDeleted', (event) => {
                let index = $this.records.indexOf(event.lead);
                if(index > -1) {
                    $this.records.splice(index, 1);
                } else {
                  console.error('Lead with index ' + index + ' not found!');
                }
            });

            axios.get(this.api_url).then((response) => {
                this.records = response.data.data;
            });
        },
        computed: {
            ...mapGetters({
              projectsWorth: 'total_worth'
            }),
            amount() {
                return this.records.length;
            }
        },
        methods: {
            edit(lead) {
                // show modal somehow
            }
        }
    }
</script>
