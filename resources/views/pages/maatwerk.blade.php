@extends('layouts.page')
@section('title', 'Maatwerk webdevelopment')
@section('content')
    <article class="section">
        <div class="container">
<!--            <header class="heading">
                <h1 class="title">@yield('title')</h1>
            </header>-->
            <div class="content">
                <p>Niet voor ieder project bestaat een standaard oplossing. Of het product zou vele malen beter presteren als het niet met een populair CMS zou zijn gemaakt.</p>
                <p>Voor iedere keuze zijn voor- en nadelen te bedenken. Het succes van een project staat of valt met het nemen van de juiste keuze. Soms is dat een open source CMS implementatie. Soms zijn er argumenten om te kiezen voor maatwerk.</p>
                <p>Maatwerk hoeft niet te betekenen dat het project vele malen duurder is. De <a href="werkwijze">aanpak</a> van Kapibara zorgt voor een hoge efficiëntie en optimaal resultaat. Door gebruik te maken van frameworks en componenten bereiken we net zo snel resultaten als met een kant-en-klaar CMS.</p>
                <p>Het voordeel van maatwerk gebaseerd op open en bekende standaarden is schaalbaarheid in de toekomst. De website kan met u en uw organisatie meegroeien. Onze ervaring is dat bij bekende CMS-en als Wordpress men al snel tegen beperkingen in schaalbaarheid en mogelijkheden aanloopt.</p>
                <h2 class="title is-3">Wat kan Kapibara voor u betekenen?</h2>
                <p>Wij nemen u alle zorg omtrent het realiseren van uw maatwerk website of webapplicatie uit handen. We kunnen u adviseren bij het nemen van beslissingen die toekomstbestendig zijn.</p>
                <h3 class="title is-4">De diensten die wij kunnen verzorgen</h3>
                <ul>
                    <li>Brainstorm sessies</li>
                    <li>Ontwerp sessies</li>
                    <li>Agile coaching</li>
                    <li>Applicatie ontwikkeling</li>
                    <li>Hosting en onderhoud</li>
                    <li>Migratie trajecten</li>
                    <li>Optimalisatie, zoals</li>
                    <ul>
                        <li>caching</li>
                        <li>zoekfunctie implementatie</li>
                        <li>code refactoring</li>
                        <li>SEO</li>
                    </ul>
                </ul>
            </div>
            @include('partial.offerte', ['subject'=>'Maatwerk'])
            @include('footer.share')
        </div>
    </article>
@endsection