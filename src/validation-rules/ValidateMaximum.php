<?php

class ValidateMaximum
{
    private int $maximum;

    public function __construct($value)
    {
        $this->maximum = $value;
    }

    function validateRule($input):bool
    {
        if (strlen($input) > $this->maximum) {
            return false;
        }
        return true;
    }
}