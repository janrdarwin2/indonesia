<?php
$id = $_GET["q"];
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "indonesia";

// Create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM districts WHERE regency_id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo '{"districts":[';
  $i = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $name = $row["name"];

    echo '{"id":"' . $id . '", "name":"' . $name . '"}';
    $i++;

    if ($i < mysqli_num_rows($result)) {
      echo ",";
    }
  }
  echo ']}';
}
$conn->close();
