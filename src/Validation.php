<?php

class Validation
{

    private array $rules;

    public function addRule($rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function validate($input)
    {
        foreach ($this->rules as $rule) {
            $result = $rule->validateRule($input);
            if (!$result) {
                return false;
            }
        }

        return true;
    }
}