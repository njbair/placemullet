<?php

return [
    // when no image size is specified, use this value.
    'default_image_size' => env('PLACEHOLDER_DEFAULT_IMAGE_SIZE', 1024),

    // the app supports URI requests by file type. This pattern is used to
    // recognize those extensions. If you add new values here, make sure they're
    // supported by the Intervention image library.
    'output_extensions_pattern' => env('PLACEHOLDER_OUTPUT_EXTENSIONS_PATTERN', '(JPE?G|PNG|GIF|WEBP|jpe?g|png|gif|webp)'),
];
