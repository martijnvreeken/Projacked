<template>
<div class="detailview">
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
                <p v-if="project.fixed_price > 0">Vaste prijs: <strong>&euro;{{ project.fixed_price }}</strong></p>
                <p v-if="project.hour_estimate > 0">{{ project.hour_estimate }} uur * &euro; {{ project.hour_rate }}/u = <strong>&euro; {{ project.hour_estimate * project.hour_rate }}</strong></p>
                <br>
                <small>{{ project.created_at }}</small>
            </div>
        </div>
        <footer class="card-footer">
          <a class="card-footer-item" @click="edit()">Edit</a>
        </footer>
    </div>
</div>
</template>

<script>
    export default {
        props: { project: Object },
        methods: {
            edit() {
                $('#project-modal-'+this.project.id).addClass('is-active');
            }
        }
    }
</script>