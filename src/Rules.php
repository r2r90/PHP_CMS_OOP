<?php

class Rules
{
    private array $rules;

    public function __construct()
    {
        $this->rules = [
            function ($value) {
                return strlen($value) >= 8 ? true : 'Password to short !';
            },
            function ($value) {
                return strlen($value)  <= 20 ? true : 'Password to long !';
            },
            function ($value) {
                return (bool)preg_match('/[^\w\s]/', $value) ? true : 'At least one special character is required !';
            }
        ];
    }

    public function getRules(): array
    {
        return $this->rules;
    }

}