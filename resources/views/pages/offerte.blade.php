@extends('layouts.page')
@section('title', 'Offerte')
@section('content')
    <article class="section">
        <div class="container">
            <div class="content">
                <p>Vul onderstaande in en krijg binnen twee werkdagen een maatwerk offerte in uw mailbox.</p>
                {!! Form::open(['url' => '/offerte', 'method' => 'post']) !!}
                <label class="label">Omschrijving</label>
                <p class="control">
                    <textarea class="textarea" type="text" name="description" required rows="6"></textarea>
                    <span class="help is-info">Omschrijf uw wensen kort, maar zo volledig mogelijk</span>
                </p>
                <label class="label">Bedrijfsnaam</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Bedrijfsnaam" name="client" required>
                </p>
                <label class="label">Uw naam</label>
                <p class="control">
                    <input class="input" type="text" placeholder="Uw volledige naam" name="client_name" required>
                </p>
                <label class="label">Emailadres</label>
                <p class="control">
                    <input class="input" type="email" placeholder="Emailadres" name="client_email" required>
                </p>
                <button type="submit" class="button is-primary">Kom maar op met die offerte!</button>
                {!! Form::close() !!}
            </div>
        </div>
    </article>
@endsection

