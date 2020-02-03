<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <a href="/planets/" class="btn btn-link">Planets</a>
    <a href="/planets/discover" class="btn btn-link">Discover Planet</a>
    <h1>Solar System</h1>
    {{-- Hook into db and display JSON --}}
</body>
</html>