<?php

class AdminImagesController extends BaseController
{
    public function search($search = "")
    {
        $images = Image::where('filename', 'LIKE', "%".$search."%")->paginate(10);

        return View::make('images.search', compact('images'));
    }
}