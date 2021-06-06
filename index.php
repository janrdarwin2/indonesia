<!-- Input regional Indonesia -->

<?php
require "functions.php";
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
    <ul>
      <li>
        <label for="province">Province: </label>
        <select name="province" id="province" onchange="getRegencies(province.value)">
          <option value="">Select province ... </option>
          <?php
          $provinces = query("SELECT * FROM provinces");
          foreach ($provinces as $p) :
          ?>
            <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </li>
      <li>
        <label for="regency">Regency: </label>
        <select name="regency" id="regency" onchange="getDistricts(regency.value)">
          <option value="">Select regency ... </option>
        </select>
      </li>
      <li>
        <label for="district">District: </label>
        <select name="district" id="district" onchange="getVillages(district.value)">
          <option value="">Select district ... </option>
        </select>
      </li>
      <li>
        <label for="villages">Villages: </label>
        <select name="village" id="village">
          <option value="">Select village ... </option>
        </select>
      </li>
    </ul>
    <button type="reset">Reset</button>
    <button type="submit">Submit</button>
  </form>


  <script>
    function getRegencies(str) {
      var sel = document.getElementById('regency');

      if (typeof sel.options[1] === "undefined") {

      } else {

        var id = sel.options[1].value;
        var pre = parseInt(id.substring(0, 2));
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            for (let i = 0; i < obj.regencies.length; i++) {
              // get reference to select element
              var sel = document.getElementById('regency');

              // create new option element
              var opt = document.createElement('option');

              // remove 2nd option in select box (sel)
              sel.removeChild(sel.options[1]);

            }
          }
        };
        xmlhttp.open("GET", "getRegencies.php?q=" + pre, true);
        xmlhttp.send();
      }
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

            // remove 2nd option in select box (sel)
            // sel.removeChild(sel.options[1]);

          }
        }
      };
      xmlhttp.open("GET", "getRegencies.php?q=" + str, true);
      xmlhttp.send();
    }

    function getDistricts(str) {
      var sel = document.getElementById('district');

      if (typeof sel.options[1] === "undefined") {

      } else {

        var id = sel.options[1].value;

        var pre = parseInt(id.substring(0, 4));
        console.log(pre);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            for (let i = 0; i < obj.districts.length; i++) {
              // get reference to select element
              var sel = document.getElementById('district');

              // create new option element
              var opt = document.createElement('option');

              // remove 2nd option in select box (sel)
              sel.removeChild(sel.options[1]);

            }
          }
        };
        xmlhttp.open("GET", "getDistricts.php?q=" + pre, true);
        xmlhttp.send();
      }

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
          var obj = JSON.parse(this.responseText);
          for (let i = 0; i < obj.districts.length; i++) {
            var sel = document.getElementById('district');
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(obj.districts[i].name));
            opt.value = obj.districts[i].id;
            sel.appendChild(opt);
          }
        }
      };
      xmlhttp.open("GET", "getDistricts.php?q=" + str, true);
      xmlhttp.send();
    }

    function getVillages(str) {
      var sel = document.getElementById('village');

      if (typeof sel.options[1] === "undefined") {

      } else {

        var id = sel.options[1].value;

        var pre = parseInt(id.substring(0, 7));
        console.log(pre);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            for (let i = 0; i < obj.villages.length; i++) {
              // get reference to select element
              var sel = document.getElementById('village');

              // create new option element
              var opt = document.createElement('option');

              // remove 2nd option in select box (sel)
              sel.removeChild(sel.options[1]);

            }
          }
        };
        xmlhttp.open("GET", "getvillages.php?q=" + pre, true);
        xmlhttp.send();
      }

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
          var obj = JSON.parse(this.responseText);
          for (let i = 0; i < obj.villages.length; i++) {
            var sel = document.getElementById('village');
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(obj.villages[i].name));
            opt.value = obj.villages[i].id;
            sel.appendChild(opt);
          }
        }
      };
      xmlhttp.open("GET", "getVillages.php?q=" + str, true);
      xmlhttp.send();
    }
  </script>
</body>

</html>