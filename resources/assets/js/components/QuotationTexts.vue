<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Volgnr.</th>
                    <th>Titel</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <q-text v-for="text in records" :text="text"></q-text>
            <q-text_edit v-for="text in records" :text="text"></q-text_edit>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            api_url: String,
        },
        data() {
            return {
                data: {},
                records: [],
            }
        },
        created() {
            this.$http.get(this.api_url).then((response) => {
                this.data = response;
                if(response.data.length > 0) {
                    this.records = this.records.concat(response.data);
                }
            });
        },
        computed: {
            amount() {
                return this.records.length;
            },
        },
    }
</script>