@extends('layouts.page')
@section('content')
<div class="container">
    <h2 class="title is-2">Bewerk pagina</h2>
    <form action="{{ route('cms.pages.update', $page) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="patch" />
        <div class="field">
            <label class='label' for="title">Titel</label>
            <div class="control">
                <input class="input" type="text" name="title" id="title" value="{{ $page->title }}" />
            </div>
        </div>
        <div class="field">
            <label class='label' for="label">Nav label</label>
            <div class="control">
                <input class="input" type="text" name="label" id="label" value="{{ $page->label }}" />
            </div>
        </div>
        <div class="field">
            <label class="label" for="slug">Slug</label>
            <div class="control">
                <input class="input" type="text" name="slug" id="slug" value="{{ $page->slug }}" />
            </div>
        </div>
        <div class="field">
            <label class="label" for="body">Tekst (Markdown)</label>
            <div class="control">
                <textarea class="textarea" name="body" id="body">{!! $page->body !!}</textarea>
            </div>
        </div>
        <div class="field">
            <button class="button is-primary" type='submit'>Opslaan</button>
        </div>
    </form>
</div>
@endsection