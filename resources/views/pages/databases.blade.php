@extends('layouts.page')
@section('title', 'Database ontwikkeling')
@section('content')
    <article class="section">
        <div class="container">
<!--            <header class="heading">
                <h1 class="title">@yield('title')</h1>
            </header>-->
            <div class="content">
                <p>Altijd toegang tot de data die uw onderneming definiëert. Een paperless business. Eenvoudigere rapportage. Uw data doorverkopen aan derden.</p>
                <p>Bovenstaande kunnen redenen zijn voor het realiseren van een online database. Het ontsluiten van de administratie, zodat het voor klanten en medewerkers vanzelfsprekend wordt om online te communiceren.</p>
                <quote>Uw zakelijke data veilig online, dat is het idee.</quote>
                <p>Database ontwikkeling is altijd <a href="maatwerk">maatwerk</a>, omdat geen business gelijk is. Laat dat nu net onze specialiteit zijn.</p>
            </div>
            @include('partial.offerte', ['subject'=>'Database ontwikkeling'])
            @include('footer.share')
        </div>
    </article>
@endsection
