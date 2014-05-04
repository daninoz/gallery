<?php

class Image extends \Eloquent
{
    public function galleries()
    {
        return $this->belongsToMany('Gallery');
    }

    /**
     * @param $filename
     * @return static
     */
    public static function newImage($filename)
    {
        $image = new static;
        $image->filename = $filename;
        $image->save();

        return $image;
    }

    /**
     * @param $value
     * @return string
     */
    protected function setFilenameAttribute($value)
    {
        $this->attributes['filename'] = time() . ' - ' . $value;
    }
}