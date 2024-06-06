<?php
require 'db/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $serialno = htmlspecialchars($_POST['serialno']);
    $name = htmlspecialchars($_POST['name']);
    $texts = htmlspecialchars($_POST['texts']);
    $stock = htmlspecialchars($_POST['stock']);

$sql = 'INSERT INTO products (p_serial,p_name,p_text,p_inStock) VALUES (:serialno,:name,:texts, :stock)';

$stmt = $pdo->prepare($sql);

$params = [
    'serialno'=> $serialno,
    'name'=> $name,
    'texts'=> $texts,
    'stock'=> $stock
];

$stmt->execute($params);

header('Location: index.php');
exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
<form method="post">
  <ul>
    <li>
      <label for="name">Product Name:</label>
      <input type="text" id="name" name="name" />
    </li>
    <li>
      <label for="serialno">Serial number:</label>
      <input type="text" id="serialno" name="serialno" />
    </li>
    <li>
      <label for="texts">Description:</label>
      <textarea id="texts" name="texts"></textarea>
    </li>
    <li>
      <label for="stock">In Stock:</label>
      <input type="checkbox" id="stock" name="stock" value="1" />
    </li>
  </ul>
  <button type="submit" name="submit">Add</button>
</form>

</body>
</html>