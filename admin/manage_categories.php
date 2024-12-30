<?php
include('../public/sql/config.php');
include('../includes/home-button.php');

// Add Category with Name
if (isset($_POST['add_category'])) {
    $created_date = $_POST['Created_Date'];
    $name = $_POST['Name'];
    $query = "INSERT INTO Categories (Created_Date, Name) VALUES ('$created_date', '$name')";
    mysqli_query($conn, $query);
}

// Remove Category
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $query = "DELETE FROM Categories WHERE category_id = $id";
    mysqli_query($conn, $query);
}

// Edit Category with Name
if (isset($_POST['edit_category'])) {
    $id = $_POST['id'];
    $created_date = $_POST['Created_Date'];
    $name = $_POST['Name'];
    $query = "UPDATE Categories SET Created_Date = '$created_date', Name = '$name' WHERE category_id = $id";
    mysqli_query($conn, $query);
}

// Fetch Categories
$query = "SELECT * FROM Categories";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
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
        .form-container input[type="date"], .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        .form-container button {
            background: #333;
            color: #fff;
            border: 0;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-container button:hover {
            background: #555;
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
                    <li><a href="manage_brands.php">Brands</a></li>
                    <li class="current"><a href="manage_categories.php">Categories</a></li>
                    <li><a href="manage_frame_materials.php">Frame Materials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1>Manage Categories</h1>

        <div class="form-container">
            <form method="POST" action="">
                <input type="date" name="Created_Date" placeholder="Created Date" required>
                <input type="text" name="Name" placeholder="Category Name" required>
                <button type="submit" name="add_category">Add Category</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created Date</th>
                    <th>Name</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['Created_Date']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Last_Updated']; ?></td>
                        <td>
                            <a href="?remove=<?php echo $row['category_id']; ?>" style="text-decoration: none; color: #e8491d;">Remove</a>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $row['category_id']; ?>">
                                <input type="date" name="Created_Date" value="<?php echo $row['Created_Date']; ?>" required>
                                <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>
                                <button type="submit" name="edit_category">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
