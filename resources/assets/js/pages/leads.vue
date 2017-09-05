<template>
    <leads api_url="/api/leads"></leads>
</template>

<script>
    import leads from '../components/Leads';
    export default {
        components: {
            leads: leads
        }
    }
</script>
