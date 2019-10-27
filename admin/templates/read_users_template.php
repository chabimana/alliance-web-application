<?php
// display the table if the number of users retrieved was greater than zero
if ( $num > 0 ) {
    echo "<table id='leaders' class='table table-bordered table-hover'>";
    // table headers
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th>";
    echo "<th>Email</th>";
    echo "<th>Contact Number</th>";
    echo "<th>Access Level</th>";
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
        echo "<td>{$firstname}</td>";
        echo "<td>{$lastname}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$contact_number}</td>";
        echo "<td>{$access_level}</td>";
        echo "<td><a href=''>Edit</a></td>";
        echo "</tr>";
        echo "</tbody>";
        $count = $count + 1;
    }
    echo "</table>";

    $page_url   = "read_users.php?";
    $total_rows = $user -> countAll ();

} // tell the user there are no selfies
else {
    echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
}
?>
<div class="col-md-12">
    <a href="<?php echo $home_url; ?>admin/user_registration.php" class="btn btn-primary"><span
                class="glyphicon glyphicon-plus">Register User</a>
</div>

