<nav class="nav">
    <div class="nav-left">
        <router-link to="/dashboard" class="nav-item" active-class="is-active">Home</router-link>
        <router-link to="/aanvragen" class="nav-item" active-class="is-active">Aanvragen</router-link>
        <router-link to="/projecten" class="nav-item" active-class="is-active">Projecten</router-link>
        <router-link to="/klanten" class="nav-item" active-class="is-active">Klanten</router-link>
        <router-link to="/offerte-teksten" class="nav-item" active-class="is-active">Offerte teksten</router-link>
    </div>

   <div class="nav-center">
     <span class="subtitle is-3 logo">
         <a href="/">
             kapibara
         </a>
     </span>
    </div>

<!--    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span> -->

    <div class="nav-right nav-menu">
        <a v-if="token" class="nav-item" @click="editAccount()">
            Account
        </a>
    </div>
</nav>
