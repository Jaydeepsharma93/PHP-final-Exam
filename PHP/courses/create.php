<?php
require_once "../config.php";
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        "course_name" => $_POST['course_name'] ?? null,
        "description" => $_POST['description'] ?? null,
    ];

    if (in_array(null, $data)) {
        echo json_encode(["err" => "All fields are required"]);
        exit;
    }

    if ($config->create("courses", $data)) {
        echo json_encode(["status" => "Course added successfully"]);
    } else {
        echo json_encode(["err" => "Failed to add course"]);
    }
} else {
    echo json_encode(["err" => "Only POST method required"]);
}
?>
