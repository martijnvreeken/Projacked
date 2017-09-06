@extends('layouts.index')
@section('title', 'Kapibara Media')
@section('content')
<a id="diensten"></a>
<section class="section">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column">
                <div class="box hero">
                    <h2 class="title is-2">
                        <span class="icon is-large">
                            <i class="fa fa-cogs"></i>
                        </span><br>
                        Maatwerk
                    </h2>
                    <p>Wij zijn gespecialiseerd in het realiseren van maatwerk webapplicaties</p>
                    <hr>
                    <p>
                        <a href="maatwerk" class="button is-info">Lees meer</a>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="box hero">
                    <h2 class="title is-2">
                        <span class="icon is-large">
                            <i class="fa fa-database"></i>
                        </span><br>
                        Databases
                    </h2>
                    <p>Uw data veilig online ontsluiten en integreren in externe systemen via een maatwerk API</p>
                    <hr>
                    <p>
                        <a href="databases" class="button is-info">Lees meer</a>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="box hero">
                    <h2 class="title is-2">
                        <span class="icon is-large">
                            <i class="fa fa-coffee"></i>
                        </span><br>
                        Websites
                    </h2>
                    <p>Van eenvoudige one-pager tot een state-of-the-art headless CMS</p>
                    <hr>
                    <p>
                        <a href="webdevelopment" class="button is-info">Lees meer</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="hero is-info">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                AGILE WEBDEVELOPMENT
            </h1>
            <h2 class="subtitle">
                Kapibara is Kanban.
            </h2>
            <p>Kanban is een agile werkmethode die zorgt voor overzicht en effici&euml;nte communicatie.
            </p>
            <br>
            <p><a href="werkwijze" class="button is-dark is-medium">Lees meer</a>
            </p>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="heading has-text-centered">
            <h1 class="title">Caching</h1>
        </div>
        <div class="columns">
          <div class="content column is-half">
            <p>Bij grotere websites en webapplicaties met een hoog aantal bezoekers is caching onvermijdelijk. De standaard oplossingen zijn dan niet altijd toereikend. Kapibara heeft ervaring met reversed proxy oplossingen zoals Varnish.</p>
          </div>
          @include('partial.offerte', ['subject'=>'Caching'])
        </div>
    </div>
</section>
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h3 class="title is-3">
                Kapibara werkt met
                </h1>
                <div class="columns">
                    <div class="column">
                        <figure class="image is-128x128" style="display: inline-block;"><img src="/images/laravel_logo.png" alt="Laravel"></figure>
                        <h3 class="title">
                            Laravel
                        </h3>
                        <p>Marktleidend PHP platform.</p>
                        <br>
                        <p><a class="button is-info" href="https://laravel.com/" target="_new">Lees meer</a></p>
                    </div>
                    <div class="column">
                        <figure class="image is-128x128" style="display: inline-block;"><img src="/images/vuejs_logo.png" alt="Vuejs"></figure>
                        <h3 class="title">
                            Vue
                        </h3>
                        <p>Javascript framework voor hipsters.</p>
                        <br>
                        <p><a class="button is-info" href="https://vuejs.org/" target="_new">Lees meer</a></p>
                    </div>
                    <div class="column">
                        <figure class="image is-128x128" style="display: inline-block;"><img src="/images/wordpress_logo.png" alt="Wordpress"></figure>
                        <h3 class="title">
                            Wordpress
                        </h3>
                        <p>Meest gebruiksvriendelijke CMS sinds 2003.</p>
                        <br>
                        <p><a class="button is-info" href="https://nl.wordpress.org/" target="_new">Lees meer</a></p>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="heading has-text-centered">
            <h1 class="title">Maatwerk zoekmachine met Elasticsearch</h1>
        </div>
        <div class="columns">
          <div class="content column is-half">
            <p>Bij websites en webapplicaties met grote hoeveelheden data of pagina's zijn standaard oplossingen voor zoeken niet altijd toereikend. Kapibara heeft ervaring met het inzetten van Google Site Search of Elasticsearch. <br><a href="https://en.wikipedia.org/wiki/Faceted_search">Faceted search</a> is hiermee ook te realiseren (denk aan Bol.com e.d.).</p>
          </div>
          @include('partial.offerte', ['subject'=>'Elasticsearch'])
        </div>
    </div>
</section>
@endsection
