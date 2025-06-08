<?php

class ValidateNoEmptySpaces implements ValidationRules
{
    public function validate($input): bool
    {
        if (!str_contains($input, ' ')) {
            return true;
        }
        return false;
    }

    public function getErrorMessage(): string
    {
        return 'No empty spaces should be entered';
    }
}