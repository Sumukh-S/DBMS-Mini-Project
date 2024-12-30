<?php
include('../public/sql/config.php');
include('../includes/home-button.php');

// Add Brand
if (isset($_POST['add_brand'])) {
    $name = $_POST['Name'];
    $origin = $_POST['Origin'];
    $rep_rating = $_POST['Rep_Rating'];
    $warranty_period = $_POST['Warranty_period'];
    $query = "INSERT INTO Brand (Name, Origin, Rep_Rating, Warranty_period) VALUES ('$name', '$origin', '$rep_rating', '$warranty_period')";
    mysqli_query($conn, $query);
}

// Remove Brand
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $query = "DELETE FROM Brand WHERE brand_id = $id";
    mysqli_query($conn, $query);
}

// Edit Brand
if (isset($_POST['edit_brand'])) {
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $origin = $_POST['Origin'];
    $rep_rating = $_POST['Rep_Rating'];
    $warranty_period = $_POST['Warranty_period'];
    $query = "UPDATE Brand SET Name = '$name', Origin = '$origin', Rep_Rating = '$rep_rating', Warranty_period = '$warranty_period' WHERE brand_id = $id";
    mysqli_query($conn, $query);
}

// Fetch Brands
$query = "SELECT * FROM Brand";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        .form-container input[type="text"], .form-container input[type="number"], .form-container input[type="decimal"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        .form-container button {
            background: #77aaff;
            color: #fff;
            border: 0;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-container button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #ddd;
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
                    <li class="current"><a href="manage_brands.php">Brands</a></li>
                    <li><a href="manage_categories.php">Categories</a></li>
                    <li><a href="manage_frame_materials.php">Frame Materials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1>Manage Brands</h1>

        <div class="form-container">
            <form method="POST" action="">
                <input type="text" name="Name" placeholder="Brand Name" required>
                <input type="text" name="Origin" placeholder="Origin">
                <input type="number" step="0.01" name="Rep_Rating" placeholder="Reputation Rating">
                <input type="number" name="Warranty_period" placeholder="Warranty Period (months)">
                <button type="submit" name="add_brand">Add Brand</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Origin</th>
                    <th>Reputation Rating</th>
                    <th>Warranty Period</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['brand_id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Origin']; ?></td>
                        <td><?php echo $row['Rep_Rating']; ?></td>
                        <td><?php echo $row['Warranty_period']; ?></td>
                        <td>
                            <a href="?remove=<?php echo $row['brand_id']; ?>" style="text-decoration: none; color: #e8491d;">Remove</a>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['brand_id']; ?>">
                                <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>
                                <input type="text" name="Origin" value="<?php echo $row['Origin']; ?>">
                                <input type="number" step="0.01" name="Rep_Rating" value="<?php echo $row['Rep_Rating']; ?>">
                                <input type="number" name="Warranty_period" value="<?php echo $row['Warranty_period']; ?>">
                                <button type="submit" name="edit_brand">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
