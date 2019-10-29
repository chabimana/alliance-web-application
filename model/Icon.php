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
    function readAll ()
    {
        //select all data
        $query = "SELECT
                    iconid, icon_desc
                FROM
                    " . $this -> table_name . "
                ORDER BY
                    iconid";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }
}
?>