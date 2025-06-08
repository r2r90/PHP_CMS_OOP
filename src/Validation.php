<?php

class Validation
{

    private array $rules;
    private array $errorMessages = [];

    public function addRule($rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function validate($input): bool
    {
        foreach ($this->rules as $rule) {
            $result = $rule->validate($input);
            if (!$result) {
                $this->errorMessages[] = $rule->getErrorMessage();
                return false;
            }
        }

        return true;
    }

    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }
}