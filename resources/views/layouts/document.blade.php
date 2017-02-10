<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path() }}/css/style.css">
    <style>
        body {
            padding: 3em;
        }
        section {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>

</html>

