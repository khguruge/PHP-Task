<?php
include '../conf.php';
include '../functions.php';

$data = $_GET['id'];


$data = studentCourseList($data);

if ($data)
  showResponse("SUCCESS", 200, $data , "Course list retried!");
else
  showResponse("ERROR", 400, null, "Course list failed.");

?>