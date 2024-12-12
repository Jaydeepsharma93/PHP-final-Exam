<?php
require_once "../config.php";
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $data = ["description" => $_PUT['description'] ?? null];
    $conditions = ["id" => $_PUT['id'] ?? null];

    if (in_array(null, $data) || in_array(null, $conditions)) {
        echo json_encode(["err" => "All fields are required"]);
        exit;
    }

    if ($config->update("courses", $data, $conditions)) {
        echo json_encode(["status" => "Course updated successfully"]);
    } else {
        echo json_encode(["err" => "Failed to update course"]);
    }
} else {
    echo json_encode(["err" => "Only PUT method required"]);
}
?>
