<template>
<div class="container">
    <h1 class="title is-1 has-text-centered">Dashboard</h1>
    <latest-leads api_url="/api/leads"></latest-leads>
    <div class="columns">
        <div class="column">
            <router-link to="/klanten">
                <div class="box is-clearfix">
                    <h2 class="subtitle is-3">Klanten</h2>
                    <span class="button is-pulled-right">Ga naar &gt;&gt;</span>
                </div>
            </router-link>
        </div>
        <div class="column">
            <router-link to="/projecten">
                <div class="box is-clearfix">
                    <h2 class="subtitle is-3">Projecten</h2>
                    <span class="button is-pulled-right">Ga naar &gt;&gt;</span>
                </div>
            </router-link>
        </div>
    </div>
</div>
</template>

<script>
    export default {
    }
</script>