<template>
<div class="modal" :id="`q-text-modal-${text.id}`">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">Bewerk offerte tekst</p>
        <button class="delete" @click="cancel()"></button>
    </header>
    <section class="modal-card-body">
        <form>
            <label class="label">Titel</label>
            <p class="control">
                <input class="input" type="text" placeholder="De titel van dit stuk in het docuement" v-model="text.title" required>
            </p>
            <label class="label">Broodtekst (<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_new">markdown</a>)</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="text.body" required rows="6"></textarea>
            </p>
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
            text: Object
        },
        methods: {
            submit() {
                if(this.validates()) {
                    axios.put('/api/texts/'+this.text.id, this.text).then(
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
                document.getElementById('q-text-modal-'+this.text.id).className = 'modal';
            },
        }
    }
</script>