<?php
    $current = request()->path();
    $items = [
        "/" => "Home",
        "maatwerk" => "Maatwerk",
        "databases" => "Databases",
        "webdevelopment" => "Webdevelopment",
        "werkwijze" => "Werkwijze",
    ];
?>
<div class="nav-right nav-menu">
    @foreach($items as $link => $title)
    <a href="{{ $link }}" class="nav-item @if($current == $link) is-active @endif">{{ $title }}</a>
    @endforeach
</div>
