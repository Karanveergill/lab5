<?php

$className = $_POST['className'];

$contents = json_decode(file_get_contents('./courses.json'), true);
unset($contents[$className]);

file_put_contents('./courses.json', json_encode($contents, JSON_PRETTY_PRINT));
header('Location: index.php');
