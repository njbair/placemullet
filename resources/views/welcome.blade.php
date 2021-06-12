<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PLACEMULLET.COM</title>

        <style>
            img {
                max-width: 100%;
            }
            .example-image {
                width: 320px;
            }
        </style>
    </head>
    <body>
        <div class="example-image">
            <img src="{{ url('random') }}" />
        </div>
    </body>
</html>
