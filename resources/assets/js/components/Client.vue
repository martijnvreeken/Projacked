<template>
    <li class="collection-item">
        <h5>{{ client.name }}</h5>
        <p>{{ client.code }}</p>
    </li>
</template>

<script>
    export default {
        props: { client: Object }
    }
</script>