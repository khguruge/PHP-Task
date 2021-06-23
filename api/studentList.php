<?php
include '../conf.php';
include '../functions.php';

$data = studentList();

if ($data)
  showResponse("SUCCESS", 200, $data , "Student list retried!");
else
  showResponse("ERROR", 400, null, "Student list failed.");

?>