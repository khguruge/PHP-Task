<?php
include '../conf.php';
include '../functions.php';

$data = json_decode(file_get_contents('php://input'), true);

$done = registerStudent($data['id'], $data['name'], $data['email'], $data['password'], $data['status']);

if ($done)
  showResponse("SUCCESS", 200, null, "Student has registered successfully!");
else
  showResponse("ERROR", 400, null, "Student registration failed.");

?>