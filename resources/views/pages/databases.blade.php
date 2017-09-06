@extends('layouts.page')
@section('title', 'Database ontwikkeling')
@section('content')
    <article class="section">
        <div class="container">
          <div class="columns">
            <div class="content column is-three-quarters">
              <quote>&ldquo; Uw zakelijke data veilig online, altijd en overal toegang, voor iedereen die dat nodig heeft. &ldquor;</quote>
              <p class="is-hidden-mobile">&nbsp;</p>
              <p>Altijd toegang tot de data die uw onderneming definieert. Een paperless business. Eenvoudigere rapportage. Uw data doorverkopen aan derden. Dit zijn slechts enkele van de voordelen en mogelijkheden die een business applicatie in de cloud biedt.</p>
              <p>Bovenstaande kunnen redenen zijn voor het realiseren van een online database. Het ontsluiten van de administratie, zodat het voor klanten en medewerkers vanzelfsprekend wordt om online te communiceren ter ondersteuning van het nieuwe werken.</p>
              <p>Database ontwikkeling is altijd <a href="maatwerk">maatwerk</a>, omdat geen business gelijk is. Laat dat nu net onze specialiteit zijn.</p>
            </div>
            @include('partial.side-menu', ['subject'=>'Database ontwikkeling'])
          </div>
        </div>
    </article>
@endsection
