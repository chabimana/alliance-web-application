<?php
$titleError ="";
$contentError ="";
$summaryError = "";
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Events Registration";

// include login checker
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../model/Events.php';
include_once '../model/User.php';
include_once "../libs/php/utils.php";

// include page header HTML
include_once "header.php";

// get database connection since we need icons on the UI before creating a program
$database = new Database();
$db       = $database -> getConnection ();


echo "<div class='col-md-8'>";

if($_POST){
if (empty($_POST["title"]) || empty($_POST["content"]) ){
if (empty($_POST["title"])) {
$titleError = "Event title is required";
} else {
$title = $_POST["title"];
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
$titleError = "Only letters and white space allowed";
}
}
if (empty($_POST["content"])) {
$contentError = "content is required";
} 
if (empty($_POST["summary"])) {
$summaryError = "summary is required";
} 
}else {
    $event = new Events( $db );
    $utils = new Utils();

    // set values to object properties
    $event -> title   = $_POST[ 'title' ];
    $event -> content = $_POST[ 'content' ];
    $event -> summary = $_POST[ 'summary' ];
    $event -> created_by =  $_SESSION[ 'user_id' ];
    if ( $event -> create () ) {
        echo "<div class='alert alert-success'>Event created successful.</div>.Click " ?> <a
            href="<?php echo $home_url; ?>preview.php" class="btn btn-primary">Here To Preview The
            Program On The Homepage</a><?php ;
    } else {
        echo "<div class='alert alert-danger'>Unable to create program.</div>";
    }
}
}
?>
    <form action='event_registration.php' method='post' id='register'>
        <table class='table table-responsive'>
            <tr>
                <td class='width-30-percent'>Event Title</td>
                <td><input type='text' name='title' class='form-control' 
                           value="<?php echo isset( $_POST[ 'title' ] ) ? htmlspecialchars ( $_POST[ 'title' ] , ENT_QUOTES ) : ""; ?>"/>
                </td>
                <td><span class="error text-danger">*<?php echo $titleError;?></span></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea rows='15' name='content' class='form-control'
                              ><?php echo isset( $_POST[ 'content' ] ) ? htmlspecialchars ( $_POST[ 'content' ] , ENT_QUOTES ) : ""; ?></textarea>

                </td>
                <td><span class="error text-danger">*<?php echo $contentError;?></span></td>
            </tr>

            <tr>
                <td>Summary</td> 
                 <td><textarea rows='5' name='summary' class='form-control'
                              ><?php echo isset( $_POST[ 'summary' ] ) ? htmlspecialchars ( $_POST[ 'content' ] , ENT_QUOTES ) : ""; ?></textarea>

                </td>
                <td><span class="error text-danger">*<?php echo $summaryError;?></span></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Add A New Event
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