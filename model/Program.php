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
    public $iconsid;

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
                    content=:content,title=:title,iconsid=:iconsid";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->content=htmlspecialchars(strip_tags($this->content));
        $this->iconsid = htmlspecialchars(strip_tags($this->iconsid));

        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":iconsid", $this->iconsid);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // used for paging users
    public function countAll ()
    {

        // query to select all user records
        $query = "SELECT id FROM " . $this -> table_name . "";

        // prepare query statement
        $stmt = $this -> conn -> prepare ( $query );

        // execute query
        $stmt -> execute ();

        // get number of rows
        $num = $stmt -> rowCount ();

        // return row count
        return $num;
    }
}