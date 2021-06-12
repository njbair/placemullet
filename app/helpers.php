<?php

function getDimensionsFromString($string) {
    $match = preg_match('/([\d]+)([Xx]([\d]+))?/', $string, $matches);

    if ($match !== 1) {
        return false;
    }

    if ( isset($matches[3])) {
        return (object) array(
            'width' => $matches[1],
            'height' => $matches[3]
        );
    }

    return (object) array(
        'width' => $matches[1],
        'height' => $matches[1]
    );
}

function getAspectRatio($width, $height) {
    if ($width / $height >= 1.25) {
        return 'landscape';
    }
    if ($height / $width >= 1.25) {
        return 'portrait';
    }
    return 'square';
}
