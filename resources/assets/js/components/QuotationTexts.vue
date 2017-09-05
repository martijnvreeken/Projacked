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
            <tbody>
            <tr is="q-text" v-for="text in records" :text="text"></tr>
            </tbody>
        </table>
        <q-text-edit v-for="text in records" :text="text" :key="text.id"></q-text-edit>
    </div>
</template>

<script>
    import text from './QuotationText';
    import textEdit from './QuotationText-edit';

    export default {
        props: {
            api_url: String,
        },
        components: {
            qText: text,
            qTextEdit: textEdit
        },
        data() {
            return {
                data: {},
                records: [],
            }
        },
        created() {
            axios.get(this.api_url).then((response) => {
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
