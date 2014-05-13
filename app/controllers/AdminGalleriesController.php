<?php

class AdminGalleriesController extends \BaseController
{
    protected $galleries;

    protected $validator;

    protected $image;

    /**
     * @param Gallery $galleries
     * @param \Acme\Validators\Gallery $validator
     * @param \Acme\Upload\Image $image
     */
    public function __construct(Gallery $galleries, Acme\Validators\Gallery $validator, Acme\Upload\Image $image)
    {
        $this->galleries = $galleries;
        $this->validator = $validator;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = $this->galleries->paginate(10);

        return View::make('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->validator->setData(Input::all(), 'create');

        if ($this->validator->validate()) {
            $gallery = $this->galleries->create(Input::all());
            $this->image->uploadWithThumbnail($gallery->newImages, Input::file('images-to-upload'));

            return Redirect::route('galleries.index');
        }

        return Redirect::back()->withErrors($this->validator->getErrors())->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        return View::make('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Gallery $gallery
     * @return Response
     */
    public function update(Gallery $gallery)
    {
        $this->validator->setData(Input::all(), 'update', $gallery->id);

        if ($this->validator->validate()) {
            $gallery->update(Input::all());
            $this->image->uploadWithThumbnail($gallery->newImages, Input::file('images-to-upload'));

            return Redirect::route('galleries.index');
        }

        return Redirect::back()->withErrors($this->validator->getErrors())->withInput();
    }

    /**
     * Show a confirmation message for deleting the specified resource
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function delete(Gallery $gallery)
    {
        return View::make('galleries.delete', compact('gallery'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Gallery $gallery
     * @return Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return Redirect::route('galleries.index');
    }

}