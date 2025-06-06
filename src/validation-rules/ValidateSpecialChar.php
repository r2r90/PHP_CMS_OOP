<?php

class ValidateSpecialChar
{
    private string $regex;

    public function __construct($rule = "/[^a-zA-Z0-9]/")
    {
        $this->regex = $rule;
    }

    function validateRule($input):bool
    {
        if (!preg_match($this->regex, $input)) {
            return false;
        }
        return true;
    }
}