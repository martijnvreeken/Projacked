<template>
    <projects api_url="/api/projects"></projects>
</template>

<script>
    import projects from '../components/Projects';
    export default {
        components: {
            projects: projects
        }
    }
</script>
