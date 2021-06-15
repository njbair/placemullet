<?php

return [
    // this is the path relative to /storage/app where your galleries are
    // stored. The app looks here for your images.
    'path' => env('GALLERIES_PATH', 'galleries/'),

    // this listing is used to refresh the cache
    'galleries' => [ 'mullets' ],

    // for future use. Right now the app only really works with one gallery.
    'default_gallery' => env('GALLERIES_DEFAULT_GALLERY', 'mullets'),

    // how long to cache the gallery filesystem (in seconds)
    'cache_time' => env('GALLERIES_CACHE_TIME', 86400),

    // the app will search for files with these extensions. If you add new
    // values here, make sure they're compatible with the Intervention image
    // library.
    'indexed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
];
