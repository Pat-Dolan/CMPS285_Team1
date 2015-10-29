
<?php
// Connect to the database
$dbLink = new mysqli('localhost', 'code', 'code5', 'code5');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}

// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `added`,`status` FROM `bills`';
$result = $dbLink->query($sql);

// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table class="center" style="width:65%">
              <caption>Bills</caption>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Added</b></th>
                    <th><b>Status</b></th>
                    <th><b>&nbsp;</b></th>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['added']}</td>
                    <td>{$row['status']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
        echo '</table>';
    }

    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}

// Close the mysql connection
$dbLink->close();
?>