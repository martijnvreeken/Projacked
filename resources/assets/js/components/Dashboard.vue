<template>
<div class="container">
    <h1 class="title is-1 has-text-centered">Dashboard</h1>
    <latest-leads></latest-leads>
    <latest-projects api_url="/api/projects"></latest-projects>
    <div class="columns">
        <div class="column">
            <router-link to="/klanten">
                <div class="box is-clearfix">
                    <h2 class="subtitle is-3">Klanten</h2>
                    <span class="button is-pulled-right">Ga naar &gt;&gt;</span>
                </div>
            </router-link>
        </div>
    </div>
</div>
</template>

<script>
    import leads from './Leads-latest';
    import projects from './Projects-latest';
    export default {
        components: {
            latestLeads: leads,
            latestProjects: projects
        },
        created() {
            this.$store.dispatch('init');
        }
    }
</script>
