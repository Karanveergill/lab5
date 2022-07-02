<?php

$contents = json_decode(file_get_contents('./courses.json'), true);

if (isset($_POST['class_Name'])) {
    $className = $_POST['class_Name'];
    $contents[$className] = ['completed' => false];
}

file_put_contents('./courses.json', json_encode($contents, JSON_PRETTY_PRINT));

header('Location: index.php');
