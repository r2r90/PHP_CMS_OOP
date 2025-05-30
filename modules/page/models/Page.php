<?php
class Page extends Entity
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $content = null;



    public function __construct($dbConnection)
    {
        parent::__construct($dbConnection, 'pages');

    }

    protected function initFields()
    {
        $this->fields = [
            'id',
            'title',
            'content'
        ];
    }
}