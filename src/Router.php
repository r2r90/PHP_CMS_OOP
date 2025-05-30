<?php


class Router extends Entity
{
    public ?int $id = null;
    public ?string $module = null;
    public ?string $action = null;
    public ?int $entity_id = null;
    public ?string $pretty_url = null;

    public function __construct(PDO $dbConnection)
    {
        parent::__construct($dbConnection, 'routes');

    }

    protected function initFields()
    {
        $this->fields = [
            'id',
            'module',
            'action',
            'entity_id',
            'pretty_url'
        ];
    }

}