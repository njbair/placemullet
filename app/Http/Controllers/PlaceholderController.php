<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class PlaceholderController extends Controller
{
    private $gallery;

    public function __construct() {
        $this->gallery = new Gallery();
    }

    public function getRandom() {
        return $this->gallery->getRandomImage();
    }

    public function getBySize($size) {
        $dimensions = getDimensionsFromString($size);

        if ( ! $dimensions) {
            return $this->getRandom();
        }

        return $this->gallery->getRandomImage($size);
    }

    public function getByHash($hash) {
        $path = base64_decode($hash);

        return $this->gallery->getImageByPath($path, 'original');
    }

    public function getIndex() {
        $images = $this->gallery->getAll();

        return view('index', ['images' => $images]);
    }
}
