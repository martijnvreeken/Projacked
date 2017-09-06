@extends('layouts.page')
@section('title', 'Maatwerk webdevelopment')
@section('content')
    <article class="section">
        <div class="container">
<!--            <header class="heading">
                <h1 class="title">@yield('title')</h1>
            </header>-->
            <div class="columns">
              <div class="content column is-three-quarters">
                <p>Niet voor ieder project bestaat een standaard oplossing. Of het product zou vele malen beter presteren als het niet met een populair CMS zou zijn gemaakt.</p>
                <p>Voor iedere keuze zijn voor- en nadelen te bedenken. Het succes van een project staat of valt met het nemen van de juiste keuze. Soms is dat een open source CMS implementatie. Soms zijn er argumenten om te kiezen voor maatwerk.</p>
                <p>Maatwerk hoeft niet te betekenen dat het project vele malen duurder is. De <a href="werkwijze">aanpak</a> van Kapibara zorgt voor een hoge efficiëntie en optimaal resultaat. Door gebruik te maken van frameworks en componenten bereiken we net zo snel resultaten als met een kant-en-klaar CMS.</p>
                <p>Het voordeel van maatwerk gebaseerd op open en bekende standaarden is flexibiliteit en schaalbaarheid in de toekomst. De website kan met u en uw organisatie meegroeien. Onze ervaring is dat bij bekende CMS-en als Wordpress men al snel tegen beperkingen in schaalbaarheid en mogelijkheden aanloopt.</p>
                <h2 class="title is-5">Wat kan Kapibara voor u betekenen?</h2>
                <p>Wij nemen u alle zorg omtrent het realiseren van uw maatwerk website of webapplicatie uit handen. We kunnen u adviseren bij het nemen van beslissingen die toekomstbestendig zijn.</p>
              </div>
              @include('partial.side-menu', ['subject'=>'Maatwerk'])
            </div>
        </div>
    </article>
@endsection
