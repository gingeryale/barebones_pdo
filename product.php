<?php
require 'db/db.php';
$productId = $_GET['id'] ?? null;

if(!$productId){
    header('Location: index.php');
    exit;
}

$sql = 'SELECT * FROM products WHERE p_id = :id';
$stmt = $pdo->prepare($sql);
$params = ['id'=>$productId];
$stmt->execute($params);
$product = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['p_name'];?></title>
</head>
<body>
    <h1><?= $product['p_name'];?></h1>
    <p><?= $product['p_text'];?></p>

    <a href="edit.php?id=<?= $product['p_id']; ?>">EDIT</a>
    <br/>
    <form action="delete.php" method="POST">
    <input type="hidden" name="_method" value="delete">
    <input type="hidden" name="id" value="<?= $product['p_id'] ?>">
    <button type="submit" name="submit">Delete</button>
    </form>
</body>
</html>