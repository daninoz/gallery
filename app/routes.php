<?php

Route::model('galleries', 'Gallery');

Route::resource('galleries', 'AdminGalleriesController', ['except' => ['show']]);
Route::get('galleries/delete/{galleries}', ['as' => 'galleries.delete', 'uses' => 'AdminGalleriesController@delete']);

Route::get('images/search/{search?}', 'AdminImagesController@search');
Route::post('images/search/{search?}', 'AdminImagesController@search');