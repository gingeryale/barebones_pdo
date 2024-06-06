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

// check for submit
$isPutRequest = $_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['_METHOD'] ?? '') === 'put';

if($isPutRequest){
    $serialno = htmlspecialchars($_POST['serialno'] ?? '');
    $name = htmlspecialchars($_POST['name'] ?? '');
    $texts = htmlspecialchars($_POST['texts'] ?? '');
    $stock = htmlspecialchars($_POST['stock'] ?? '');

    $sql = ''
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<form method="post">
    <input type="hidden" method="_method" value="put">
    <input type="hidden" name="id" value="<?= $product['p_id']; ?>">
  <ul>
    <li>
      <label for="name">Product Name:</label>
      <input type="text" id="name" name="name" value="<?= $product['p_name'];?>"/>
    </li>
    <li>
      <label for="serialno">Serial number:</label>
      <input type="text" id="serialno" name="serialno" value="<?= $product['p_serial'];?>"/>
    </li>
    <li>
      <label for="texts">Description:</label>
      <textarea id="texts" name="texts" value="<?= $product['p_text'];?>"></textarea>
    </li>
    <li>
      <label for="stock">In Stock:</label>
      <input type="checkbox" id="stock" name="stock" value="$product['p_inStock'];?>" />
    </li>
  </ul>
  <button type="submit" name="submit">Update</button>
</form>

</body>
</html>