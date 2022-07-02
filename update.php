<?php

$contents = json_decode(file_get_contents('./courses.json'), true);
$className = $_POST['class_Name'];

$contents[$className]['completed'] = isset($_POST['status']);
file_put_contents('./courses.json', json_encode($contents, JSON_PRETTY_PRINT));
header('Location: index.php');
