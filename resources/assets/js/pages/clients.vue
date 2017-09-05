<template>
    <clients api_url="/api/clients"></clients>
</template>

<script>
    import clients from '../components/Clients';
    export default {
        components: {
            clients: clients
        }
    }
</script>
