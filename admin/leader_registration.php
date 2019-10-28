<?php
$nameError ="";
$emailError ="";
$positionError ="";
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Program Registration";

// include login checker
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../model/Leader.php';
include_once "../libs/php/utils.php";

// include page header HTML
include_once "header.php";

// get database connection since we need icons on the UI before creating a program
$database = new Database();
$db       = $database -> getConnection ();

echo "<div class='col-md-8'>";

if($_POST){
if (empty($_POST["names"])) {
$nameError = "names is required";
} else {
$name  = $_POST["names"];
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Only letters and white space allowed";
}
}
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
$emailError = "Invalid email format";
}
}if (empty($_POST["position"])) {
$positionError = "position is required";
}
else{
if (count($_FILES) > 0) {
    $leader = new Leader( $db );

    $utils = new Utils();
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
                                        <span class="error text-danger">* <?php echo $nameError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label> <input
                                        type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" /> <span class="error text-danger">* <?php echo $emailError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leader's Position</label> <input
                                        type="text" class="form-control" placeholder="ex: President"
                                       name="position" /><span class="error text-danger">* <?php echo $positionError;?></span>
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