<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>PLACEMULLET.COM</title>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet" />
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body class="text-lg">
        <header class="py-6 bg-gradient-to-br from-yellow-200 via-green-400 to-blue-600">
            <div class="container mx-auto px-4">
                <h1 class="py-6 text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl text-center font-montserrat font-bold bg-gray-800 text-white uppercase tracking-wider">
                    PlaceMullet.com
                </h1>
                <p class="mt-6 mx-auto max-w-xs sm:max-w-full text-sm text-center font-montserrat font-bold uppercase tracking-widest">Serving mullets to the Internet since 2021</p>
            </div>
        </header>

        <div class="container mt-8 mx-auto pt-4 pb-8 px-4 flex flex-col lg:flex-row lg:items-start">
            <main class="pt-4 font-raleway lg:w-2/3">
                <h2 class="text-3xl md:text-4xl font-montserrat font-bold">
                    PlaceMullet.com: The Free Mullet Photo Placeholder Service You
                    May Find Useless
                </h2>

                <h3 class="mt-8 mb-6 text-4xl font-montserrat">
                    What Exactly Is Going On Here?
                </h3>
                <p class="my-6">
                    PlaceMullet.com generates custom placeholder mullets on the
                    fly, like this example:
                </p>
                <p class="my-6">
                    <img src="{{ url('/640x480.jpg?seed=11') }}" />
                </p>

                <h3 class="mt-8 mb-6 text-4xl font-montserrat">
                    How To Use These Placeholders
                </h3>
                <p class="my-6">
                    Just specify the image size after our URL
                    (https://placemullet.com/) and you’ll get a placeholder
                    image. So the image URL should look this:
                </p>
                <p class="my-8 font-bold">
                    https://placemullet.com/150
                </p>
                <p class="my-6">
                    You can use the images in your HTML or CSS, like this:
                </p>
                <p class="my-8 font-bold">
                    &lt;img src=”https://placemullet.com/150”&gt;
                </p>

                <h3 class="mt-8 mb-6 text-4xl font-montserrat">
                    How To Set Image Size
                </h3>
                <p class="my-6">
                    Specify the width first, then height. Height is optional: if no height is specified, your placeholder image will be a square. So this example…
                </p>
                <p class="my-8 font-bold">
                    https://placemullet.com/150
                </p>
                <p class="my-6">
                    …generates a 150 pixel square dummy image:
                </p>
                <p class="my-6">
                    <img src="{{ url('/150?seed=4') }}" />
                </p>

                <h3 class="mt-8 mb-6 text-4xl font-montserrat">
                    You Have Questions
                </h3>
                <p class="my-6">
                    We may have answers. Please feel free to drop us an email at
                    <a class="text-gray-800 hover:text-gray-500" href="mailto:info@placemullet.com">info@placemullet.com</a>.
                </p>
            </main>
            <aside class="font-raleway text-base lg:w-1/3 lg:border-l-2 lg:ml-8 lg:pl-8 lg:pt-6">
                <h3 class="mb-6 text-base font-montserrat font-bold">
                    QUICKSTART
                </h3>
                <p class="my-6">
                    Placemullet.com is a free image placeholder service for web
                    designers, serving <em>at least several</em> mullets each year.
                </p>
                <p class="my-6">
                    You can specify image size & format (.GIF, .JPG, .PNG,
                    .WEBP).
                </p>
                <p class="my-6">
                    You’re welcome.
                </p>
            </aside>
        </div>

        <footer class="py-6 bg-gradient-to-br to-yellow-200 via-green-400 from-blue-600">
            <div class="container mx-auto pt-12 pb-24 px-4">
                <p class="text-sm text-center">
                    &copy {{ now()->year }} PlaceMullet.com
                    |
                    Brought to you by the mullet appreciators at
                    <a class="hover:text-gray-500" href="https://bartoninteractive.com">Barton Interactive</a>
                </p>
            </div>
        </footer>
    </body>
</html>
