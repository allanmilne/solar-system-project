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
    <a href="/" class="btn btn-link">Go Back</a>
    <h1>Planets</h1>
    @if(count($planets) > 1)
        @foreach ($planets as $planet)
            <ul>
                <h3><a href="/planets/{{$planet->id}}">{{$planet->name}}</a></h3>
            </ul>
        @endforeach
    @else
        <p>No planets found</p>
    @endif

</body>
</html>