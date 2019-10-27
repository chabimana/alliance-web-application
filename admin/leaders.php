<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../model/Leader.php';

// get database connection
$database = new Database();
$db       = $database -> getConnection ();

// initialize objects
$leader = new Leader( $db );

// set page title
$page_title = "Leaders";

// include page header HTML
include_once "header.php";

echo "<div class='col-md-12'>";

// read all users from the database
$stmt = $leader -> readAll ( $from_record_num , $records_per_page );

// count retrieved users
$num = $stmt -> rowCount ();

// to identify page for paging
$page_url = "read_leaders.php?";

// include products table HTML template
include_once "templates/read_leaders_template.php";

echo "</div>";

// include page footer HTML
include_once "footer.php";
?>
<script>
    $(function () {
        $('#leaders').DataTable({
            "processing": true,
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'pageLength': 2,
        })
    })
</script>
