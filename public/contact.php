<?php
include '../includes/header.php';
include('../includes/home-button.php'); ?>
<main>
   <h1>Contact Us</h1>
   <form action="#" method="POST">
       <label for="name">Name:</label><br />
       <input type="text" id="name" name="name" required /><br />
       
       <label for="email">Email:</label><br />
       <input type="email" id="email" name="email" required /><br />
       
       <label for="message">Message:</label><br />
       <textarea id="message" name="message" required></textarea><br />
       
       <input type="submit" value="Send Message" />
   </form>

   <!-- Handle form submission here if needed -->
</main>
<?php include '../includes/footer.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #ffecd2 0%, #77aaff 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    main {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: rgba(170, 188, 218, 0.5);
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #77aaff;
    }
</style>