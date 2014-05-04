<?php

class Gallery extends \Eloquent
{
    /**
     * @var array
     */
    public $newImages = array();

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->belongsToMany('Image');
    }

    /**
     * @param array $input
     * @return static
     */
    public static function create(array $input)
    {
        $gallery = new static;
        $gallery->setData($input);

        return $gallery;
    }

    /**
     * @param array $input
     */
    public function update(array $input = array())
    {
        $this->setData($input);
    }

    /**
     * @param array $input
     * @internal param $gallery
     */
    protected function setData(array $input)
    {
        $this->name = $input['name'];

        if ($this->save()) {
            $this->setImages($input);
        }
    }

    /**
     * @param array $input
     */
    protected function setImages(array $input)
    {
        if (isset($input['images-to-delink'])) {
            $this->delinkImages($input['images-to-delink']);
        }
        if (isset($input['images-to-upload'])) {
            $this->addImages($input['images-to-upload']);
        }
        if (isset($input['images-to-link'])) {
            $this->linkImages($input['images-to-link']);
        }
    }

    /**
     * @param array $images_to_delink
     * @internal param array $input
     */
    protected function delinkImages(array $images_to_delink)
    {
        foreach ($images_to_delink as $id => $value) {
            $this->images()->detach($id);
        }
    }

    /**
     * @param array $images_to_upload
     * @internal param array $input
     * @return mixed
     */
    protected function addImages(array $images_to_upload)
    {
        foreach ($images_to_upload as $key => $img) {
            $image = \Image::newImage($img->getClientOriginalName());
            $this->images()->attach($image);
            $this->newImages[$key] = $image->filename;
        }
    }

    /**
     * @param array $images_to_link
     * @internal param array $input
     */
    protected function linkImages(array $images_to_link)
    {
        foreach ($images_to_link as $image_id) {
            $image = \Image::find($image_id);
            $this->images()->detach($image);
            $this->images()->attach($image);
        }
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        $this->images()->detach();

        return parent::delete();
    }
}