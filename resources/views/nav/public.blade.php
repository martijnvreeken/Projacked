<?php
$current = request()->path();
$items = [
    "/" => "Home",
];
$items += \Projacked\Models\Page::all()->pluck('label', 'slug')->toArray();
?>
<div class="nav-right nav-menu">
    @foreach($items as $link => $title)
    <a href="{{ $link }}" class="nav-item @if($current == $link) is-active @endif">{{ $title }}</a>
    @endforeach
    @if(\Auth::check())
    <a 
        href="{{ route('logout') }}"
        class="nav-item"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        Uitloggen
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endif
</div>
