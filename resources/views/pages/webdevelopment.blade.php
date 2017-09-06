@extends('layouts.page')
@section('title', 'Web development')
@section('content')
    <article class="section">
        <div class="container">
          <div class="columns">
            <div class="content column is-three-quarters">
              <p>Ook voor <a href="https://wordpress.org/" target="_new">Wordpress</a> websites en e-commerce met <a href="https://www.prestashop.com/blog/nl/keep-calm-sell-online-prestashop/" target="_new">Prestashop</a> kunt u bij ons terecht. Kapibara Media heeft meer dan tien jaar ervaring in het realiseren van commerci&euml;le websites en webapplicaties.</p>
              <h3 class="title is-4">Diensten die wij kunnen verzorgen</h3>
              <ul>
                <li>Brainstorm en/of ontwerp sessies *</li>
                <li>Website ontwikkeling</li>
                <li>Hosting **</li>
                <li>Onderhoud en optimalisatie bestaande website(s), waaronder</li>
                <ul>
                  <li>Caching</li>
                  <li>Zoekfunctie implementatie</li>
                  <li>Code refactoring</li>
                  <li>Search Engine Optimization (SEO)</li>
                </ul>
              </ul>
              <p>* in samenwerking met <a href="https://labrooms.com/" target="_new">Labrooms</a><br>
                ** in samenwerking met <a href="https://dma.nl/" target="_new">DMA</a></p>
              </div>
              @include('partial.side-menu', ['subject'=>'Webdevelopment'])
          </div>
        </div>
    </article>
@endsection
