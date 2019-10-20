<?php


class program
{
// database connection and table name
    private $conn;
    private $table_name = "programs";

    // object properties
    public $id;
    public $title;
    public $content;

    public function __construct ( $db )
    {
        $this -> conn = $db;
    }

    // select all programs
    function readAll ()
    {
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this -> table_name . "
                ORDER BY
                    title";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }

    // create program
    function createProgram(){
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title, content=:content";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->content=htmlspecialchars(strip_tags($this->content));

        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');

        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}