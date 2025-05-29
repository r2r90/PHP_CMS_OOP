<?php

class Template
{
    private string $layout;


    function __construct($layout)
    {
        $this->layout = $layout;
    }

    function view($template, $variables): void
    {
        extract($variables);
        include VIEW_PATH . 'layout/' . $this->layout . '.php';
    }
}