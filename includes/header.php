<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">
    <script src="../public/js/scripts.js" defer></script>
    <title>Eyewear Store</title>
    <style>
        header {
            background-color: rgba(0, 0, 0, 0.23);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            animation: fadeIn 1.5s ease-in-out;
        }

        .logo {
            font-size: 24px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
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
</head>
<body>
<header>
    <div class="logo">
        <img src="../public/images/eyewear.png" alt="Eyewear Store Logo" style="height: 40px;">
    </div>
    <nav>
        <ul>
            <li><a href="../public/index.php">Home</a></li>
            <li><a href="../public/about.php">About</a></li>
            <li><a href="../public/contact.php">Contact</a></li>
            <li><a href="../admin/index.php">Admin</a></li>
            <li><a href="../public/login.php">Login</a></li>
        </ul>
    </nav>
</header>
