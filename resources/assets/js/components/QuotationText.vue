<template>
    <tr class="">
        <td>
          {{ text.id }}
        </td>
        <td>
            {{ text.title }}
        </td>
        <td>
          <a @click="edit()">Edit</a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: { text: Object },
        methods: {
            edit() {
                document.getElementById('q-text-modal-'+this.text.id).className = 'modal is-active';
            }
        }
    }
</script>
