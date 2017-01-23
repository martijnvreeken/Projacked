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
                    <td><a @click="edit(project.id)">{{ project.client.name }}</a></td>
                    <td v-if="project.fixed_price > 0"><strong>&euro;{{ project.fixed_price }}</strong></td>
                    <td v-if="project.hour_estimate > 0"><strong>&euro; {{ project.hour_estimate * project.hour_rate }}</strong></td>
                    <td v-if="project.fixed_price > 0"><i class="fa fa-lock"></i></td>
                    <td v-if="project.hour_estimate > 0"><i class="fa fa-unlock"></i></td>
                    <project_edit :project="project"></project_edit>
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
        <p class="has-text-centered"><router-link to="/projecten">Bekijk alle</router-link></p>
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
            amount() {
                return this.records.length;
            },
            total_worth() {
                let total = 0;
                this.records.forEach(function (project) {
                    if(project.hour_estimate) {
                        total += (project.hour_estimate * project.hour_rate);
                    } else {
                        total += project.fixed_price;
                    }
                });
                return total;
            }
        },
        methods: {
            edit(id) {
                $('#project-modal-'+id).addClass('is-active');
            }
        }
    }
</script>