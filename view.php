<?php

require_once 'sections/header.php';

$backup = $_GET['backup'];
// $backup = fopen('storage/'.$backup, 'r');
// $backup = file_get_contents('storage/eway-backup-2019-10-30T15:23:31.json');
$backup = file_get_contents('storage/'.$backup);

if ('storage/'.$backup != 'storage/eway-backup-2019-10-30T15:23:31.json'){
    echo '<p>Clean: storage/eway-backup-2019-10-30T15:23:31.json</p>';
    echo '<p>Dirty: storage/'.$backup.'</p>';
}

if (!$backup){
    die('yeeet'. $_GET['backup']);
    // header('Location: ' . $_SERVER['HTTP_HOST']);
}
print_r($backup);
?>
