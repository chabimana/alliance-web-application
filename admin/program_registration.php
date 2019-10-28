<?php
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Program Registration";

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

// if form was posted
if ( $_POST ) {

    // initialize objects
    $program = new Program( $db );

    $utils = new Utils();

    // set values to object properties
    $program -> title   = $_POST[ 'title' ];
    $program -> content = $_POST[ 'content' ];
    $program -> iconsid = $_POST[ 'iconId' ];

    if ( $program -> createProgram () ) {
        echo "<div class='alert alert-success'>Program created successful.</div>.Click " ?> <a
            href="<?php echo $home_url; ?>preview.php" class="btn btn-primary">Here To Preview The
            Program On The Homepage</a><?php ;
    } else {
        echo "<div class='alert alert-danger'>Unable to create program.</div>";
    }
}
?>

    <form action='program_registration.php' method='post' id='register'>
        <table class='table table-responsive'>
            <tr>
                <td class='width-30-percent'>Program Title</td>
                <td><input type='text' name='title' class='form-control' required
                           value="<?php echo isset( $_POST[ 'title' ] ) ? htmlspecialchars ( $_POST[ 'title' ] , ENT_QUOTES ) : ""; ?>"/>
                </td>
            </tr>

            <tr>
                <td>Program Content</td>
                <td><textarea rows='15' name='content' class='form-control'
                              required><?php echo isset( $_POST[ 'content' ] ) ? htmlspecialchars ( $_POST[ 'content' ] , ENT_QUOTES ) : ""; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Icon Name Selection</td>
                <td><?php
                    $stmt = $icon -> readAll ();
                    echo "<select class='form-control' name='iconId'>";
                    echo "<option>Select icon name...</option>";
                    while ( $row_icon = $stmt -> fetch ( PDO::FETCH_ASSOC ) ) {
                        extract ( $row_icon );
                        echo "<option value='{$id}'>{$icon_desc}</option>";
                    }
                    ?>
                    <?php echo isset( $_POST[ 'iconId' ] ) ? htmlspecialchars ( $_POST[ 'iconId' ] , ENT_QUOTES ) : ""; ?>
                    <?php
                    echo "</select>";
                    ?></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Add A New Program
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