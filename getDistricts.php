<?php
require "functions.php";
$id = $_GET["q"];
$districts = query("SELECT id, name FROM districts WHERE regency_id=$id");

$districts = '{"districts":' . json_encode($districts) . '}';
echo $districts;
