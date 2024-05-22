<?php

class FormValidator
{
    private $errors = [];

    public function validatePhoneNumber($phoneNumber)
    {
    $phoneNumber = str_replace(' ', '', $phoneNumber);

    if (strlen($phoneNumber) === 9 && ctype_digit($phoneNumber)) {
        return true;
    } else {
        $this->errors['phone'] = 'The number you have entered is an invalid one. Please, enter a 9 digits phone number.';
    }
}



    public function getErrors()
    {
        return $this->errors;
    }
}
