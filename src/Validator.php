<?php

class Validator
{
    public function validatePassword($password)
    {
        $validateMinimum = new ValidateMinimum(3);
        if (!$validateMinimum->validateRule($password)) {
            return false;
        }
        $validateMaximum = new ValidateMaximum(15);
        if (!$validateMaximum->validateRule($password)) {
            return false;
        }

        $validateSpecialChar = new ValidateSpecialChar();
        if (!$validateSpecialChar->validateRule($password)) {
            return false;
        }
    }
}