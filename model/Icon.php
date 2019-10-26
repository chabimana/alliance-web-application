<?php

class icon
{


    public $id;
    public $name;
    public $icon_desc;
    private $conn;
    private $table_name = "icons";

    public function __construct ( $db )
    {
        $this -> conn = $db;
    }

    // used by select drop-down list
    function read ()
    {
        //select all data
        $query = "SELECT
                    id, icon_desc
                FROM
                    " . $this -> table_name . "
                ORDER BY
                    id";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }
}

?>