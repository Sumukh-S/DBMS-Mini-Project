<?php 
include '../includes/header.php'; 
include '../includes/db.php';
include('../includes/home-button.php');
include '../includes/footer.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffecd2 0%, #77aaff 100%);
            margin: 0;
            padding: 100px 0 0 0;
        }
    main {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        width: 200px;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .card h2 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .card a {
        display: block;
        padding: 10px;
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    .card a:hover {
        text-decoration: underline;
    }
    .card img {
        width: 100%;
        height: 150px;
        object-fit: contain;
        display: block;
    }
</style>

</head>
<body>
    <main>
        <div class="card">
            <img src="../public/images/manage_product.png" alt="Manage Products">
            <h2>Manage Products</h2>
            <a href="manage_products.php">Go to Products</a>
        </div>
        <div class="card">
            <img src="../public/images/manage_category.png" alt="Manage Categories">
            <h2>Manage Categories</h2>
            <a href="manage_categories.php">Go to Categories</a>
        </div>
        <div class="card">
            <img src="../public/images/manage_brands.png" alt="Manage Brands">
            <h2>Manage Brands</h2>
            <a href="manage_brands.php">Go to Brands</a>
        </div>
        <div class="card">
            <img src="../public/images/manage_materials.png" alt="Manage Frame Materials">
            <h2>Manage Frame Materials</h2>
            <a href="manage_frame_materials.php">Go to Frame Materials</a>
        </div>
        <div class="card">
        <img src="../public/images/manage_lens.png" alt="Manage Lens Types">
        <h2>Manage Lens Types</h2>
        <a href="manage_lens_types.php">Go to Lens Types</a>
    </div>
</main>
</body>
</html>