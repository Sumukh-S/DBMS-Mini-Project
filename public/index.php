<?php include '../includes/header.php'; ?>
<main>
   <h1>Welcome to Our Eyewear Store</h1>
   <p>Check out our latest products!</p>

   <!-- Fetch and display products from database -->
   <?php 
   include '../includes/db.php';
   
   $stmt = $pdo->query("SELECT * FROM Product LIMIT 10");
   
   while ($row = $stmt->fetch()) {
       echo "<div class='product'>";
       echo "<h2>" . htmlspecialchars($row['Name']) . "</h2>";
       echo "<p>Price: $" . htmlspecialchars($row['Price']) . "</p>";
       echo "<a href='product_details.php?id=" . htmlspecialchars($row['product_id']) . "'>View Details</a>";
       echo "</div>";
   }
   ?>
</main>
<?php include '../includes/footer.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #ffecd2 0%, #77aaff 100%);
        color: #333;
        margin: 0;
        padding: 100px 0 0 0;
    }

    main {
        padding: 20px;
        text-align: center;
    }

    h1 {
        font-size: 2.5em;
        margin-bottom: 20px;
        animation: fadeIn 2s ease-in-out;
    }

    p {
        font-size: 1.2em;
        margin-bottom: 40px;
        animation: fadeIn 2s ease-in-out;
    }

    .product {
        display: inline-block;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        width: 200px;
        transition: transform 0.3s;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .product h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .product p {
        font-size: 1.2em;
        color: #555;
    }

    .product a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background: #fcb69f;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .product a:hover {
        background: #ffecd2;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>