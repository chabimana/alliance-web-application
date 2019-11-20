<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'model/Leader.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare Leader object
    $leader = new Leader($db);
     
    // set Leader id to be deleted
    $leader->id = $_POST['object_id'];
     
    // delete the Leader
    if($leader->delete()){
        echo "Object was deleted.";
    }
     
    // if unable to delete the Leader
    else{
        echo "Unable to delete object.";
    }
}
?>