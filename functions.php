<?php 
include '../conf.php';

function showResponse($status, $code, $data, $msg){
    header("Content-Type: application/json");
    $out['status'] = $status;
    $out['statusCode'] = $code;
    $out['msg'] = $msg;
    $out['Data'] = $data;
    echo json_encode($out);
}

function registerStudent($id, $name, $email, $password, $status){
    global $conn;

    $sql = "INSERT INTO `students` (`id`,`name`,`email`,`password`,`status`)
    VALUES (?,?,?,?,?);";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("sssss", $id, $name, $email, $password, $status);
        $stmt->execute();
        if ($conn->error != null) {
            return false;
        }
        return true;
    } else {
        echo "ERROR" . $conn->error;
        return false;
    }
}


function courseEnroll($studentId, $courseId){
    global $conn;

    $sql = "INSERT INTO `student_course` (`student_id`,`course_id`)
    VALUES (?,?);";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("ss", $studentId, $courseId);
        $stmt->execute();
        if ($conn->error != null) {
            return false;
        }
        return true;
    } else {
        echo "ERROR" . $conn->error;
        return false;
    }
}

function courseList()
{
    global $conn;

    $sql = "SELECT * FROM `courses` ORDER BY ID DESC;";
    $out = [];

    if ($stmt = $conn->prepare($sql)) {
        $result = $stmt->execute();

        $result = $stmt->get_result();


        while ($row = $result->fetch_assoc()) {

            $out[] = $row;
        }
    }

    return $out;
}

function studentList()
{
    global $conn;

    $sql = "SELECT * FROM `students` ORDER BY ID DESC;";
    $out = [];

    if ($stmt = $conn->prepare($sql)) {
        $result = $stmt->execute();

        $result = $stmt->get_result();


        while ($row = $result->fetch_assoc()) {

            $out[] = $row;
        }
    }

    return $out;
}

function studentCourseList($id)
{
    global $conn;

    $sql = "SELECT courses.* FROM students JOIN student_course ON
            students.id = student_course.student_id JOIN courses ON
            courses.id = student_course.course_id
            WHERE students.id = $id;";

    $out = [];

    if ($stmt = $conn->prepare($sql)) {
        $result = $stmt->execute();

        $result = $stmt->get_result();


        while ($row = $result->fetch_assoc()) {

            $out[] = $row;
        }
    }

    return $out;
}

