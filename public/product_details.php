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
      margin: 100px auto;
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
   <?php
   // Fetch category name
   $stmt = $pdo->prepare("SELECT Name FROM Categories WHERE category_id = :id");
   $stmt->execute(['id' => $product['category_id']]);
   $category = $stmt->fetch();

   // Fetch brand name
   $stmt = $pdo->prepare("SELECT Name FROM Brand WHERE brand_id = :id");
   $stmt->execute(['id' => $product['brand_id']]);
   $brand = $stmt->fetch();

   // Fetch frame material name
   $stmt = $pdo->prepare("SELECT Name FROM Frame_Material WHERE frame_material_id = :id");
   $stmt->execute(['id' => $product['frame_material_id']]);
   $frameMaterial = $stmt->fetch();
   ?>

   <p>Category: <?php echo htmlspecialchars($category['Name']); ?></p>
   <p>Brand: <?php echo htmlspecialchars($brand['Name']); ?></p>
   <p>Frame Material: <?php echo htmlspecialchars($frameMaterial['Name']); ?></p>
   <p>Stock: <?php echo htmlspecialchars($product['Stock_Quantity']); ?></p>
   <p>Launch Date: <?php echo htmlspecialchars($product['Launch_Date']); ?></p>
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
