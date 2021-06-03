<!-- Input regional Indonesia -->

<?php
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
  <title>Input Regional Indonesia</title>
</head>

<body>
  <form action="" method="GET">
    <label for="province">Province: </label>
    <select name="province" id="province" onchange="getRegencies(province.value)">
      <?php

      $sql = "SELECT * FROM provinces";
      $result = mysqli_query($conn, $sql);
      ?>
      <option value="">Select province ... </option>
      <?php
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
      <?php
        }
      }


      ?>
    </select>
    <label for="regency">Regency: </label>
    <select name="regency" id="regency" onchange="">

      <option value="">Select regency ... </option>

    </select>
  </form>


  <script>
    function getRegencies(str) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

          var obj = JSON.parse(this.responseText);
          for (let i = 0; i < obj.regencies.length; i++) {
            // get reference to select element
            var sel = document.getElementById('regency');

            // create new option element
            var opt = document.createElement('option');

            // create text node to add to option element (opt)
            opt.appendChild(document.createTextNode(obj.regencies[i].name));

            // set value property of opt
            opt.value = obj.regencies[i].id;

            // add opt to end of select box (sel)
            sel.appendChild(opt);

          }
        }
      };
      xmlhttp.open("GET", "getRegencies.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
</body>

</html>