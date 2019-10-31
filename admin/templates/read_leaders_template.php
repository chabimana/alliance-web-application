<?php
// display the table if the number of users retrieved was greater than zero
if ( $num > 0 ) {
?>
<table id="leaders" class="table table-bordered table-hover">
    <?php
    // table headers
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Picture</th>";
    echo "<th>Names</th>";
    echo "<th>Email</th>";
    echo "<th>Position</th>";
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
        echo "<td><img height='150' width='150' class='img-circle center' src='data:image/jpg;base64," . base64_encode ( $row[ 'image' ] ) . "'/></td>";
        echo "<td>{$names}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$position}</td>";
        echo "<td><a href='updateLeader.php?id=$id'>Edit</a></td>";
        echo "</tr>";
        echo "</tbody>";
        $count = $count + 1;
    }
    echo "</table>";
    echo "<div class='row'></div>";

    $page_url   = "read_leaders.php?";
    $total_rows = $leader -> countAll ();

    } // tell the user there are no selfies
    else {
        echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
    }
    ?>
    <div class="col-md-12">
        <a href="<?php echo $home_url; ?>admin/leader_registration.php" class="btn btn-primary"><span
                    class="glyphicon glyphicon-plus">Register Leader</a>
    </div>
