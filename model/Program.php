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
function readOne(){
 
    $query = "SELECT
                title, content, iconsid
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    $stmt = $this -> conn -> prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->title = $row['title'];
    $this->content = $row['content'];
    $this->iconsid = $row['iconsid'];
}
    // select all programs
    function readAll ()
    {
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this -> table_name . " INNER JOIN icons ON icons.iconid = " .$this -> table_name . ".iconsid
                ORDER BY
                   " .$this -> table_name . ".title";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }
function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                title = :title,
                content = :content,
                iconsid = :iconsid
            
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->content=htmlspecialchars(strip_tags($this->content));
    $this->iconsid=htmlspecialchars(strip_tags($this->iconsid));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind parameters
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':iconsid', $this->iconsid);
     $stmt->bindParam(':id', $this->id);
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
    // create program
    function createProgram ()
    {
        //write query
        $query = "INSERT INTO
                    " . $this -> table_name . "
                SET
                    content=:content,title=:title, iconsid=:iconsid";

        $stmt = $this -> conn -> prepare ( $query );

        // posted values
        $this -> title   = htmlspecialchars ( strip_tags ( $this -> title ) );
        $this -> content = htmlspecialchars ( strip_tags ( $this -> content ) );
        $this -> iconsid = htmlspecialchars ( strip_tags ( $this -> iconsid ) );

        // bind values
        $stmt -> bindParam ( ":title" , $this -> title );
        $stmt -> bindParam ( ":content" , $this -> content );
        $stmt -> bindParam ( ":iconsid" , $this -> iconsid );

        if ( $stmt -> execute () ) {
            return true;
        } else {
            print_r ( $stmt -> errorInfo () );
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