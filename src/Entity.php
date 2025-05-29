<?php

#[\AllowDynamicProperties]
class Entity
{
    private PDO $dbConnection;
    protected $tableName;
    protected $fields;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function findBy($fieldName, $fieldValue)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . " = :value";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $dbData = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setValues($dbData);
    }

    public function setValues($values)
    {
        foreach ($this->fields as $fieldName) {
            $this->$fieldName = $values[$fieldName];
        }
    }
}