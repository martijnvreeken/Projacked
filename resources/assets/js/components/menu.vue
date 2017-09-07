<template>
  <nav class="navbar">
    <div class="navbar-brand">
      <router-link to="/dashboard" class="navbar-item">KAPIBARA</router-link>

      <span class="navbar-burger" @click="active = ! active" :class="{ 'is-active': active }">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>

      <div class="navbar-menu" :class="{ 'is-active': active }" @click="active = ! active">
          <router-link to="/aanvragen" class="nav-item" active-class="is-active">Aanvragen</router-link>
          <router-link to="/projecten" class="nav-item" active-class="is-active">Projecten</router-link>
          <router-link to="/klanten" class="nav-item" active-class="is-active">Klanten</router-link>
          <router-link to="/offerte-teksten" class="nav-item" active-class="is-active">Offerte teksten</router-link>
          <a class="nav-item" @click="editAccount()" v-if="token">
            Account
          </a>
          <a href="/" class="nav-item">Website</a>
      </div>
  </nav>
</template>

<script>
export default {
  props: { token: false },
  data() {
    return {
      active: false
    };
  },
  methods: {
    editAccount() {
      this.$emit('edit-account');
    }
  }
}
</script>
