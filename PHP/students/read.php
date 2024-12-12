<?php
require_once "../config.php";
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $students = $config->read("students");
    echo json_encode($students);
} else {
    echo json_encode(["err" => "Only GET method required"]);
}
?>
