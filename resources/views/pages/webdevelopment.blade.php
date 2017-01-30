@extends('layouts.page')
@section('title', 'Web development')
@section('content')
    <article class="section">
        <div class="container">
            <div class="content">
                <p>Ook voor <a href="https://wordpress.org/" target="_new">Wordpress</a> websites en e-commerce met <a href="https://www.prestashop.com/blog/nl/keep-calm-sell-online-prestashop/" target="_new">Prestashop</a> kunt u bij ons terecht.</p>
                <h3 class="title is-4">De diensten die wij kunnen verzorgen</h3>
                <ul>
                    <li>Brainstorm sessies</li>
                    <li>Ontwerp sessies</li>
                    <li>Agile coaching</li>
                    <li>Website ontwikkeling</li>
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
            @include('partial.offerte', ['subject'=>'Webdevelopment'])
            @include('footer.share')
        </div>
    </article>
@endsection
