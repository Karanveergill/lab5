<?php
define("MAX_FILESIZE", 2000000);

$allowed = array('pdf', 'png', 'jpg');
$filename = $_FILES['coverImage']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if ($_FILES['coverImage']['size'] <= MAX_FILESIZE) {
    $coverImage    = 'uploads/' . md5(time() . $_FILES['coverImage']['name']);
    move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImage);
} else {
    echo "Invalid profile picture!";
    exit;
}
header('Location: index.php');
