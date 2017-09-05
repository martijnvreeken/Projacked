<template>
    <quotation-texts api_url="/api/texts"></quotation-texts>
</template>

<script>
    import quotations from '../components/QuotationTexts';
    export default {
        components: {
            quotationTexts: quotations
        }
    }
</script>
