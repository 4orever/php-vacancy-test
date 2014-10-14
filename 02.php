<?php
/**
 * Найти недостатки в скрипте:
 */

$dest = $_POST['destination'];
$result = $_POST['data']['result'];
$output = "";

if ($dest == 'file') {
    $file = fopen('storage.txt', 'a+');
    fwrite($file, $result);
    $output = "stored in file";
} elseif ($dest == 'db') {
    $db = new PDO('mysql:dbname=testdb;host=127.0.0.1', 'user', 'pass');
    $db->exec("INSERT INTO storage (value) VALUES ('{$result}');");
    $output = "stored in db";
}

echo $output;