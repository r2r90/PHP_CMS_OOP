<?php

class ValidateMinimum
{
    private int $minimum;

    public function __construct($value)
    {
        $this->minimum = $value;
    }

    function validateRule($input): bool
    {
        if (strlen($input) < $this->minimum) {
            return false;
        }

        return true;
    }
}