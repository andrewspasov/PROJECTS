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


    public function validateURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) == false) {
            $this->errors['url'] = 'Invalid URL! Please, enter a valid one.';
            $this->errors['url-1'] = 'Invalid URL! Please, enter a valid one.';
            $this->errors['url-2'] = 'Invalid URL! Please, enter a valid one.';
            $this->errors['url-3'] = 'Invalid URL! Please, enter a valid one.';
        }
    }

    public function validateFacebook($url)
    {
        $facebookURLPrefix = "https://www.facebook.com/";

        $url = trim($url);

        if (strpos($url, $facebookURLPrefix) !== 0) {
            $this->errors['fb'] = 'Invalid Facebook URL! Please, enter a valid one.';
        }
    }
    public function validateLinkedIn($url)
    {
        $linkedinURLPrefix = "https://www.linkedin.com/";

        $url = trim($url);

        if (strpos($url, $linkedinURLPrefix) !== 0) {
            $this->errors['linkedin'] = 'Invalid LinkedIn URL! Please, enter a valid one.';
        }
    }

    public function validateTwitter($url)
    {
        $twitterURLPrefix = "https://twitter.com/";

        $url = trim($url);

        if (strpos($url, $twitterURLPrefix) !== 0) {
            $this->errors['twitter'] = 'Invalid Twitter URL! Please, enter a valid one.';
        }
    }

    public function validateGoogle($url)
    {

        $googleURLPrefix = "https://www.google.com/";

        $url = trim($url);

        if (strpos($url, $googleURLPrefix) !== 0) {
            $this->errors['google'] = 'Invalid Google URL! Please, enter a valid one.';
        }
    }



    public function getErrors()
    {
        return $this->errors;
    }
}
