<?php

namespace App\Http\Controllers\Traits;

use Image;

trait ResizesImages {

    protected $imageStoragePath = 'uploads';
    protected $slideStoragePath = 'uploads/slides';
    protected $imageWidth = 1920;
    protected $slideWidth = 1600;
    protected $thumbWidth = 300;

    public function filenames($file)
    {
        $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->guessClientExtension();

        return [
            'filename' => $filename,
            'thumbnail' => 'thumb_' . $filename
        ];
    }

    public function createImageAndThumbnail($file)
    {
        $filenames = $this->filenames($file);
        $imagePath = public_path($this->imageStoragePath . '/' . $filenames['filename']);
        $thumbPath = public_path($this->imageStoragePath . '/' . $filenames['thumbnail']);
        Image::make($file->getRealPath())->widen($this->imageWidth)->save($imagePath);
        Image::make($file->getRealPath())->fit($this->thumbWidth)->save($thumbPath);
        return $filenames['filename'];
    }

    public function createSlideAndThumbnail($file)
    {
        $filenames = $this->filenames($file);
        $imagePath = public_path($this->slideStoragePath . '/' . $filenames['filename']);
        $thumbPath = public_path($this->slideStoragePath . '/' . $filenames['thumbnail']);
        Image::make($file->getRealPath())->widen($this->slideWidth)->save($imagePath);
        Image::make($file->getRealPath())->fit($this->thumbWidth)->save($thumbPath);
        return $filenames['filename'];
    }
}
