<?php
require_once "../config.php";
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        "name" => $_POST['name'] ?? null,
        "email" => $_POST['email'] ?? null,
        "phone" => $_POST['phone'] ?? null,
    ];

    if (in_array(null, $data)) {
        echo json_encode(["err" => "All fields are required"]);
        exit;
    }

    if ($config->create("students", $data)) {
        echo json_encode(["status" => "Student added successfully"]);
    } else {
        echo json_encode(["err" => "Failed to add student"]);
    }
} else {
    echo json_encode(["err" => "Only POST method required"]);
}
?>
