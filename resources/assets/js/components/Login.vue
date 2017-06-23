<template>
<div class="columns is-mobile">
    <div class="column is-hidden-touch is-one-quarter-desktop">&nbsp;</div>
    <div class="column is-half-desktop">
        <div class="box">
            <div class="notification is-warning" id="invalid_credentials">Gegegeven combinatie van email en paswoord zijn niet bekend</div>
            <div class="notification is-danger" id="could_not_create_token">Er is een probleem met de applicatie</div>
            <form>
                <label class="label">Email</label>
                <p class="control">
                    <input class="input" type="email" placeholder="Uw emailadres" v-model="email" required>
                </p>
                <label class="label">Paswoord</label>
                <p class="control">
                    <input class="input" type="password" placeholder="Uw paswoord" v-model="password" required>
                </p>
                <button type="button" class="button is-primary" @click="login">Login</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: ''
            };
        },
        methods: {
            login() {
                if(this.validates()) {
                    axios.post('/api/login', this.$data).then(
                        function (response) {
                            // set the token
                            app.setToken(response.data.token);
                            app.setAccount(response.data.user);
                            // redirect to dashboard
                            app._router.push('/dashboard');
                        }
                    ).catch(
                        function (error) {
                            var classes = document.getElementById(error.data.error).className;
                            classes += ' is-active';
                            document.getElementById(error.data.error).className = classes;
                        }
                    );
                }
            },
            validates() {
                return (this.email != '') && (this.password != '');
            }
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
