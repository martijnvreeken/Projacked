@extends('layouts.page')
@section('content')
<div class="container">
    <h2 class="title is-1">Pagina's</h2>
    <p><a href="{{ route('cms.pages.create') }}" class="button">Nieuwe pagina</a></p>
    <table class="table is-striped is-fullwidth">
        <thead>
            <tr>
                <th>SLUG</th>
                <th>TITLE</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->slug }}</td>
            <td>{{ $page->title }}</td>
            <td><a class="button" href="{{ route('cms.pages.edit', $page) }}"</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection