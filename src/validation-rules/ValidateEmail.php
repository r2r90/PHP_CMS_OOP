<?php

class ValidateEmail
{
    function validateRule($input):bool
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}