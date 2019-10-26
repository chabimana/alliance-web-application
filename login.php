<!DOCTYPE html>
<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Login";

// include login checker
$require_login = false;
include_once "config/login_checker.php";

// default to false
$access_denied = false;

if ($_POST) {
    // include classes
    include_once "config/database.php";
    include_once "model/user.php";

    // get database connection
    $database = new Database();
    $db       = $database -> getConnection ();

    $user = new user( $db );
    // check if email and password are in the database
    $user -> email = $_POST[ 'username' ];
    // check if email exists, also get user details using this emailExists() method
    $email_exists = $user -> emailExists ();

    // validate login
    if ($email_exists && password_verify ( $_POST[ 'password' ] , $user -> password ) && $user -> status == 1) {

        // if it is, set the session value to true
        $_SESSION[ 'logged_in' ]    = true;
        $_SESSION[ 'user_id' ]      = $user -> id;
        $_SESSION[ 'access_level' ] = $user -> access_level;
        $_SESSION[ 'firstname' ]    = htmlspecialchars ( $user -> firstname , ENT_QUOTES , 'UTF-8' );
        $_SESSION[ 'lastname' ]     = $user -> lastname;

        // if access level is 'Admin', redirect to admin section
        if ($user -> access_level == 'Admin') {
            header ( "Location: {$home_url}admin/index.php?action=login_success" );
        } // else, redirect only to 'Customer' section
        else {
            header ( "Location: {$home_url}index.php?action=login_success" );
        }
    } // if username does not exist or password is wrong
    else {
        $access_denied = true;
    }
}

// login form html will be here
?>
<body class="hold-transition skin-blue fixed layout-top-nav">
<div class="wrapper">
    <!-- Main Header -->
    <?php
    include "view/common/header.php";
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <br/> <br/> <br/> <br/> <br/><br/><br/><br/><br/>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="login-box-body">
                            <p class="login-box-msg">Sign In To Your Account</p>
                            <?php
                            // get 'action' value in url parameter to display corresponding prompt messages
                            $action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : "";

                            // tell the user he is not yet logged in
                            if ($action == 'not_yet_logged_in') {
                                echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
                            } // tell the user to login
                            else if ($action == 'please_login') {
                                echo "<div class='alert alert-info'>
                                <strong>Please login to access that page.</strong>
                                 </div>";
                            } // tell the user email is verified
                            else if ($action == 'email_verified') {
                                echo "<div class='alert alert-success'>
                                 <strong>Your email address have been validated.</strong>
                             </div>";
                            }

                            // tell the user if access denied
                            if ($access_denied) {
                                echo "<div class='alert alert-danger margin-top-40' role='alert'>
                                   Access Denied.<br /><br />
                                      Your username or password maybe incorrect
                                        </div>";
                            }
                            ?>
                            <form method="post" role="login" class="login100-form validate-form">
                                <div class="form-group has-feedback">
                                    <input type="email" name="username" class="form-control" placeholder="Email"/>
                                    <span
                                            class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Password"/> <span
                                            class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">                                    <!-- /.col -->
                                    <div class="col-xs-8"><a href="#">I forgot my password</a></div>
                                    <div class="col-xs-4">
                                        <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Sign In
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- Main Footer -->

    <footer th:replace="common/header :: footer"></footer>
</div>
<div th:replace="common/header :: body-bottom-scripts"></div>
</body>
</html>