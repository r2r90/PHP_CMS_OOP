<?php

class Page
{
    public $id;
    public $title;
    public $content;
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function findById($id)
    {


        $sql = "SELECT * FROM pages WHERE id = :id";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute(array('id' => $id));


        $pageData = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $pageData['id'];
        $this->title = $pageData['title'];
        $this->content = $pageData['content'];


    }

}