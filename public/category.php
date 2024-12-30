<?php 
include '../includes/header.php'; 
include '../includes/db.php';
include('../includes/home-button.php');

$categoryId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM Product WHERE category_id = :id");
$stmt->execute(['id' => $categoryId]);
$products = $stmt->fetchAll();

?>
<main>
   <h1>Products in Category ID: <?php echo htmlspecialchars($categoryId); ?></h1>

   <?php foreach ($products as $product): ?>
       <div class='product'>
           <h2><?php echo htmlspecialchars($product['Name']); ?></h2>
           <p>Price: $<?php echo htmlspecialchars($product['Price']); ?></p>
           <a href='product_details.php?id=<?php echo htmlspecialchars($product['product_id']); ?>'>View Details</a>
       </div>
   <?php endforeach; ?>
</main>

<?php include '../includes/footer.php'; ?>
