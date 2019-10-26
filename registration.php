<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Register";
// include login checker
include_once "login_checker.php";
// include classes
include_once 'config/database.php';
include_once 'model/user.php';
include_once "libs/php/utils.php";

// include page header HTML
include_once "view/common/header.php";

// if form was posted
if ( $_POST ) {

    // get database connection
    $database = new Database();
    $db       = $database -> getConnection ();

    // initialize objects
    $user  = new user( $db );
    $utils = new Utils();

    // set user email to detect if it already exists
    $user -> email = $_POST[ 'email' ];

    // check if email already exists
    if ( $user -> emailExists () ) {
        echo "<div class='alert alert-danger'>";
        echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
        echo "</div>";
    } else {
        // set values to object properties
        $user -> firstname      = $_POST[ 'firstname' ];
        $user -> lastname       = $_POST[ 'lastname' ];
        $user -> contact_number = $_POST[ 'contact_number' ];
        $user -> address        = $_POST[ 'address' ];
        $user -> password       = $_POST[ 'password' ];
        $user -> access_level   = 'Customer';
        $user -> status         = 1;

        // create the user
        if ( $user -> create () ) {

            echo "<div class='alert alert-info'>";
            echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
            echo "</div>";

            // empty posted values
            $_POST = array ();

        } else {
            echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sign up : cleartuts</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div class="container">
    <div class="form-container">
        <form method="post">
            <h2>Sign up.</h2>
            <hr/>
            <?php
            if ( isset( $error ) ) {
                foreach ( $error as $error ) {
                    ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                    </div>
                    <?php
                }
            } else {
                if ( isset( $_GET[ 'joined' ] ) ) {
                    ?>
                    <div class="alert alert-info">
                        <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a>
                        here
                    </div>
                    <?php
                }
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username"
                       value="<?php if ( isset( $error ) ) {
                           echo $uname;
                       } ?>"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID"
                       value="<?php if ( isset( $error ) ) {
                           echo $umail;
                       } ?>"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password"/>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br/>
            <label>have an account ! <a href="index.php">Sign In</a></label>
        </form>
    </div>
</div>

</body>
</html>