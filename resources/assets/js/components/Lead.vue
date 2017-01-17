<template>
<div class="detailview">
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{ lead.client_name }}
          </p>
          <a class="card-header-icon" :href="`mailto:${lead.client_email}`">
            <span class="icon">
              <i class="fa fa-envelope-o"></i>
            </span>
          </a>
          <a class="card-header-icon" v-if="lead.client_phone" :href="`tel:${lead.client_phone}`">
            <span class="icon">
              <i class="fa fa-phone-square"></i>
            </span>
          </a>
        </header>
        <div class="card-content" style="min-height: 7.3em;">
            <div class="content">
                <p>{{ lead.description }}</p>
                <p v-if="lead.fixed_price > 0">Vaste prijs: <strong>&euro;{{ lead.fixed_price }}</strong></p>
                <p v-if="lead.hour_estimate > 0">{{ lead.hour_estimate }} uur * &euro; {{ lead.hour_rate }}/u = <strong>&euro; {{ lead.hour_estimate * lead.hour_rate }}</strong></p>
                <br>
                <small>{{ lead.created_at }}</small>
            </div>
        </div>
        <footer class="card-footer">
          <a class="card-footer-item" @click="edit()">Edit</a>
        </footer>
        <lead_edit :lead="lead"></lead_edit>
    </div>
</div>
</template>

<script>
    export default {
        props: { lead: Object },
        methods: {
            edit() {
                $('#lead-modal-'+this.lead.id).addClass('is-active');
            }
        }
    }
</script>