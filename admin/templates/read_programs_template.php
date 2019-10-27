<?php
// display the table if the number of users retrieved was greater than zero
if ( $num > 0 ) {
    echo "<table id='leaders' class='table table-bordered table-hover'>";

    // table headers
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Title</th>";
    echo "<th>Content</th>";
    echo "<th>Icon</th>";
    echo "<th>Actions</th>";
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
        echo "<td width='10%'></td>";
        echo "<td width='10%'><a href=''>Edit</a></td>";
        echo "</tr>";
        echo "</tbody>";
        $count = $count + 1;
    }
    echo "</table>";
    echo "<div class='row'></div>";

    $page_url   = "read_programs.php?";
    $total_rows = $program -> countAll ();

} // tell the user there are no selfies
else {
    echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
}
?>
<div class="col-md-12">
    <a href="<?php echo $home_url; ?>admin/program_registration" class="btn btn-primary"><span
            class="glyphicon glyphicon-plus">Add Program</a>
</div>

