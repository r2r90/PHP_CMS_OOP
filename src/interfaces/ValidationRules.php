<?php

interface ValidationRules
{
    public function validate($input);

    public function getErrorMessage();
}

