<template>
    <div class="container box">
        <h4 class="title is-4">Recente aanvragen <router-link class="button is-pulled-right" to="/aanvragen/nieuw"><i class="fa fa-plus" aria-hidden="true"></i></router-link></h4>
        <table class="table is-striped is-narrow">
            <thead>
                <tr>
                    <th>Prospect</th>
                    <th>Waarde</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="lead in records">
                    <td>{{ lead.client_name }}</td>
                    <td v-if="lead.fixed_price > 0"><strong>&euro;{{ lead.fixed_price }}</strong></td>
                    <td v-if="lead.hour_estimate > 0"><strong>&euro; {{ lead.hour_estimate * lead.hour_rate }}</strong></td>
                    <td v-if="lead.fixed_price > 0"><i class="fa fa-lock"></i></td>
                    <td v-if="lead.hour_estimate > 0"><i class="fa fa-unlock"></i></td>
                    <td><a @click="edit(lead.id)"><i class="fa fa-pencil-square"></i></a></td>
                    <lead_edit :lead="lead"></lead_edit>
                </tr>
            </tbody>
        </table>
        <hr>
        <p class="has-text-centered"><router-link to="/aanvragen">Bekijk alle</router-link></p>
    </div>
</template>

<script>
    export default {
        props: {
            api_url: String,
        },
        data() {
            return {
                records: [],
            }
        },
        created() {
            this.$http.get(this.api_url).then((response) => {
                this.records = response.data.data;
            });
        },
        computed: {
        },
        methods: {
            edit(id) {
                $('#lead-modal-'+id).addClass('is-active');
            }
        }
    }
</script>

