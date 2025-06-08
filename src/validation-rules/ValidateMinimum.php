<?php

class ValidateMinimum implements ValidationRules
{
    private int $minimum;

    public function __construct($value)
    {
        $this->minimum = $value;
    }

    public function validate($input): bool
    {
        if (strlen($input) < $this->minimum) {
            return false;
        }

        return true;
    }

    public function getErrorMessage(): string
    {
        return 'Minimum must be at least ' . $this->minimum . ' characters.';
    }

}