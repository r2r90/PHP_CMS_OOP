<?php

class ValidateEmail implements ValidationRules
{
    function validate($input): bool
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    function getErrorMessage(): string
    {
        return "Please enter a valid email address.";
    }
}