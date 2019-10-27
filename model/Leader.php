<?php


class leader
{
    // database connection and table name
    private $conn;
    private $table_name = "leaders";

    public $id;

    public $position;

    public $image;

    public $names;

    public function __construct ( $db )
    {
        $this -> conn = $db;
    }

    // select all leaders
    function readAll ()
    {
        //select all data
        $query = "SELECT
                    *
                FROM
                    " . $this -> table_name . "
                ORDER BY
                    id";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this -> id;
    }

    /**
     * @param mixed $id
     */
    public function setId ( $id ): void
    {
        $this -> id = $id;
    }

    /**
     * @return mixed
     */
    public function getPosition ()
    {
        return $this -> position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition ( $position ): void
    {
        $this -> position = $position;
    }

    /**
     * @return mixed
     */
    public function getImage ()
    {
        return $this -> image;
    }

    /**
     * @param mixed $image
     */
    public function setImage ( $image ): void
    {
        $this -> image = $image;
    }

    /**
     * @return mixed
     */
    public function getPhoto ()
    {
        return $this -> photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto ( $photo ): void
    {
        $this -> photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getNames ()
    {
        return $this -> names;
    }

    /**
     * @param mixed $names
     */
    public function setNames ( $names ): void
    {
        $this -> names = $names;
    }

    function addleaders ()
    {
        //write query
        $query = "INSERT INTO
                    " . $this -> table_name . "
                SET
                    image=:image,position=:position,email=:email,names=:names";

        $stmt = $this -> conn -> prepare ( $query );

        // posted values
        $this -> image    = $this -> image;
        $this -> position = htmlspecialchars ( strip_tags ( $this -> position ) );
        $this -> email    = htmlspecialchars ( strip_tags ( $this -> email ) );
        $this -> names    = htmlspecialchars ( strip_tags ( $this -> names ) );


        // bind values
        $stmt -> bindParam ( ":image" , $this -> image , PDO::PARAM_LOB );
        $stmt -> bindParam ( ":position" , $this -> position );
        $stmt -> bindParam ( ":email" , $this -> email );
        $stmt -> bindParam ( ":names" , $this -> names );

        if ( $stmt -> execute () ) {
            return true;
        } else {
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