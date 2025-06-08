<?php

class ValidateMaximum
{
    private int $maximum;

    public function __construct($value)
    {
        $this->maximum = $value;
    }

    function validate($input):bool
    {
        if (strlen($input) > $this->maximum) {
            return false;
        }
        return true;
    }
    public function getErrorMessage(): string
    {
        return 'Maximum value is ' . $this->maximum;
    }

}