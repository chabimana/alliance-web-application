<?php
// display the table if the number of users retrieved was greater than zero
if ( $num > 0 ) {
    echo "<table id='leaders' class='table table-bordered table-hover'>";

    // table headers
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Title</th>";
    echo "<th>summary</th>";
    echo "<th>CreatedBy</th>";
    echo "</tr>";
    echo "</thead>";
    $count = 1;
    // loop through the user records
    while ( $row = $stmt -> fetch ( PDO::FETCH_ASSOC ) ) {
        extract ( $row );
        // display user details
        echo "<tbody>";
        echo "<tr>";
        echo "<td>$count</td>";
        echo "<td width='10%'>{$title}</td>";
        echo "<td width='70%'>{$content}</td>";
        echo "<td width='10%'>{$firstname}</td>";
        echo "</tr>";
        echo "</tbody>";
        $count = $count + 1;
    }
    echo "</table>";
    echo "<div class='row'></div>";

    $page_url   = "read_events.php?";
    $total_rows = $events -> countAll ();

} // tell the user there are no selfies
else {
    echo "<div class='alert alert-danger'>
        <strong>No events found.</strong>
    </div>";
}
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

<div class="col-md-12">
    <a href="<?php echo $home_url; ?>admin/event_registration.php" class="btn btn-primary"><span
            class="glyphicon glyphicon-plus">Add new Event</a>
</div>

