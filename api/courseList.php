<?php
include '../conf.php';
include '../functions.php';

$data = courseList();

if ($data)
  showResponse("SUCCESS", 200, $data , "Course list retried!");
else
  showResponse("ERROR", 400, null, "Course list failed.");

?>