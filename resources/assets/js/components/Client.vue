<template>
<div class="detailview">
    <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            {{ client.name }}
          </p>
          <a class="card-header-icon" :href="`mailto:${client.email}`">
            <span class="icon">
              <i class="fa fa-envelope-o"></i>
            </span>
          </a>
          <a class="card-header-icon" :href="`tel:${client.mobilenumber}`">
            <span class="icon">
              <i class="fa fa-phone-square"></i>
            </span>
          </a>
        </header>
        <div class="card-content" style="min-height: 7.3em;">
            <div class="content">
                {{ client.address}}<br>{{client.zipcode}} {{client.city}}<br>
            </div>
        </div>
        <footer class="card-footer">
          <a class="card-footer-item">Edit</a>
          <a class="card-footer-item">Delete</a>
        </footer>
    </div>
</div>
</template>

<script>
    export default {
        props: { client: Object }
    }
</script>