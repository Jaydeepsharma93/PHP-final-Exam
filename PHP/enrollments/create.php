<?php
require_once "../config.php";
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        "student_id" => $_POST['student_id'] ?? null,
        "course_id" => $_POST['course_id'] ?? null,
        "enrollment_date" => $_POST['enrollment_date'] ?? null,
    ];

    if (in_array(null, $data)) {
        echo json_encode(["err" => "All fields are required"]);
        exit;
    }

    if ($config->create("enrollments", $data)) {
        echo json_encode(["status" => "Student enrollment successfully"]);
    } else {
        echo json_encode(["err" => "Failed to enroll student"]);
    }
} else {
    echo json_encode(["err" => "Only POST method required"]);
}
?>
