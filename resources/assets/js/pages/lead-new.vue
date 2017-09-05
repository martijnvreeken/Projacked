<template>
    <div class="container">
        <h1 class="title is-4">Nieuwe aanvraag</h1>
        <new-lead></new-lead>
    </div>
</template>

<script>
    import form from '../components/Lead-new';
    export default {
        components: {
            newLead: form
        }
    }
</script>
