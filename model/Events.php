<?php
class Events
// database connection and table name
    private $conn;
    private $table_name = "events";

    // object properties
    public $id;
    public $title;
    public $content;
    public $createdOn;
    public $createdBy;
    public $summary;

    public function __construct ( $db )
    {
        $this -> conn = $db;
    }

    function create (){
    	this -> createdOn = date('Y-m-d H:i:s');
    	$query = "INSERT INTO . "$this-> table_name." SET title =:title,
    	content = :content,
    	created_on = :createdOn,
    	created_by = :createdBy,
    	summary = :summary
    	";
    	  $stmt = $this -> conn -> prepare ( $query );

        // sanitize
        $this -> title      = htmlspecialchars ( strip_tags ( $this -> title ) );
        $this -> content       = htmlspecialchars ( strip_tags ( $this -> content ) );
        $this -> createdBy          = htmlspecialchars ( strip_tags ( $this -> createdBy ) );
        $this -> summary          = htmlspecialchars ( strip_tags ( $this -> summary ) );
        // bind the values
        $stmt -> bindParam ( ':title' , $this -> title );
        $stmt -> bindParam ( ':content' , $this -> content );
        $stmt -> bindParam ( ':created_by' , $this -> createdBy );
        $stmt -> bindParam ( ':created_on' , $this -> createdOn );
        $stmt -> bindParam ( ':summary' , $this -> summary );

        // execute the query, also check if query was successful
        if ( $stmt -> execute () ) {
            return true;
        } else {
            $this -> showError ( $stmt );
            return false;
        }

    }

    }