<?php

namespace Acme\Validators;

/**
 * Class Validator
 * @package Turismo\Validators
 */
class Validator
{
    /**
     * @var array Errors from the validator
     */
    protected $errors;

    /**
     * @var array Input data to validate
     */
    protected $input;

    /**
     * @var string The rules can have different types
     */
    protected $type;

    /**
     * @var int Used to update unique values to ignore current id
     */
    protected $id;

    /**
     * @var array Rules for validator
     */
    protected $rules;

    /**
     * @var array Custom error messages
     */
    protected $customMessages = array();

    /**
     * Load the data to validate
     * @param array $input
     * @param string $type
     * @param  $id
     */
    public function setData($input, $type, $id = NULL)
    {
        $this->input = $input;
        $this->type = $type;
        if ($id) {
            $this->rules[$type] = str_replace(':ignore_id:', $id, $this->rules[$type]);
        }
    }

    /**
     * Validates the fields
     * @return boolean
     */
    public function validate()
    {
        $validator = \Validator::make($this->input, $this->rules[$this->type], $this->customMessages);
        if ($validator->passes()) {

            return TRUE;
        }
        $this->errors = $validator->errors();

        foreach ($this->input as $key => $value) {
            if (\Input::hasFile($key)) {
                $this->addError($key, "Debe subir nuevamente este archivo.");
            }
        }

        return FALSE;
    }

    /**
     * Add a custom message to the error array
     * @param string $field
     * @param string $message
     */
    public function addError($field, $message)
    {
        $this->errors->add($field, $message);
    }

    /**
     * Return all the errors
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}