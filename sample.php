<?php
// PHP code to fetch usernames from the database and return as JSON

 include_once 'dbConfig.php';

// Query to fetch usernames from the users table
$sql = "SELECT username FROM owneraccounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store usernames in an array
    $usernames = array();
    while($row = $result->fetch_assoc()) {
        $usernames[] = $row["username"];
    }

    // Return usernames as JSON
    header('Content-Type: application/json');
    echo json_encode(array("usernames" => $usernames));
} else {
    echo "0 results";
}
$conn->close();
?>
