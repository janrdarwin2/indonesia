<?php
require "functions.php";
$id = $_GET["q"];
$villages = query("SELECT id, name FROM villages WHERE district_id=$id");

$villages = '{"villages":' . json_encode($villages) . '}';
echo $villages;
