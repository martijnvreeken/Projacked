<template>
  <div class="section">
    <div class="container">
      <h2 class="title is-4">Bewerk Project</h2>
      <form>
        <p class="title is-6">{{ project.client.name }}</p>
        <div class="field">
          <label class="label">Omschrijving werkzaamheden</label>
          <p class="control">
            <textarea class="textarea" type="text" v-model="project.description" required rows="6"></textarea>
          </p>
        </div>
        <div class="field">
          <label class="label">Voorstel</label>
          <p class="control">
            <textarea class="textarea" type="text" v-model="project.proposal" rows="6"></textarea>
          </p>
        </div>
        <div class="box">
          <label class="label">Urenschatting</label>
          <p class="control">
            <input class="input" type="text" placeholder="Grove schatting aantal uren voor project realisatie" v-model="project.hour_estimate">
          </p>
          <label class="label">Uurtarief</label>
          <p class="control">
            <input class="input" type="text" placeholder="Uurtarief afspraak" v-model="project.hour_rate">
          </p>
          <p>óf...</p>
          <label class="label">Vaste prijs</label>
          <p class="control">
            <input class="input" type="text" placeholder="Vaste prijs afspraak" v-model="project.fixed_price">
          </p>
        </div>
      </form>
      <footer class="footer">
        <a type="button" class="button is-primary" @click="submit">Opslaan</a>
        <a class="button is-danger" @click="remove">Verwijderen</a>
        <a class="button" @click="redirect">Sluiten</a>
      </footer>
    </div>
  </div>
</template>

<script>
import { eventBus } from '../app';

export default {
  data() {
    return {
      project: {}
    };
  },
  created() {
    this.project = this.$store.getters.getProjectById(this.$route.params.projectId);
  },
  watch: {
    '$route' (to, from) {
      if(typeof to.params.projectId !== 'undefined') {
        this.project = this.$store.getters.getProjectById(to.params.projectId);
      }
    }
  },
  methods: {
    submit() {
      if(this.validates()) {
        const $this = this;
        axios.put('/api/projects/' + this.project.id, this.project).then(
          function (response) {
            $this.redirect();
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
          $this.$store.commit('removeProject', $this.project);
          $this.redirect();
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
    redirect() {
      this.$router.push({
        name: 'projects'
      });
    },
  }
}
</script>
