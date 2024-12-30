<?php 
include '../includes/header.php'; 
include '../includes/db.php';
include('../includes/home-button.php');

$productId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM Product WHERE product_id = :id");
$stmt->execute(['id' => $productId]);
$product = $stmt->fetch();

if ($product):
?>
<style>
   main {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #ffecd2 0%, #77aaff 100%);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }
   h1 {
      font-size: 2em;
      margin-bottom: 10px;
      color: #333;
   }
   p {
      font-size: 1.2em;
      margin: 5px 0;
      color: #555;
   }
</style>
<main>
   <h1><?php echo htmlspecialchars($product['Name']); ?></h1>
   <p>Price: $<?php echo htmlspecialchars($product['Price']); ?></p>
   <p>Status: <?php echo htmlspecialchars($product['Status']); ?></p>
   <!-- Add more product details as needed -->
</main>
<?php else: ?>
<style>
   main {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }
   h1 {
      font-size: 2em;
      margin-bottom: 10px;
      color: #333;
   }
</style>
<main><h1>Product not found.</h1></main>
<?php endif; ?>
<?php include '../includes/footer.php'; ?>
