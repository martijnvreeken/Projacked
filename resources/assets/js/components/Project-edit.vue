<template>
<div class="modal is-active" :id="`project-modal-${project.id}`" v-if="show">
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
    import { eventBus } from '../app';

    export default {
        props: {
            project: Object,
            show: false
        },
        data() {
            return {
                visible: this.show
            };
        },
        methods: {
            submit() {
                if(this.validates()) {
                    const $this = this;
                    axios.put('/api/projects/'+this.project.id, this.project).then(
                        function (response) {
                            $this.cancel();
                        }
                    ).catch(
                        function (error) {
                            console.log(error);
                        }
                    );
                }
            },
            remove() {
                let $this = this;
                axios.delete('/api/projects/'+this.project.id).then(
                    function (response) {
                        eventBus.$emit('projectDeleted', { project: $this.project });
                        $this.cancel();
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
                this.$emit('hide');
            },
        }
    }
</script>
