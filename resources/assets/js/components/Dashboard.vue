<template>
<div class="container">
    <h1 class="title is-1 has-text-centered">Dashboard</h1>
    <div class="columns">
        <div class="column">
            <div class="box">
                <h2 class="subtitle is-3">Leads</h2>
                <a class="button">Ga naar &gt;&gt;</a>
            </div>
        </div>
        <div class="column">
            <div class="box">
                <h2 class="subtitle is-3">Klanten</h2>
                <router-link class="button" to="/klanten">Ga naar &gt;&gt;</router-link>
            </div>
        </div>
        <div class="column">
            <div class="box">
                <h2 class="subtitle is-3">Projecten</h2>
                <a class="button">Ga naar &gt;&gt;</a>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
    }
</script>