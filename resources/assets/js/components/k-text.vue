<template>
    <div class="control">
        <label class="label">{{ title }}</label>
        <p class="control">
            <input class="input" type="text" :value="value" @input="update($event.target.value)">
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            value: '',
            title: '',
        },
        methods: {
            update(value) {
                this.$emit('input', value);
            }
        }
    }
</script>