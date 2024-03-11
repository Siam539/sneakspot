<?php
define('DB_USER', "root");
define('DB_PASSWORD', "Super");
//DB connection...
try {

    $pdo = new PDO("mysql:host=localhost;dbname=SneakerWeb", DB_USER, DB_PASSWORD);
} catch (Exception $e) {
    var_dump($e);
    die();
}
