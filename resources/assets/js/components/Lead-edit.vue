<template>
<div class="modal" :id="`lead-modal-${lead.id}`">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">Bewerk aanvraag</p>
        <button class="delete" @click="cancel()"></button>
    </header>
    <section class="modal-card-body">
        <form>
            <label class="label">Bedrijfsnaam</label>
            <p class="control">
                <input class="input" type="text" placeholder="Volledige bedrijfsnaam" v-model="lead.client" required>
            </p>
            <label class="label">Contactpersoon</label>
            <p class="control">
                <input class="input" type="text" placeholder="Volledige naam van de klant" v-model="lead.client_name" required>
            </p>
            <label class="label">Emailadres</label>
            <p class="control">
                <input class="input" type="email" placeholder="Emailadres van de klant" v-model="lead.client_email" required>
            </p>
            <label class="label">Telefoonnummer</label>
            <p class="control">
                <input class="input" type="phone" placeholder="Telefoonnummer van de klant" v-model="lead.client_phone">
            </p>
            <label class="label">Omschrijving werkzaamheden</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="lead.description" required rows="6"></textarea>
            </p>
            <label class="label">Voorstel</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="lead.proposal" rows="6"></textarea>
            </p>
            <div class="box">
                <label class="label">Uurtarief</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="lead.hour_rate">
                </p>
                <label class="label">Urenschatting</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="lead.hour_estimate">
                </p>
            </div>
            <p>óf...</p>
            <label class="label">Vast prijs</label>
            <p class="control">
                <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="lead.fixed_price">
            </p>
        </form>
    </section>
    <footer class="modal-card-foot">
        <a type="button" class="button" @click="submit">Opslaan</a>
        <a class="button is-primary" @click="quote()">Offerte</a>
        <a class="button is-success" @click="promote()">Akkoord</a>
        <a class="button is-danger" @click="remove()">Verwijderen</a>
    </footer>
  </div>
</div>
</template>

<script>
    export default {
        props: {
            lead: Object
        },
        methods: {
            submit() {
                if(this.validates()) {
                    this.$http.put('/api/leads/'+this.lead.id, this.lead).then(
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
            remove() {
                this.$http.delete('/api/leads/'+this.lead.id).then(
                    function (response) {
                        var index = this.$parent.records.indexOf(this.lead);
                        if(index > -1) {
                            this.$parent.records.splice(index, 1);
                        }
                        this.cancel();
                    }
                ).catch(
                    function (error) {
                        console.log(error);
                    }
                );
            },
            promote() {
                this.$http.post('/api/leads/promote', this.lead).then(
                    function (response) {
                        // successfuly promoted the lead, it's no longer available
                        var index = this.$parent.records.indexOf(this.lead);
                        if(index > -1) {
                            this.$parent.records.splice(index, 1);
                        }
                        app._router.push('/projecten');
                    }
                ).catch(
                    function (error) {
                        console.log(error);
                    }
                );
            },
            quote() {
                this.$http.post('/api/quotations', this.lead).then(
                    function (response) {
                        // successfuly created the quotation
                        this.cancel();
                    }
                ).catch(
                    function (error) {
                        console.log(error);
                    }
                );
            },
            validates() {
                return true;
            },
            cancel() {
                document.getElementById('lead-modal-'+this.lead.id).className = 'modal';
            },
        }
    }
</script>
