<?php
$nameError ="";
$emailError ="";
$positionError ="";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "UpDate Leader";

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
    $leader = new Leader( $db );
    $utils = new Utils();
// set ID property of product to be edited
$leader->id = $id;
$leader->readOne();
?>
<?php
if($_POST){
if (empty($_POST["names"]) || empty($_POST["email"])|| empty($_POST["position"]) ){
if (empty($_POST["names"])) {
$nameError = "names is required";
} else {
$name = $_POST["names"];
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$titleError = "Only letters and white space allowed";
}
}
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = $_POST["email"];
// check if e-mail address syntax is valid or not
if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
$emailError = "Invalid email format";
}
} 
if (empty($_POST["position"])) {
$positionError = "position is required";
}
}else {
if (count($_FILES) > 0) {
    $leader = new Leader( $db );
    $utils = new Utils();
    if (isset($_FILES['image'])) {
    $leader->position = $_POST['position'];
    $leader->email = $_POST['email'];
    $leader->names = $_POST['names'];
    $leader->image = fopen($_FILES['image']['tmp_name'], 'rb');

    if($leader->update()){
        echo "<div class='alert alert-success'>leader Updated successful.</div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>Unable to update leader.</div>";
    }

}
}   
}
}
?>
    <div class="box-header with-border">
    <h3 class="box-title">Leader's Information</h3>
    </div>
    <form role="form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" enctype="multipart/form-data"
                            method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Full Name</label> <input
                                        type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="enter full name" name="names" value='<?php echo $leader->names ?>' /> 
                                        <span class="error text-danger">* <?php echo $nameError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label> <input
                                        type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="email" value='<?php echo $leader->email ?>' /> <span class="error text-danger">* <?php echo $emailError;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leader's Position</label> <input
                                        type="text" class="form-control" placeholder="ex: President"
                                       name="position" value='<?php echo $leader->position ?>'/><span class="error text-danger">* <?php echo $positionError;?></span>
                                </div>
                                <div class="form-group">
                                    <?php echo ";<img height='150' width='150' class='img-circle center' src='data:image/jpg;base64," . base64_encode ($leader->image) . "'/>"?>
                                    <label for="exampleInputFile">Change Image</label> <input
                                        type="file" name="image"/>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                               <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Update Leader
                    </button>
                            </div>
                        </form>
                    <?php

echo "</div>";

// include page footer HTML
include_once "footer.php";
?>