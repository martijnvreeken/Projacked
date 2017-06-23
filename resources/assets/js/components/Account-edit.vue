<template>
<div class="modal" id="account-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Jouw account</p>
            <button class="delete" @click="cancel()"></button>
        </header>
        <section class="modal-card-body">
            <div class="notification is-warning" id="invalid">Naam en email mogen niet leeg zijn</div>
            <k-text v-model="account.name" title="Je naam"></k-text>
            <k-text v-model="account.email" title="Je emailadres"></k-text>
        </section>
        <footer class="modal-card-foot">
            <a class="button is-primary" @click="submit()">Opslaan</a>
        </footer>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return { account: {
                name: '',
                email: ''
            } }
        },
        methods: {
            setData(account) {
                this.account = account;
            },
            submit() {
                if(this.validates()) {
                    axios.put('/api/account', this.account).then(
                        function (response) {
                            this.cancel();
                        }
                    ).catch(
                        function (error) {
                            console.log(error);
                        }
                    );
                } else {
                    document.getElementById('invalid').className += ' is-active';
                }
            },
            validates() {
                return (this.account.name !== '') && (this.account.email !== '');
            },
            cancel() {
                document.getElementById('account-modal').className = 'modal';
            },
            activate() {
                document.getElementById('account-modal').className = 'modal is-active';
            },
        }
    }
</script>

<style>
    .notification {
        display: none;
    }
    .notification.is-active {
        display: block;
    }
</style>