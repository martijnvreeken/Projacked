@extends('layouts.page')
@section('content')
    <article class="section">
        <div class="container">
            <header class="heading">
                <h1 class="title">Werkwijze</h1>
            </header>
            <div class="content">
                <p>Hoe Kapibara projecten realiseert komt niet uit de lucht vallen. We hebben veel ervaring in software ontwikkeling en maken gebruik van de ervaringen van anderen. Daarom werken wij Agile. Wat zoveel wil zeggen als: ons proces van ontwikkelen van software is zo ingericht dat het makkelijk is om te sturen. Zowel door u, de opdrachtgever, als door ons, de aannemer.</p>
                <h3 class="title is-4">Stap 1: Vaststelling</h3>
                <p>In eerste instantie moeten we samen bepalen wat er gemaakt moet worden. Dit doen we door met u in gesprek te gaan en uw businessplan, uw proces(sen) en alles wat komt kijken bij het drijven van uw onderneming te bespreken.</p>
                <p>Daaruit volgt een beeld van de te ontwikkelen applicatie of website. Dat beeld leggen we vast door het opstellen van een zogenaamde back-log. Dat is niets anders dan een lijst met features die de applicatie zal bieden; wat de applicatie allemaal kan, plat gezegd.</p>
                <p>U bent de baas over deze back-log! In Agile termen noemen we dat Product owner. U bent de eigenaar van het product, de softwareapplicatie, die wij voor u gaan bouwen.</p>
                <h3 class="title is-4">Stap 2: Realisatie</h3>
                <p>Stel u voor dat wij vervolgens alles in die back-log gaan bouwen. Dat duurt lang. En u kunt pas verder met uw onderneming als wij klaar zijn. Dat is niet handig.</p>
                <p>Daarom bepalen we in overleg welke features uit de back-log absoluut nodig zijn om tot een applicatie te komen waarmee u aan de slag kan. De features waar u niet zonder kan. Dat is moeilijk, want nu komen we op de kunst van het weglaten. Maar daar komen we samen uit, wij hebben daar ervaring in.</p>
                <p>De lijst die daaruit volgt, noemen we Minimal Viable Product (MVP). Het minimale wat u aan features in de applicatie nodig heeft om uw business te kunnen managen.</p>
                <h3 class="title is-4">Sprinten</h3>
                <p>Nu is het tijd dat wij kunnen beginnen met waar wij enthousiast van worden, software bouwen. Dat doen we in periodes van één of twee weken, die we sprints noemen. We kunnen nu vrij goed inschatten hoeveel sprints het zal duren om het MVP te bouwen. Daarmee kunnen we dus ook een goede budgetindicatie afgeven.</p>
                <p>Aan het eind van iedere sprint, leveren we op wat er tot dan toe is gemaakt. Dat wil tijdens het bouwen van het MVP nog niet zeggen dat dat ook een volledige applicatie is, maar het deel dat we opleveren is werkend en getest.</p>
                <p>Voorbeeld: uw applicatie heeft gebruikers die zich kunnen aanmelden, inloggen en hun account kunnen beheren. De eeste sprint zou dan kunnen zijn dat we dat maken, testen en opleveren. U heeft dan aan het eind van die sprint twee zaken, twee deliverables. Namelijk een werkend stuk van uw applicatie en een factuur voor onze uren.</p>
                <p>Aan het eind van de sprint evalueren we de samenwerking en hetgeen opgeleverd is. Daarnaast bepaalt u wat er in de volgende sprint wordt gebouwd uit de lijst met features. Mochten er onvolkomenheden aangetroffen worden in hetgeen we hebben opgeleverd, dan wordt dat bovenaan gezet voor de volgende sprint.</p>
                <h3 class="title is-4">Wordt vervolgd</h3>
                <p>Zo gaan we door tot het MVP gereed is en we samen een glas champagne drinken op het live gaan van uw applicatie. En als het glas leeg is, dan starten we met de volgende sprint, omdat er nog features in de back-log staan die ook heel belangrijk zijn voor het succesvol maken van uw onderneming.<br>We mixen dan in iedere sprint nieuwe features en aanpassingen op bestaande features tot we de sprint gevuld hebben.</p>
                <h3 class="title is-4">Voor- en nadelen van deze methode</h3>
                <p>Zoals eerder gezegd, dit hebben we niet zelf verzonnen, maar deze werkwijze is het product van jarenlange ervaringen in de branche en wordt bij alle moderne en grote ondernemingen waar software wordt geproduceerd toegepast.</p>
                <p>De voordelen voor u als opdrachtgever op een rijtje:</p>
                <ul>
                    <li>snel resultaat<br>(dat noemen we korte marktintroductietijd)</li>
                    <li>veel controle op hetgeen er gebouwd wordt</li>
                    <li>controle op budget<br>u krijgt na iedere sprint een factuur, dus u houdt greep op de kosten</li>
                    <li>hoge kwaliteit<br>geen haastwerk met bugs</li>
                    <li>het werken in sprints betekent dat er snel gereageerd kan worden op veranderingen in bijvoorbeeld de markt of wet- en regelgeving</li>
                </ul>
                <p>Er zijn uiteraard ook nadelen:</p>
                <ul>
                    <li>u moet betrokken zijn<br>bij deze werkwijze wordt van u verwacht dat u meedenkt en actief betrokken bent bij het proces. Enkel het tekenen van een overeenkomst en met de armen over elkaar afwachten is niet genoeg</li>
                    <li>het lijkt een carte-blanche<br>op het eerste gezicht lijkt het misschien of u ons een blanco cheque overhandigt, wij beloven immers niet het product te bouwen tegen een vast bedrag. Echter andere aannemers die het project wellicht fixed-price aanbieden zullen (als ze slim zijn) een marge in de prijs opnemen om met onvoorziene zaken en voortschreidend inzicht om te gaan. Die marge kunt u bij ons gebruiken om features mee te ontwikkelen. En dat kunnen we doen, door de kort-cyclische aanpak. Na iedere sprint is er gelegenheid tot bijsturen.</li>
                </ul>
            </div>
            @include('partial.offerte')
            @include('footer.share')
        </div>
    </article>
@endsection