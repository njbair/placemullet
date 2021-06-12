<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class Gallery {
    private $gallery;
    private $files;
    private $images;

    public function __construct($gallery = false) {
        if ( $gallery ) {
            $this->gallery = $gallery;
        } else {
            $this->gallery = config('galleries.default_gallery');
        }

        $this->files = $this->getAllFiles();
        $this->images = $this->indexAll();
    }

    public function getRandomImage($size = false, $seed = false) {
        if ($seed) {
            srand($seed);
        }

        $size = $size ? $size : config('galleries.default_image_size');
        $dimensions = getDimensionsFromString($size);

        $aspectRatio = getAspectRatio($dimensions->width, $dimensions->height);
        $imagePool = $this->getAllByAspectRatio($aspectRatio);

        $num = count($imagePool);
        $rand = rand(0, $num - 1);
        $image = $imagePool[$rand];

        return $this->getImageByPath($image->path, "{$size}");
    }

    public function getImageByPath($path, $size) {
        $img = Image::make($path);

        if ($size !== 'original') {
            $dimensions = getDimensionsFromString($size);
            $img->fit($dimensions->width, $dimensions->height);
        }

        return $img->response();
    }

    public function getOriginalImageByPath($path) {
        $img = Image::make($path);

        return $img->response();
    }

    public function getAll() {
        return $this->images;
    }

    public function getAllByAspectRatio($aspect) {
        return array_values(array_filter($this->images, function($image) use ($aspect) {
            return $aspect === $image->aspect_ratio;
        }));
    }

    private function getAllFiles() {
        $galleryPath = config('galleries.path') . $this->gallery;
        $files = Storage::files($galleryPath);

        return array_values(array_filter($files, function($path) {
            $allowed_extensions = config('galleries.allowed_extensions');
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            return in_array($extension, $allowed_extensions);
        }));
    }

    private function indexAll() {
        return Cache::remember("gallery.{$this->gallery}.indexAll", 38400, function() {
            $imageIndex = array();

            foreach ($this->files as $path) {
                $filePath = Storage::path($path);

                $img = Image::make($filePath);

                $imageIndex[] = (object) array(
                    'path' => $filePath,
                    'aspect_ratio' => getAspectRatio($img->width(), $img->height()),
                );
            }

            return $imageIndex;
        });
    }
}
