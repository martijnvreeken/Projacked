<template>
<div class="detailview column is-half-tablet is-one-third-desktop">
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{ client.name }}
          </p>
          <a v-if="client.email" class="card-header-icon" :href="`mailto:${client.email}`">
            <span class="icon">
              <i class="fa fa-envelope-o"></i>
            </span>
          </a>
          <a v-if="client.mobilenumber" class="card-header-icon" :href="`tel:${client.mobilenumber}`">
            <span class="icon">
              <i class="fa fa-phone-square"></i>
            </span>
          </a>
        </header>
        <div class="card-content">
            <div class="content">
                <p class="title is-6">{{ client.contact }}</p>
                <p>{{ client.address}}<br>{{client.zipcode}} {{client.city}}</p>
                <p>
                    <span v-if="client.mobilenumber"><a :href="`tel:${client.mobilenumber}`">M {{ client.mobilenumber }}</a></span><br>
                    <span v-if="client.phonenumber"><a :href="`tel:${client.phonenumber}`">T {{ client.phonenumber }}</a></span>
                </p>
            </div>
        </div>
        <footer class="card-footer">
          <a class="card-footer-item" @click="edit = true">Edit</a>
        </footer>
    </div>
    <client-edit :client="client" :key="client.id" :show="edit" @hide="edit = false"></client-edit>
</div>
</template>

<script>
    import form from './Client-edit';

    export default {
        props: { client: Object },
        data() {
          return {
            edit: false
          };
        },
        components: {
          clientEdit: form
        }
    }
</script>

<style>
.card-content {
    min-height: 7.3em;
}
</style>
