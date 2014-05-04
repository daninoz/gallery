<?php

namespace Acme\Validators;

class Gallery extends Validator
{
    protected $rules = array(
        "create" => array(
            'name' => 'required',
        ),
        "update" => array(
            'name' => 'required',
        ),
    );
}