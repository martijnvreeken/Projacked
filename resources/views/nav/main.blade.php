<nav class="nav">
    <div class="nav-left">
<!--        <a class="nav-item is-brand" href="/">
            <img src="http://bulma.io/images/bulma-type.png" alt="Bulma logo">
        </a>-->
        <router-link to="/" class="nav-item" active-class="is-active">Home</router-link>
        <a class="nav-item" href="#!">
            Leads
        </a>
        <router-link to="/klanten" class="nav-item" active-class="is-active">Klanten</router-link>
        <a class="nav-item" href="#!">
            Projecten
        </a>
    </div>

<!--    <div class="nav-center">
        <a class="nav-item" href="#">
            <span class="icon">
                <i class="fa fa-github"></i>
            </span>
        </a>
        <a class="nav-item" href="#">
            <span class="icon">
                <i class="fa fa-twitter"></i>
            </span>
        </a>
    </div>-->

    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>

    <div class="nav-right nav-menu">
        <a class="nav-item" href="/login">
            Login
        </a>
        <a class="nav-item" href="/register">
            Register
        </a>
    </div>
</nav>