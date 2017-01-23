<template>
    <div>
        <form>
            <label class="label">Bedrijfsnaam</label>
            <p class="control">
                <input class="input" type="text" placeholder="Volledige bedrijfsnaam" v-model="client" required>
            </p>
            <label class="label">Contactpersoon</label>
            <p class="control">
                <input class="input" type="text" placeholder="Volledige naam van de klant" v-model="client_name" required>
            </p>
            <label class="label">Emailadres</label>
            <p class="control">
                <input class="input" type="email" placeholder="Emailadres van de klant" v-model="client_email" required>
            </p>
            <label class="label">Telefoonnummer</label>
            <p class="control">
                <input class="input" type="phone" placeholder="Telefoonnummer van de klant" v-model="client_phone">
            </p>
            <label class="label">Omschrijving werkzaamheden</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="description" required rows="6"></textarea>
            </p>
            <label class="label">Voorstel</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="proposal" rows="6"></textarea>
            </p>
            <label class="label">Vast prijs</label>
            <p class="control">
                <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="fixed_price">
            </p>
            <p>óf...</p>
            <div class="box">
                <label class="label">Urenschatting</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="hour_estimate">
                </p>
                <label class="label">Uurtarief</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="hour_rate">
                </p>
            </div>
            <button type="button" class="button is-primary" @click="submit">Opslaan</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                client: '',
                client_name: '',
                client_email: '',
                client_phone: '',
                description: '',
                proposal: '',
                fixed_price: '',
                hour_rate: '',
                hour_estimate: ''
            };
        },
        methods: {
            submit() {
                if(this.validates()) {
                    this.$http.post('/api/leads', this.$data).then(
                        function (response) {
                            app._router.push('/aanvragen');
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
            }
        }
    }
</script>
