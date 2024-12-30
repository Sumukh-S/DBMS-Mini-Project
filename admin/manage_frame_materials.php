<?php
include('../public/sql/config.php');
include('../includes/home-button.php');

// Add Frame Material
if (isset($_POST['add_frame_material'])) {
    $name = $_POST['Name'];
    $weight = $_POST['Weight'];
    $color = $_POST['F_Color'];
    $flexibility = $_POST['Flexibility'];
    $query = "INSERT INTO Frame_Material (Name, Weight, F_Color, Flexibility) VALUES ('$name', '$weight', '$color', '$flexibility')";
    mysqli_query($conn, $query);
}

// Remove Frame Material
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    $query = "DELETE FROM Frame_Material WHERE frame_material_id = $id";
    mysqli_query($conn, $query);
}

// Edit Frame Material
if (isset($_POST['edit_frame_material'])) {
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $weight = $_POST['Weight'];
    $color = $_POST['F_Color'];
    $flexibility = $_POST['Flexibility'];
    $query = "UPDATE Frame_Material SET Name = '$name', Weight = '$weight', F_Color = '$color', Flexibility = '$flexibility' WHERE frame_material_id = $id";
    mysqli_query($conn, $query);
}

// Fetch Frame Materials
$query = "SELECT * FROM Frame_Material";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Frame Materials</title>
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
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px;
        }
        button {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #77aaff;
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
                    <li><a href="manage_lens_types.php">Manage Lens Types</a></li>
                    <li class="current"><a href="manage_frame_materials.php">Manage Frame Materials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div id="main">
            <h1>Manage Frame Materials</h1>

            <form method="POST" action="">
                <input type="text" name="Name" placeholder="Name" required>
                <input type="text" name="Weight" placeholder="Weight" required>
                <input type="text" name="F_Color" placeholder="Color" required>
                <input type="text" name="Flexibility" placeholder="Flexibility" required>
                <button type="submit" name="add_frame_material">Add</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Color</th>
                        <th>Flexibility</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['frame_material_id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Weight']; ?></td>
                            <td><?php echo $row['F_Color']; ?></td>
                            <td><?php echo $row['Flexibility']; ?></td>
                            <td>
                                <a href="?remove=<?php echo $row['frame_material_id']; ?>">Remove</a>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['frame_material_id']; ?>">
                                    <input type="text" name="Name" value="<?php echo $row['Name']; ?>" required>
                                    <input type="text" name="Weight" value="<?php echo $row['Weight']; ?>" required>
                                    <input type="text" name="F_Color" value="<?php echo $row['F_Color']; ?>" required>
                                    <input type="text" name="Flexibility" value="<?php echo $row['Flexibility']; ?>" required>
                                    <button type="submit" name="edit_frame_material">Edit</button>
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