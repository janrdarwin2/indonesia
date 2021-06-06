<?php
function connection()
{
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "indonesia";

  // Create connection
  return mysqli_connect($serverName, $userName, $password, $dbName);
}

function query($query)
{
  $conn = connection();
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  };
  return $rows;
}
