<?php

namespace App\Http\Controllers\Traits;

use Image;

trait ResizesImages {

    /**
     * Where to save uploads and their thumbnails
     * @var string
     */
    protected $imageStoragePath = 'uploads';

    /**
     * Where to save slides and their thumbnails
     * @var string
     */
    protected $slideStoragePath = 'uploads/slides';

    /**
     * Resize uploads to this with
     * @var integer
     */
    protected $imageWidth = 1920;

    /**
     * Resize slides to this width
     * @var integer
     */
    protected $slideWidth = 1600;

    /**
     * Fit thumbnails to this width
     * @var integer
     */
    protected $thumbWidth = 300;

    /**
     * Create a filename from a given file
     *
     * @access public
     * @param  Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return array
     */
    public function filenames($file)
    {
        $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->guessClientExtension();

        return [
            'filename' => $filename,
            'thumbnail' => 'thumb_' . $filename
        ];
    }

    /**
     * Create an image and a corresponding thumbnail from a given file
     *
     * @access public
     * @param  Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return string
     */
    public function createImageAndThumbnail($file)
    {
        $filenames = $this->filenames($file);
        $imagePath = public_path($this->imageStoragePath . '/' . $filenames['filename']);
        $thumbPath = public_path($this->imageStoragePath . '/' . $filenames['thumbnail']);
        Image::make($file->getRealPath())->widen($this->imageWidth)->save($imagePath);
        Image::make($file->getRealPath())->fit($this->thumbWidth)->save($thumbPath);
        return $filenames['filename'];
    }

    /**
     * Create a slide and a corresponding thumbnail from a given file
     * @access public
     * @param  Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return string
     */
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
