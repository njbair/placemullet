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
        <ul>
            @foreach ($images as $image)
                @php
                    $filename = pathinfo($image->path, PATHINFO_FILENAME);
                    $filename .= '.';
                    $filename .= pathinfo($image->path, PATHINFO_EXTENSION);

                    $hash = base64_encode($image->path);
                @endphp
                <li>
                    <div class="example-image">
                        <img src="{{ url("/hash/{$hash}") }}" alt="" />
                    </div>
                    Filename: {{ $filename }}
                    <br/>
                    Aspect ratio: {{ $image->aspect_ratio }}
                </li>
            @endforeach
        </ul>
    </body>
</html>
