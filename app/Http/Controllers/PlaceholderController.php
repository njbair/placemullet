<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class PlaceholderController extends Controller
{
    private $gallery;

    public function __construct(Request $request) {
        $this->gallery = new Gallery();

        $seed = $request->query('seed');

        $this->seed = $seed ? $seed : false;
    }

    public function getRandom($ext = 'jpg') {
        $ext = self::normalizeExtension($ext);

        return $this->gallery->getRandomImage(false, $ext, $this->seed);
    }

    public function getBySize($size, $ext = 'jpg') {
        $dimensions = getDimensionsFromString($size);

        $ext = self::normalizeExtension($ext);

        if ( ! $dimensions) {
            return $this->getRandom($ext);
        }

        return $this->gallery->getRandomImage($size, $ext, $this->seed);
    }

    public function getByHash($hash) {
        $path = base64_decode($hash);

        return $this->gallery->getImageByPath($path, 'original');
    }

    public function getIndex() {
        $images = $this->gallery->getAll();

        return view('index', ['images' => $images]);
    }

    private static function normalizeExtension($ext) {
        $ext = strtolower($ext);

        if ($ext === 'jpeg') {
            $ext = 'jpg';
        }

        return $ext;
    }
}
