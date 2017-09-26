<template>
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{ lead.client }} ({{ lead.client_name }})
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
                <small>{{ lead.created_at }}</small>
                <p>{{ lead.description }}</p>
                <hr>
                <p v-if="lead.fixed_price > 0">Vaste prijs: <strong>&euro;{{ lead.fixed_price }}</strong></p>
                <p v-if="lead.hour_estimate > 0">{{ lead.hour_estimate }} uur * &euro; {{ lead.hour_rate }}/u = <strong>&euro; {{ lead.hour_estimate * lead.hour_rate }}</strong></p>
            </div>
        </div>
        <footer class="card-footer">
          <router-link :to="{name: 'lead-edit', params: { leadId: lead.id }}" class="card-footer-item">Edit</router-link>
        </footer>
    </div>
</template>

<script>
    export default {
        props: { lead: Object },
    }
</script>
