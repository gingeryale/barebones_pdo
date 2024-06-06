<?php

$host = 'localhost';
$port = 3306;
$dbname = 'tutorial';
$username = 'root';
$password = '';
// data source name
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

try{
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo 'Databse conection Successful';
}catch(PDOException $e){
    echo 'Connection Failed with code' . $e->getMessage();
}
