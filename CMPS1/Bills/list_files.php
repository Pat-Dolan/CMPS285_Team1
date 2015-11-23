
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
        echo '     <link href="css/bills.css" rel="stylesheet">
            <table>
              <caption>Bills</caption>
                <tr>
                    <th><div><h4>Name</h4></div></th>
                    <th><div><h4>Added</h4></div></th>
                    <th><div><h4>Status</h4></div></th>
                    <th><div><h4>&nbsp;</h4></div></th>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "

                <tr>
                    <td><div>{$row['name']}</div></td>
                    <td><div>{$row['added']}</div></td>
                    <td><div>{$row['status']}</div></td>
                    <td><div><a  href='/CMPS1/Bills/get_file.php?id={$row['id']}'><input type='button' value='Download'/></a></div></td>
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