<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "login_checker.php";

// include classes
include_once '../config/database.php';
include_once '../model/Events.php';

// get database connection
$database = new Database();
$db       = $database -> getConnection ();

// initialize objects
$events = new Events( $db );

// set page title
$page_title = "events";

// include page header HTML
include_once "header.php";

echo "<div class='col-md-12'>";

// read all users from the database
$stmt = $events -> readAll ();
echo $events->title;

// count retrieved users
$num = $stmt -> rowCount ();

// to identify page for paging
$page_url = "read_events.php?";

// include products table HTML template
include_once "templates/read_events_template.php";

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
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'pageLength': 2,
        })
    })
</script>
