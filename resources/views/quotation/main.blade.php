@extends('layouts.document')
@section('content')
    <section class="has-text-centered">
        <div class="content">
            <h1 class="title is-1">Kapibara Media</h1>
            <h2 class="title is-2">Offerte</h2>
            <h3 class="title is-3">Samenvatting</h3>
            <h4 class="title is-4">Aanvraag</h4>
            <p>{{ $lead->description }}</p>
            <h4 class="title is-4">Voorstel</h4>
            <p>{{ $lead->proposal }}</p>
            <h4 class="title is-4">Investering</h4>
        @if($lead->fixed_price)
            <p>&euro; {{ $lead->fixed_price }} excl. BTW</p>
        @endif
        @if($lead->hour_estimate)
        <p>&euro; {{ number_format($lead->hour_estimate * $lead->hour_rate, 2, ',', '.') }} excl. BTW</p>
        @endif
            <p><small>onderbouwing verderop in dit document</small></p>
        </div>
    </section>
    @foreach($texts as $text)
    <section>
        <div class="content">
            <h2 class="title is-2 has-text-centered">{{ $text->title }}</h2>
            {!! Markdown::convertToHtml($text->body) !!}
        </div>
    </section>
    @endforeach
    <section>
        <div class="content">
            <h2 class="title is-2 has-text-centered">Investering</h2>
    @if($lead->fixed_price)
            <p>U heeft gevraagd om een vaste prijs.</p>
            <p>&euro; {{ $lead->fixed_price }} excl. BTW</p>
            <p>&euro; {{ $lead->fixed_price * 0.21 }} BTW</p>
            <p><strong>&euro; {{ $lead->fixed_price * 1.21 }} Totaal</strong></p>
    @endif
    @if($lead->hour_estimate)
            <p>Wij hebben een schatting gemaakt van de uren die we denken dat het project zal nemen. Dit is een schatting op basis van de input die u ons tot op heden heeft verstrekt. Hieraan kunnen geen rechten worden ontleent. We hebben ons best gedaan om een zo accuraat mogelijke schatting te maken. Tijdens de uitvoer van het project zal u tijdig schriftelijk op de hoogte worden gebracht zodra we meer dan 10% van deze schatting denken af te moeten wijken.</p>
            <p>&euro; {{ number_format($lead->hour_estimate * $lead->hour_rate, 2, ',', '.') }} excl. BTW</p>
            <p>&euro; {{ number_format(($lead->hour_estimate * $lead->hour_rate) * 0.21, 2, ',', '.') }} BTW</p>
            <p><strong>&euro; {{ number_format(($lead->hour_estimate * $lead->hour_rate) * 1.21, 2, ',', '.') }} Totaal</strong></p>
    @endif
        </div>
    </section>
@endsection