@extends('layouts.page')
@section('title', 'Agile')
@section('content')
    <article class="section">
        <div class="container">
          <div class="columns">
            <div class="content column is-three-quarters">
                <p>Hoe Kapibara projecten realiseert komt niet uit de lucht vallen. We hebben veel ervaring in software ontwikkeling en maken gebruik van de ervaringen van anderen. Daarom werken wij Agile, wat zoveel wil zeggen als: ons proces van ontwikkelen van software is zo ingericht dat het makkelijk is om te sturen. Zowel door u, de opdrachtgever, als door ons, de aannemer.</p>
                <h3 class="title is-4">Stap 1: Voorbereiden</h3>
                <p>In eerste instantie moeten we bepalen wat er gemaakt gaat worden. Dit doen we door samen uw businessplan, uw proces(sen) en alles wat komt kijken bij het drijven van uw onderneming te bespreken.</p>
                <p>Daaruit volgt een beeld van de te ontwikkelen applicatie of website. Dat beeld leggen we vast door het opstellen van een zogenaamde back-log. Dat is niets anders dan een lijst met features die de applicatie zal bieden; wat de applicatie allemaal kan, plat gezegd.</p>
                <p>U bent de baas over deze back-log! In Agile termen noemen we dat product owner. U bent de eigenaar van het product, de softwareapplicatie, die wij voor u gaan bouwen.</p>
                <h3 class="title is-4">Stap 2: Realiseren</h3>
                <p>Stel u voor dat wij vervolgens alles in die back-log gaan bouwen. Dat duurt lang. En u kunt pas verder met uw onderneming als wij klaar zijn. Dat is niet handig.</p>
                <p>Daarom bepaalt u welke features uit de back-log absoluut nodig zijn om tot een applicatie te komen waarmee u aan de slag kan. De features waar u niet zonder kan. Dat is lastig, want nu komen we op de kunst van het weglaten. Maar daar komen we samen uit.</p>
                <p>De lijst die daaruit volgt, noemen we <strong>Minimal Viable Product (MVP)</strong>. Het minimale wat u aan features in de applicatie nodig heeft om uw business te kunnen managen.</p>
                <h3 class="title is-5">Sprinten</h3>
                <p>Nu is het tijd dat wij kunnen beginnen met waar wij enthousiast van worden, software bouwen. Dat doen we in periodes van één of twee weken, die we sprints noemen. We kunnen nu vrij goed inschatten hoeveel sprints het zal duren om het MVP te bouwen. Daarmee kunnen we dus ook een goede budgetindicatie afgeven.</p>
                <p>Aan het eind van iedere sprint, leveren we op wat er tot dan toe is gemaakt, werkend en getest.</p>
                <p>Aan het eind van de sprint evalueren we de samenwerking en hetgeen opgeleverd is. Daarnaast bepaalt u wat er in de volgende sprint wordt gebouwd uit de lijst met features. Op die manier kunt u nog tijdens de bouw reageren op veranderende omstandigehden.</p>
                <h3 class="title is-5">Wordt vervolgd</h3>
                <p>Zo gaan we door tot het MVP gereed is en we samen een glas champagne drinken op het live gaan van uw applicatie. En als het glas leeg is, dan starten we met de volgende sprint, omdat er nog features in de back-log staan die ook heel belangrijk zijn voor het succesvol maken van uw onderneming.<br>We mixen dan in iedere sprint nieuwe features en aanpassingen op bestaande features tot we de sprint gevuld hebben.</p>
                <h3 class="title is-4">Voordelen van deze methode</h3>
                <p>Zoals eerder gezegd, dit hebben we niet zelf verzonnen, maar deze werkwijze is het product van jarenlange ervaringen in de branche en wordt bij alle moderne en grote ondernemingen waar software wordt geproduceerd toegepast.</p>
                <p>De voordelen voor u als opdrachtgever op een rijtje:</p>
                <ul>
                    <li>snel resultaat (korte marktintroductietijd)</li>
                    <li>veel controle op hetgeen er gebouwd wordt</li>
                    <li>controle op budget<br>u krijgt na iedere sprint een factuur, dus u houdt greep op de kosten</li>
                    <li>hoge kwaliteit<br>geen haastwerk met bugs</li>
                    <li>het werken in sprints betekent dat er snel gereageerd kan worden op veranderingen in bijvoorbeeld de markt of wet- en regelgeving</li>
                </ul>
                <h3 class="title is-4">Conclusie</h3>
                <p>Op het eerste gezicht lijkt het misschien of u ons een blanco cheque overhandigt, wij beloven immers niet het product te bouwen tegen een vast bedrag. Andere aannemers die het project wellicht fixed-price aanbieden zullen echter (als ze slim zijn) een marge in de prijs opnemen om met onvoorziene zaken en voortschreidend inzicht om te gaan.<br>Die marge kunt u bij ons gebruiken om features mee te ontwikkelen. En dat kunnen we doen, door de kort-cyclische aanpak. Na iedere sprint is er immers gelegenheid tot bijsturen.</p>
            </div>
            @include('partial.side-menu', ['subject' => 'Agile webdevelopment'])
          </div>
        </div>
    </article>
@endsection
