<?php
$titleError ="";
$contentError ="";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Update Program";

// include login checker
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../model/Program.php';
include_once '../model/Icon.php';
include_once "../libs/php/utils.php";

// include page header HTML
include_once "header.php";

// get database connection since we need icons on the UI before creating a program
$database = new Database();
$db       = $database -> getConnection ();
$icon     = new Icon( $db );


echo "<div class='col-md-8'>";
    $program = new Program( $db );
    $utils = new Utils();
// set ID property of product to be edited
$program->id = $id;
$program->readOne();

?>
<?php 
// if the form was submitted
if($_POST){
    if (empty($_POST["title"]) || empty($_POST["content"]) || !preg_match("/^[a-zA-Z ]*$/",$_POST["title"])){
 if (empty($_POST["title"])) {
$titleError = "program title is required";
} else{
$title  = $_POST["title"];
// check name only contains letters and whitespace
if(!preg_match("/^[a-zA-Z ]*$/",$title)) {
$titleError = "Only letters and white space allowed";
}
}
if(empty($_POST["content"])) {
$contentError = "content is required";
}
}else{
    // set product property values
    $program->title = $_POST['title'];
    $program->content = $_POST['content'];
    $program->iconsid = $_POST['iconId'];
    
 
    // update the product
    if($program->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Program updated.";
        echo "</div>";
    }
 
    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update Program.";
        echo "</div>";
    }
}
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>"  method='post' id='register'>
        <table class='table table-responsive'>
            <tr>
                <td class='width-30-percent'>Program Title</td>
                <td><input type='text' name='title' class='form-control' 
                           value='<?php echo $program->title; ?>'/>
                </td>
                <td><span class="error text-danger">*<?php echo $titleError;?></span></td>
            </tr>
            <tr>
                <td>Program Content</td>
                <td><textarea rows='15' name='content' class='form-control'><?php echo $program->content; ?></textarea>

                </td>
                <td><span class="error text-danger">*<?php echo $contentError;?></span></td>
            </tr>

            <tr>
                <td>Icon Name Selection</td> 
                <td><?php
                    $stmt = $icon -> readAll ();
                    echo "<select class='form-control' name='iconId' required>";
                    while ( $row_icon = $stmt -> fetch ( PDO::FETCH_ASSOC ) ) {
                        $id=$row_icon['iconid'];
                        $icon_desc=$row_icon['icon_desc'];
                        if($program->iconsid==$id){
            echo "<option value='$id' selected>";
        }else{
            echo "<option value='$id'>";
        }
        echo "$icon_desc</option>";
                    }
                    ?>
                    
                    <?php
                    echo "</select>";
                    ?></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                         Update Program
                    </button>
                </td>
            </tr>

        </table>
    </form>
<?php

echo "</div>";

// include page footer HTML
include_once "footer.php";
?>