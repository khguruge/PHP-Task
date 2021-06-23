<?php
include '../conf.php';
include '../functions.php';

$data = json_decode(file_get_contents('php://input'), true);

$done = courseEnroll($data['studentId'], $data['courseId']);

if ($done)
  showResponse("SUCCESS", 200, null, "Course enrolled success!");
else
  showResponse("ERROR", 400, null, "Course enrolled failed.");

?>