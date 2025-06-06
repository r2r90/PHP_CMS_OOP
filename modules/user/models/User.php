<?php

class User extends Entity
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $username = null;
    public ?string $password = null;
    public ?string $password_hash = null;

    public function __construct(PDO $dbConnection)
    {
        parent::__construct($dbConnection, 'users');

    }

    protected function initFields()
    {
        $this->fields = [
            'id',
            'name',
            'username',
            'password',
            'password_hash'
        ];
    }

}