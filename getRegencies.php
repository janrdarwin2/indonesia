<?php
require "functions.php";
$id = $_GET["q"];
$regencies = query("SELECT id, name FROM regencies WHERE province_id=$id");

$regencies = '{"regencies":' . json_encode($regencies) . '}';
echo $regencies;
