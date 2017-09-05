<template>
<div class="detailview column is-half-tablet is-one-third-desktop">
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{ project.client.name }}
          </p>
          <a class="card-header-icon" :href="`mailto:${project.client.email}`">
            <span class="icon">
              <i class="fa fa-envelope-o"></i>
            </span>
          </a>
          <a class="card-header-icon" v-if="project.client.mobilenumber" :href="`tel:${project.client.mobilenumber}`">
            <span class="icon">
              <i class="fa fa-phone-square"></i>
            </span>
          </a>
        </header>
        <div class="card-content" style="min-height: 7.3em;">
            <div class="content">
                <p>{{ project.description }}</p>
                <p v-show="project.proposal">{{ project.proposal }}</p>
                <hr>
                <p v-if="project.fixed_price > 0">Vaste prijs: <strong>&euro;{{ project.fixed_price }}</strong></p>
                <p v-else>{{ project.hour_estimate }} uur * &euro; {{ project.hour_rate }}/u = <strong>&euro; {{ project.hour_estimate * project.hour_rate }}</strong></p>
            </div>
        </div>
        <footer class="card-footer">
          <a class="card-footer-item" @click="edit = true">Edit</a>
        </footer>
    </div>
    <project-edit :project="project" :key="project.id" :show="edit" @hide="edit = false"></project-edit>
</div>
</template>

<script>
    import form from './Project-edit';

    export default {
        props: { project: Object },
        components: {
            projectEdit: form
        },
        data() {
            return {
                edit: false
            };
        }
    }
</script>
