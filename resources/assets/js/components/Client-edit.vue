<template>
<div class="modal" :id="`client-modal-${client.id}`">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">Bewerk Klant</p>
        <button class="delete" @click="cancel()"></button>
    </header>
    <section class="modal-card-body">
        <form>
            <div class="box">
                <k-text v-model="client.name" title="Klantnaam" placeholder="Volledige bedrijfsnaam"></k-text>
                <k-text v-model="client.contact" title="Contactpersson" placeholder="Volledige naam van de klant"></k-text>
                <k-text v-model="client.email" title="Emailadres" placeholder="Emailadres van de klant"></k-text>
                <k-text v-model="client.phonenumber" title="Telefoonnummer" placeholder="Telefoonnummer van de klant"></k-text>
                <k-text v-model="client.mobilenumber" title="Mobiel nummer" placeholder="Mobiel nummer van de klant"></k-text>
            </div>
            <div class="box">
                <k-text v-model="client.code" title="Klantcode" placeholder="Unieke code"></k-text>
                <k-text v-model="client.debit_number" title="Debiteurnummer" placeholder="Uniek nummer"></k-text>
                <k-text v-model="client.coc_number" title="KvK nummer" placeholder="Nummer van inschrijving Kamer Van Koophandel"></k-text>
                <k-text v-model="client.tax_number" title="BTW nummer" placeholder="Belastingdienst kenmerk"></k-text>
            </div>
            <div class="box">
                <k-text v-model="client.address" title="Straat en huisnummer" placeholder=""></k-text>
                <k-text v-model="client.zipcode" title="Postcode" placeholder=""></k-text>
                <k-text v-model="client.city" title="Plaats" placeholder=""></k-text>
                <k-text v-model="client.country" title="Land" placeholder=""></k-text>
            </div>
        </form>
    </section>
    <footer class="modal-card-foot">
        <a type="button" class="button is-primary" @click="submit">Opslaan</a>
    </footer>
  </div>
</div>
</template>

<script>
    export default {
        props: {
            client: Object
        },
        methods: {
            submit() {
                if(this.validates()) {
                    axios.put('/api/clients/'+this.client.id, this.client).then(
                        function (response) {
                            this.cancel();
                        }
                    ).catch(
                        function (error) {
                            console.log(error);
                        }
                    );
                }
            },
            validates() {
                return true;
            },
            cancel() {
                document.getElementById('client-modal-'+this.client.id).className = 'modal';
            },
        }
    }
</script>
