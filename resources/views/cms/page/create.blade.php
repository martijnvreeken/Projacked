@extends('layouts.page')
@section('content')
<div class="container">
    <h2 class="title is-2">Nieuwe pagina</h2>
    <form action="{{ route('cms.pages.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="field">
            <label class='label' for="title">Titel</label>
            <div class="control">
                <input class="input" type="text" name="title" id="title" />
            </div>
        </div>
        <div class="field">
            <label class="label" for="slug">Slug</label>
            <div class="control">
                <input class="input" type="text" name="slug" id="slug" />
            </div>
        </div>
        <div class="field">
            <label class="label" for="body">Tekst</label>
            <div class="control">
                <textarea class="textarea" name="body" id="body"></textarea>
            </div>
        </div>
        <div class="field">
            <button class="button is-primary" type='submit'>Opslaan</button>
        </div>
    </form>
</div>
@endsection