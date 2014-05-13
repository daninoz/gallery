<?php namespace Acme\Upload;

use Intervention\Image\Image as Img;
use Config;

class Image {

    protected $image_path;

    protected $thumbnail_path;

    public function __construct()
    {
        $this->image_path = Config::get('upload.path') . Config::get('upload.image_path') . '/';
        $this->thumbnail_path = Config::get('upload.path') . Config::get('upload.thumbnail_path') . '/';
    }

    public function uploadImage($filename, $path)
    {
        $img = Img::make($path);
        $img->save($this->image_path.$filename);

    }

    public function uploadThumbnail($filename, $path)
    {
        $img = Img::make($path);
        $img->resize(Config::get('upload.thumbnail_size'), Config::get('upload.thumbnail_size'), true, false)
            ->save($this->thumbnail_path.$filename);
    }

    public function deleteImage($filename)
    {
        \File::delete($this->image_path.$filename);
    }

    public function deleteThumbnail($filename)
    {
        \File::delete($this->thumbnail_path.$filename);
    }

    public function uploadWithThumbnail($names, $input)
    {
        foreach ($names as $inputName => $name)
        {
            $image = $input[$inputName];
            $this->uploadImage($name, $image->getRealPath());
            $this->uploadThumbnail($name, $image->getRealPath());
        }
    }

}