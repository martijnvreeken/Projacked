@extends('layouts.page')
@section('title', $page->title)
@section('content')
    <article class="section">
        <div class="container">
            <div class="columns">
              <div class="content column is-three-quarters">
                {!! $page->body !!}
              </div>
              @include('partial.side-menu', ['subject'=>$page->title])
            </div>
        </div>
    </article>
@endsection
