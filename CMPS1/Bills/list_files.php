
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
        echo '<link rel="stylesheet" href="/CMPS1/css/bills.css">


            <div class="center" style="width:65%">
              <caption>Bills</caption>
                <ul>
                    <li><b>Name</b></li>
                    <li><b>Added</b></li>
                    <li><b>Status</b></li>
                    <li><b>&nbsp;</b></li>
                </ul>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <ul>
                    <li>{$row['name']}</li>
                    <li>{$row['added']}</li>
                    <li>{$row['status']}</li>
                    <li><input type='button' value='download'  onclick='../CMPS1/Bills/get_file.php?id={$row['id']}'></li>
                </ul>";
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