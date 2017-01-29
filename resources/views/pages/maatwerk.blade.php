@extends('layouts.page')
@section('content')
    <article class="section">
        <div class="container">
            <header class="heading">
                <h1 class="title">Maatwerk webdevelopment</h1>
            </header>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam enim labore ea possimus in obcaecati exercitationem excepturi hic eius corrupti repellat deserunt deleniti tempora tenetur eum, amet ex nesciunt quis.</p>
            </div>
            @include('partial.offerte')
            @include('footer.share')
        </div>
    </article>
@endsection