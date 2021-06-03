<?php
if (!isset($_GET["regency"])) {
  header("Location: index.php");
  exit;
}
$id = $_GET["regency"];
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Districts</title>
</head>

<body>
  <h3>Province : <?= $id; ?></h3>
  <form action="villages.php" method="GET">
    <label for="district">District: </label>
    <select name="district" id="district">
      <option value="">Select district ... </option>
      <?php
      $sql = "SELECT * FROM districts WHERE regency_id=$id";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
      <?php
        }
      }
      $conn->close();
      ?>
    </select>
    <button type="submit">Submit</button>
  </form>


</body>

</html>