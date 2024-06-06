<?php
require 'db/db.php';

// echo $_SERVER['REQUEST_URI'];


// PREPARE
$stmt = $pdo->prepare('SELECT * FROM products');
// Exceute
$stmt->execute();
// Fetch
$results = $stmt->fetchAll();

//var_dump($results);
echo '<ul>';
foreach($results as $row){?>
<li>
<a href="product.php?id=<?= $row['p_id']?>">
    <?= $row['p_name']?>
</a>
</li>
<br />
<?php } 
echo '</ul>';
?>
<a href="./create.php">Add New Product</a>