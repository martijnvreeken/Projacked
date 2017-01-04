<template>
    <div class="card is-pulled-left is-4">
        <div class="card-content">
            <div class="content">
                <h5>{{ client.name }}</h5>
                <p><small>Code:</small> {{ client.code }}</p>
                <br>
                <small>{{ client.created_at }}</small>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: { client: Object }
    }
</script>