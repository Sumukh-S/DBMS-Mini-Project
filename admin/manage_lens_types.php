<?php
include('../public/sql/config.php');
include('../includes/home-button.php');

// Add Lens Type
if (isset($_POST['add_lens_type'])) {
    $name = $_POST['Name'];
    $thickness = $_POST['Thickness'];
    $scratch_resistant = isset($_POST['scratch_resistant']) ? 1 : 0;
    $is_anti_reflective = isset($_POST['is_anti_reflective']) ? 1 : 0;
    $is_UV = isset($_POST['is_UV']) ? 1 : 0;
    $color = $_POST['L_Color'];
    $query = "INSERT INTO Lens_Type (Name, Thickness, scratch_resistant, is_anti_reflective, is_UV, L_Color) VALUES ('$name', '$thickness', '$scratch_resistant', '$is_anti_reflective', '$is_UV', '$color')";
    mysqli_query($conn, $query);
}

// Remove Lens Type
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $query = "DELETE FROM Lens_Type WHERE lens_type_id = $id";
    mysqli_query($conn, $query);
}

// Edit Lens Type
if (isset($_POST['edit_lens_type'])) {
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $thickness = $_POST['Thickness'];
    $scratch_resistant = isset($_POST['scratch_resistant']) ? 1 : 0;
    $is_anti_reflective = isset($_POST['is_anti_reflective']) ? 1 : 0;
    $is_UV = isset($_POST['is_UV']) ? 1 : 0;
    $color = $_POST['L_Color'];
    $query = "UPDATE Lens_Type SET name = '$name', Thickness = '$thickness', scratch_resistant = '$scratch_resistant', is_anti_reflective = '$is_anti_reflective', is_UV = '$is_UV', L_Color = '$color' WHERE lens_type_id = $id";
    mysqli_query($conn, $query);
}

// Fetch Lens Types
$query = "SELECT * FROM Lens_Type";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lens Types</title>
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
            color: #77aaff;
            font-weight: bold;
        }
        #main {
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"], form input[type="checkbox"], form button {
            display: block;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions {
            display: flex;
            gap: 10px;
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
                    <li><a href="manage_brands.php">Manage Brands</a></li>
                    <li><a href="manage_categories.php">Manage Categories</a></li>
                    <li class="current"><a href="manage_lens_types.php">Manage Lens Types</a></li>
                    <li><a href="manage_frame_materials.php">Manage Frame Materials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div id="main">
            <h1>Manage Lens Types</h1>

            <form method="POST" action="" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <input type="text" name="Name" placeholder="Name" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="text" name="Thickness" placeholder="Thickness" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <label style="display: block; margin-bottom: 10px;">
                    <input type="checkbox" name="scratch_resistant"> Scratch Resistant
                </label>
                <label style="display: block; margin-bottom: 10px;">
                    <input type="checkbox" name="is_anti_reflective"> Anti Reflective
                </label>
                <label style="display: block; margin-bottom: 10px;">
                    <input type="checkbox" name="is_UV"> UV Protection
                </label>
                <input type="text" name="L_Color" placeholder="Color" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <button type="submit" name="add_lens_type" style="background: #333; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Add</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Thickness</th>
                        <th>Scratch Resistant</th>
                        <th>Anti Reflective</th>
                        <th>UV Protection</th>
                        <th>Color</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['lens_type_id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Thickness']; ?></td>
                            <td><?php echo $row['scratch_resistant'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $row['is_anti_reflective'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $row['is_UV'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $row['L_Color']; ?></td>
                            <td class="actions">
                                <a href="?remove=<?php echo $row['lens_type_id']; ?>" style="text-decoration: none; color: #e8491d;">Remove</a>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['lens_type_id']; ?>">
                                    <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>
                                    <input type="text" name="Thickness" value="<?php echo $row['Thickness']; ?>" required>
                                    <label>
                                        <input type="checkbox" name="scratch_resistant" <?php echo $row['scratch_resistant'] ? 'checked' : ''; ?>> Scratch Resistant
                                    </label>
                                    <label>
                                        <input type="checkbox" name="is_anti_reflective" <?php echo $row['is_anti_reflective'] ? 'checked' : ''; ?>> Anti Reflective
                                    </label>
                                    <label>
                                        <input type="checkbox" name="is_UV" <?php echo $row['is_UV'] ? 'checked' : ''; ?>> UV Protection
                                    </label>
                                    <input type="text" name="L_Color" value="<?php echo $row['L_Color']; ?>" required>
                                    <button type="submit" name="edit_lens_type">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
