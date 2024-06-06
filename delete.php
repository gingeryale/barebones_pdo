<?php
require 'db/db.php';

$deleteRequest = $_SERVER['REQUEST_METHOD']=='POST' && ($_POST['_method'] ?? '' === 'delete');

if($deleteRequest){
    $id = $_POST['id'];

    $sql = 'DELETE FROM products WHERE p_id = :id';

    $stmt = $pdo->prepare($sql);

    $params = ['id'=> $id];

    $stmt->execute($params);

    header('Location: index.php');
    exit;
}