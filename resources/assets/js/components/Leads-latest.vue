<template>
    <div class="container box">
        <h4 class="title is-4">Recente aanvragen <router-link class="button is-pulled-right" to="/aanvragen/nieuw"><i class="fa fa-plus" aria-hidden="true"></i></router-link></h4>
        <p v-if="! amount" class="has-text-centered">Geen aanvragen gevonden</p>
        <table v-if="amount" class="table is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>Prospect</th>
                    <th>Waarde</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="lead in records">
                    <td><router-link :to="{name: 'lead-edit', params: { leadId: lead.id }}">{{ lead.client }}</router-link></td>
                    <td>
                      <span v-if="lead.fixed_price > 0"><strong>&euro; {{ lead.fixed_price }}</strong></span>
                      <span v-if="lead.hour_estimate > 0"><strong>&euro; {{ lead.hour_estimate * lead.hour_rate }}</strong></span>
                      <span v-else>&nbsp;</span>
                    </td>
                    <td>
                      <span v-if="lead.fixed_price > 0"><i class="fa fa-lock"></i></span>
                      <span v-if="lead.hour_estimate > 0"><i class="fa fa-unlock"></i></span>
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
        <p v-if="amount" class="has-text-centered"><router-link to="/aanvragen">Bekijk alle</router-link></p>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        computed: {
            ...mapGetters({total_worth: 'leadsWorth', records: 'topLeads', amount: 'leadsTotal'}),
        },
        methods: {
            edit(lead) {
                app.$router.push({
                    name: 'lead-edit',
                    params: {
                        leadId: lead.id
                    }
                });
            }
        }
    }
</script>
