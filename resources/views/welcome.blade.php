<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{$appName}}</title>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet" />
        <link href="/css/app.css?2021-06-16" rel="stylesheet">
    </head>
    <body class="text-lg">
        <div id="app">
            <header class="py-6 bg-gradient-to-br from-yellow-200 via-green-400 to-blue-600">
                <div class="container mx-auto px-4">
                    <h1 class="py-6 text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl text-center font-montserrat font-bold bg-gray-800 text-white uppercase tracking-wider">
                        {{$appName}}
                    </h1>
                    <p class="mt-6 mx-auto max-w-xs sm:max-w-full text-sm text-center font-montserrat font-bold uppercase tracking-widest">Serving mullets to the Internet since 2021</p>
                </div>
            </header>

            <div class="container mt-8 mx-auto pt-4 pb-8 px-4 flex flex-col lg:flex-row lg:items-start">
                <main class="pt-4 font-raleway lg:w-2/3">
                    <h2>
                        {{$appName}}: The Free Mullet Photo Placeholder Service You
                        May Find Useless
                    </h2>

                    <h3>
                        What Exactly Is Going On Here?
                    </h3>
                    <p>
                        {{$appName}} generates custom placeholder mullets on the
                        fly, like this example:
                    </p>
                    <p>
                        <img src="{{ url('/640x480.jpg?seed=11') }}" />
                    </p>

                    <h3>Contents</h3>

                    <ol class="toc my-8 py-4 pl-8 pr-4 border-l-2 list-decimal list-outside">
                        <li>
                            <a href="#HowToUse">How To Use These Placeholders</a>
                        </li>
                        <li>
                            <a href="#HowToSetImageSize">How To Set Image Size</a>
                        </li>
                        <li>
                            <a href="#HowToSetImageFormat">How To Set Image Format</a>
                        </li>
                        <li>
                            <a href="#CacheBusting">Cache-Busting</a>
                        </li>
                        <li>
                            <a href="#Seeding">Seeding</a>
                        </li>
                    </ol>

                    <h3 id="HowToUse">How To Use These Placeholders</h3>
                    <p>
                        Just specify the image size after our URL
                        ({{$appUrl}}) and you’ll get a placeholder
                        image. So the image URL should look this:
                    </p>
                    <p class="example">
                        {{$appUrl}}/150
                    </p>
                    <p>
                        You can use the images in your HTML or CSS, like this:
                    </p>
                    <p class="example">
                        &lt;a href="{{$appUrl}}"&gt;&lt;img src="{{$appUrl}}/150"&gt;&lt;/a&gt;
                    </p>

                    <h3 id="HowToSetImageSize">How To Set Image Size</h3>
                    <p>
                        Specify the width first, then height. Height is optional: if no height is specified, your placeholder image will be a square. So this example…
                    </p>
                    <p class="example">
                        {{$appUrl}}/150
                    </p>
                    <p>
                        …generates a 150 pixel square dummy image:
                    </p>
                    <p>
                        <img src="{{ url('/150?seed=4') }}" />
                    </p>

                    <h3 id="HowToSetImageFormat">How To Set Image Format</h3>
                    <p>
                        Append the desired image extension to the end of the URI,
                        like so:
                    </p>
                    <p class="example">
                        {{$appUrl}}/320.jpg
                        <br/>
                        {{$appUrl}}/320.png
                        <br/>
                        {{$appUrl}}/320.gif
                        <br/>
                        {{$appUrl}}/320.webp
                    </p>

                    <h3 id="CacheBusting">Cache-Busting</h3>
                    <p>
                        Sometimes you need to use the same URI to get multiple
                        images of the same size. Web browsers will request the image
                        once, then cache the result for all instances. Work around
                        this by appending an arbitrary query parameter to the URI,
                        like so:
                    </p>
                    <p class="example">
                        &lt;img src="{{$appUrl}}/320.jpg" alt="a mullet"&gt;
                        <br/>
                        &lt;img src="{{$appUrl}}/320.jpg?asdf" alt="a more different mullet"&gt;
                    </p>
                    <p class="text-sm">
                        Note: cache-busting does not guarantee unique results, but
                        it does make collisions unlikely.
                    </p>

                    <h3 id="Seeding">Seeding</h3>
                    <p>
                        Conversely, sometimes you want to make sure a given image is
                        always the same. You can do this by seeding the random
                        number generator with an arbitrary static value, like so:
                    </p>
                    <p class="example">
                        {{$appUrl}}/320?seed=neckwarmer
                    </p>
                    <p class="text-sm">
                        Note: as we're always adding new mullets, we cannot
                        guarantee long-term consistentcy of seed values.
                    </p>

                    <h3>You Have Questions</h3>
                    <p>
                        We may have answers. Please feel free to drop us an email at
                        <a href="mailto:info@placemullet.com">info@placemullet.com</a>.
                    </p>
                </main>
                <aside class="font-raleway text-base lg:w-1/3 lg:border-l-2 lg:ml-8 lg:pl-8 lg:pt-6">
                    <h3 class="mt-0">
                        Quick Start
                    </h3>

                    <p>
                        {{$appName}} is a free image placeholder service for web
                        designers, serving <em>at least several</em> mullets each year.
                    </p>

                    <p>
                        Use this interactive mullet builder to generate your own custom mullet.
                    </p>

                    <quickstart app-url="{{$appUrl}}"></quickstart>

                    <p>
                        You’re welcome.
                    </p>
                </aside>
            </div>

            <footer class="bg-gradient-to-br to-yellow-200 via-green-400 from-blue-600">
                <div class="py-6 bg-gray-300 bg-opacity-75">
                    <div class="container mx-auto pt-12 pb-24 px-4">
                        <p class="text-sm text-center">
                            &copy {{ now()->year }} {{$appName}}
                            |
                            Brought to you by the mullet appreciators at
                            <a href="https://bartoninteractive.com">Barton Interactive</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
