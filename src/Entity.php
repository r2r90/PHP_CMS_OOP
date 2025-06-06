<?php

#[\AllowDynamicProperties]
abstract class Entity
{
    private PDO $dbConnection;
    protected $tableName;
    protected $fields;

    abstract protected function initFields();

    protected function __construct(PDO $dbConnection, $tableName)
    {
        $this->dbConnection = $dbConnection;
        $this->tableName = $tableName;
        $this->initFields();
    }

    public function findBy($fieldName, $fieldValue)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . " = :value";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $dbData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dbData) {
            $this->setValues($dbData);
        }
    }

    public function setValues($values)
    {
        foreach ($this->fields as $fieldName) {
            $this->$fieldName = $values[$fieldName];
        }
    }
}