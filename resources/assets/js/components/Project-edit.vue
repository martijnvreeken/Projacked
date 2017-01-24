<template>
<div class="modal" :id="`project-modal-${project.id}`">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
        <p class="modal-card-title">Bewerk project</p>
        <button class="delete" @click="cancel()"></button>
    </header>
    <section class="modal-card-body">
        <form>
            <p class="title is-6">{{ project.client.name }}</p>
            <label class="label">Omschrijving werkzaamheden</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="project.description" required rows="6"></textarea>
            </p>
            <label class="label">Voorstel</label>
            <p class="control">
                <textarea class="textarea" type="text" v-model="project.proposal" rows="6"></textarea>
            </p>
            <div class="box">
                <label class="label">Urenschatting</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="project.hour_estimate">
                </p>
                <label class="label">Uurtarief</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="project.hour_rate">
                </p>
            </div>
            <p>óf...</p>
            <label class="label">Vast prijs</label>
            <p class="control">
                <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="project.fixed_price">
            </p>
        </form>
    </section>
    <footer class="modal-card-foot">
        <a type="button" class="button is-primary" @click="submit">Opslaan</a>
        <a class="button is-danger" @click="remove()">Verwijderen</a>
    </footer>
  </div>
</div>
</template>

<script>
    export default {
        props: {
            project: Object
        },
        methods: {
            submit() {
                if(this.validates()) {
                    this.$http.put('/api/projects/'+this.project.id, this.project).then(
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
                this.$http.delete('/api/projects/'+this.project.id).then(
                    function (response) {
                        var index = this.$parent.records.indexOf(this.project);
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
            validates() {
                return true;
            },
            cancel() {
                document.getElementById('project-modal-'+this.project.id).className = 'modal';
            },
        }
    }
</script>
