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
    <h1>Edit Planet</h1>

    <form method="POST" action="/planets/{{$planet->id}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="label" for="name">Planet Name</label>

            <div class="control">
            <input class="input" type="text"  name="name" id="name" value="{{$planet->name}}">
            </div>
        </div>

        <div class="form-group">
            <label class="label" for="distance">Distance from Sun</label>

            <div class="control">
                <input class="input" name="distance" id="distance" value="{{$planet->distance}}">
            </div>
        </div>

        <div class="form-group">
            <label class="label" for="mass">Weight of Planet</label>

            <div class="control">
                <input class="input" name="mass" id="mass" value="{{$planet->mass}}">
            </div>
        </div>
        <div class="form-group is-grouped">
            <div class="control">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
