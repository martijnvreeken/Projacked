<!-- Hero header: will stick at the top -->
<div class="hero-head">
    <header class="nav">
        <div class="container">
            <div class="nav-left">
              <span class="subtitle is-3 logo">
                <a href="/">
                    kapibara
                </a>
              </span>
            </div>
            <div class="nav-center">
                {{--  <span class="nav-item">
                    <a class="offerte" href="offerte">
                        <span>Offerte</span>
                    </a>
                </span>  --}}
                <span class="nav-item"><a href="tel:0306061700" class="button is-white is-small">030-606 1700</a></span>
            </div>
            <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
            <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
            <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
            </span>
            <!-- This "nav-menu" is hidden on mobile -->
            <!-- Add the modifier "is-active" to display it on mobile -->
            @include('nav.public')
        </div>
    </header>
</div>
