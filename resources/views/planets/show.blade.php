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
    <a href="/planets" class="btn btn-link">Go Back</a>
    <h1>{{$planet->name}}</h1>
    <div>
        <p>Distance from sun is {{$planet->distance}}AU</p>
        <p>Mass of {{$planet->name}} is {{$planet->mass}}KG</p>
    </div>
    <hr>
<a href="/planets/{{$planet->id}}/edit" class="btn btn-link">Edit</a>
</body>
</html>