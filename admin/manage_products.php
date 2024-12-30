<?php 
// include '../includes/header.php';
include '../includes/db.php';
include('../includes/home-button.php');

// Handle form submission for adding a new product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['edit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $launch_date = $_POST['launch_date'];
    $stock_quantity = $_POST['stock_quantity'];
    $category_id = $_POST['category_id'];
    $frame_material_id = $_POST['frame_material_id'];
    $brand_id = $_POST['brand_id'];

    $stmt = $pdo->prepare("INSERT INTO Product (Name, Status, Price, Launch_Date, Stock_Quantity, category_id, frame_material_id, brand_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $status, $price, $launch_date, $stock_quantity, $category_id, $frame_material_id, $brand_id]);

    header("Location: manage_products.php");
    exit();
}

// Handle product deletion
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM Product WHERE product_id = ?");
    $stmt->execute([$product_id]);

    header("Location: manage_products.php");
    exit();
}

// Handle product editing
if (isset($_POST['edit'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $launch_date = $_POST['launch_date'];
    $stock_quantity = $_POST['stock_quantity'];
    $category_id = $_POST['category_id'];
    $frame_material_id = $_POST['frame_material_id'];
    $brand_id = $_POST['brand_id'];

    $stmt = $pdo->prepare("UPDATE Product SET Name = ?, Status = ?, Price = ?, Launch_Date = ?, Stock_Quantity = ?, category_id = ?, frame_material_id = ?, brand_id = ? WHERE product_id = ?");
    $stmt->execute([$name, $status, $price, $launch_date, $stock_quantity, $category_id, $frame_material_id, $brand_id, $product_id]);

    header("Location: manage_products.php");
    exit();
}

// Fetch products for display
$stmt = $pdo->query("SELECT * FROM Product");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        header .highlight, header .current a {
            color: #77aaff;
            font-weight: bold;
        }
        header a:hover {
            color: #cccccc;
            font-weight: bold;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container input[type="text"], .form-container input[type="number"], .form-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        .form-container button, .form-container input[type="submit"] {
            background: #77aaff;
            color: #fff;
            border: 0;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-container button:hover, .form-container input[type="submit"]:hover {
            background: #45a089;
        }
        .product {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product h2 {
            margin: 0;
        }
        .product p {
            margin: 10px 0;
        }
        .product a {
            color: #e8491d;
            text-decoration: none;
        }
        .product a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Eyewear Management System</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="manage_lens_types.php">Lens Types</a></li>
                    <li><a href="manage_brands.php">Brands</a></li>
                    <li><a href="manage_categories.php">Categories</a></li>
                    <li class="current"><a href="manage_products.php">Products</a></li>
                    <li><a href="manage_frame_materials.php">Frame Materials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1>Manage Products</h1>

        <!-- Form to add new product -->
        <div class="form-container">
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Product Name" required />
                <input type="text" name="status" placeholder="Status" required />
                <input type="number" step="0.01" name="price" placeholder="Price" required />
                <input type="date" name="launch_date" placeholder="Launch Date" required />
                <input type="number" name="stock_quantity" placeholder="Stock Quantity" required />
                <input type="number" name="category_id" placeholder="Category ID" required />
                <input type="number" name="frame_material_id" placeholder="Frame Material ID" required />
                <input type="number" name="brand_id" placeholder="Brand ID" required />
                <input type="submit" value="Add Product" />
            </form>
        </div>

        <!-- Display existing products -->
        <?php foreach ($products as $product): ?>
            <div class='product'>
                <h2><?php echo htmlspecialchars($product['Name']); ?></h2>
                <p>Status: <?php echo htmlspecialchars($product['Status']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($product['Price']); ?></p>
                <p>Launch Date: <?php echo htmlspecialchars($product['Launch_Date']); ?></p>
                <p>Stock Quantity: <?php echo htmlspecialchars($product['Stock_Quantity']); ?></p>
                <p>Category ID: <?php echo htmlspecialchars($product['category_id']); ?></p>
                <p>Frame Material ID: <?php echo htmlspecialchars($product['frame_material_id']); ?></p>
                <p>Brand ID: <?php echo htmlspecialchars($product['brand_id']); ?></p>
                <a href="?delete=<?php echo $product['product_id']; ?>">Delete</a>
                <form action="#" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
                    <input type="text" name="name" value="<?php echo htmlspecialchars($product['Name']); ?>" required />
                    <input type="text" name="status" value="<?php echo htmlspecialchars($product['Status']); ?>" required />
                    <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['Price']); ?>" required />
                    <input type="date" name="launch_date" value="<?php echo htmlspecialchars($product['Launch_Date']); ?>" required />
                    <input type="number" name="stock_quantity" value="<?php echo htmlspecialchars($product['Stock_Quantity']); ?>" required />
                    <input type="number" name="category_id" value="<?php echo htmlspecialchars($product['category_id']); ?>" required />
                    <input type="number" name="frame_material_id" value="<?php echo htmlspecialchars($product['frame_material_id']); ?>" required />
                    <input type="number" name="brand_id" value="<?php echo htmlspecialchars($product['brand_id']); ?>" required />
                    <input type="submit" name="edit" value="Edit" />
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php include '../includes/footer.php'; ?>
