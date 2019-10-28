<?php
$nameError ="";
$emailError ="";
$positionError ="";
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Leader Registration";

// include login checker
include_once "login_checker.php";

include_once '../config/database.php';
include_once '../model/Leader.php';
include_once "../libs/php/utils.php";
// include page header HTML
include_once "header.php";
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$leader = new leader($db);

// set page headers
$page_title = "register leader";
echo "<div class='col-md-8'>";
?>
<?php 
// if the form was submitted 
if($_POST){

    if (empty($_POST["names"])) {
$nameError = "Names are required";
} else {
$name = $_POST["names"];
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Only letters and white space allowed";
}
}if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = $_POST["email"];
// check if e-mail address syntax is valid or not
if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
$emailError = "Invalid email format";
}
}
 if (count($_FILES) > 0) {
    if (isset($_FILES['image'])) {
    $leader->position = $_POST['position'];
    $leader->email = $_POST['email'];
    $leader->names = $_POST['names'];
    $leader->image = fopen($_FILES['image']['tmp_name'], 'rb');

    if($leader->addleaders()){
        echo "<div class='alert alert-success'>leader created successful.</div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>Unable to create leader.</div>";
    }
}
}
}
?>
    <div class="box-header with-border">
    <h3 class="box-title">Leader's Information</h3>
    </div>
    <form role="form"  action="leader_registration.php" enctype="multipart/form-data"
                            method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Full Name</label> <input
                                        type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="enter full name" name="names" /> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label> <input
                                        type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" /> 
                                        <span class="error">* <?php echo $nameError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leader's Position</label> <input
                                        type="text" class="form-control" placeholder="ex: President"
                                       name="position" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image input</label> <input
                                        type="file" name="image" />
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                               <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Add A New Program
                    </button>
                            </div>
                        </form>
                    <?php

echo "</div>";

// include page footer HTML
include_once "footer.php";
?>