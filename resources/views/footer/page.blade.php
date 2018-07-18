<?php
$items = [
    "/" => "Home",
];
$items += \Projacked\Models\Page::all()->pluck('label', 'slug')->toArray();
?>
<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <aside class="menu">
                    <p class="menu-label">Menu</p>
                    <ul class="menu-list">
                        @foreach($items as $link => $title)
                        <li><a href="{{ $link }}">{{ $title }}</a></li>
                        @endforeach
                        <li><a href="/storage/2018-av-kapibara-media.pdf">Algemene Voorwaarden</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column">
                <p class="menu-label">
                    Contact
                </p>
                <div class="content">
                    <p>Kapibara Media
                        <br>
                        <a href="mailto:info@kapibara.media">info@kapibara.media</a>
                        <br>
                        <a href="tel:0031625431044">06 2543 1044</a>
                        <br> {{--Henri Dunantlaan 21, 3434CJ --}}Nieuwegein
                    </p>
                    <p>KvK te Utrecht: 67362656{{--<br>
                    Belastingnummer: NL186456621B02--}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
