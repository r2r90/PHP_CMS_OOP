<?php

class ValidateSpecialChar
{
    private string $regex;

    public function __construct($rule = "/[^a-zA-Z0-9]/")
    {
        $this->regex = $rule;
    }

    function validate($input): bool
    {
        if (!preg_match($this->regex, $input)) {
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return "Minimum one special character needed.";
    }
}