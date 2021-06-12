<?php

return [
    'path' => env('GALLERIES_PATH', 'galleries/'),

    'default_gallery' => 'mullets',

    'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],

    'default_image_size' => env('GALLERIES_DEFAULT_IMAGE_SIZE', 1024),
];
