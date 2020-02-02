<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Planet</title>
</head>

<body>
    <h1>Discover Planet</h1>

    <form method="POST" action="/planets">
        @csrf

        <div class="field">
            <label class="label" for="name">Planet Name</label>

            <div class="control">
                <input class="input" type="text"  name="name" id="name">
            </div>
        </div>

        <div class="field">
            <label class="label" for="distance">Distance from Sun</label>

            <div class="control">
                <input class="input" name="distance" id="distance">
            </div>
        </div>

        <div class="field">
            <label class="label" for="mass">Weight of Planet</label>

            <div class="control">
                <input class="input" name="mass" id="mass">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
