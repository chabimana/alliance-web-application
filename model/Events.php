<?php
class Events{
// database connection and table name
    private $conn;
    private $table_name = "events";

    // object properties
    public $id;
    public $title;
    public $content;
    public $create_on;
    public $created_by;
    public $summary;

    public function __construct ( $db )
    {
        $this -> conn = $db;
    }
 /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param mixed $createdOn
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }
    function readOne(){
 
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                id = ?";
 
    $stmt = $this -> conn -> prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
    function create ()
    {
    	 $this -> create_on = date ( 'Y-m-d H:i:s' );

        // insert query
        $query = "INSERT INTO " . $this -> table_name . "
            SET 
        title =:title,
    	content = :content,
    	create_on = :create_on,
    	created_by = :created_by,
    	summary = :summary
    	";
    	  $stmt = $this -> conn -> prepare ( $query );

        // sanitize
        $this -> title      = htmlspecialchars ( strip_tags ( $this -> title ) );
        $this -> content       = htmlspecialchars ( strip_tags ( $this -> content ) );
        $this -> created_by          = htmlspecialchars ( strip_tags ( $this -> created_by ) );
        $this -> summary          = htmlspecialchars ( strip_tags ( $this -> summary ) );
        // bind the values
        $stmt -> bindParam ( ':title' , $this -> title );
        $stmt -> bindParam ( ':content' , $this -> content );
        $stmt -> bindParam ( ':created_by' , $this -> created_by );
        $stmt -> bindParam ( ':create_on' , $this -> create_on );
        $stmt -> bindParam ( ':summary' , $this -> summary );

        // execute the query, also check if query was successful
        if ( $stmt -> execute () ) {
            return true;
        } else {
            $this -> showError ( $stmt );
            return false;
        }

    }
    function readAll ()
    {

        //select all data
        $query = "SELECT
                    " . $this -> table_name . ".id as eventid,  title, content, summary, users.id as userId, firstname, lastname, email
                FROM
                    " . $this -> table_name . " INNER JOIN users ON users.id = " .$this -> table_name . ".created_by
                ORDER BY
                   " .$this -> table_name . ".create_on DESC LIMIT 0, 5";

        $stmt = $this -> conn -> prepare ( $query );
        $stmt -> execute ();

        return $stmt;
    }
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