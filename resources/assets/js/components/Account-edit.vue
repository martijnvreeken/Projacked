<template>
<div class="columns is-mobile">
    <div class="column is-hidden-touch is-one-quarter-desktop">&nbsp;</div>
    <div class="column is-half-desktop">
        <div class="box">
            <div class="notification is-warning is-active" v-show="hasErrors">Naam en email mogen niet leeg zijn</div>
            <form @submit.prevent>
            <k-text v-model="account.name" title="Je naam"></k-text>
            <k-text v-model="account.email" title="Je emailadres"></k-text>
            <div class="field">
                <button type="button" class="button is-primary" @click="submit">Opslaan</button>
            </div>
          </form>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                account: {
                    name: '',
                    email: ''
                },
                hasErrors: false
            }
        },
        created() {
          this.account = app.account;
        },
        methods: {
            submit() {
                let $this = this;
                if(this.validates()) {
                    axios.put('/api/account', this.account).then(
                        function (response) {
                            app.setAccount( $this.account );
                            $this.hasErrors = false;
                            // show a message
                        }
                    ).catch(
                        function (error) {
                            console.error(error);
                        }
                    );
                } else {
                    this.hasErrors = true;
                }
            },
            validates() {
                return (this.account.name !== '') && (this.account.email !== '');
            }
        }
    }
</script>
