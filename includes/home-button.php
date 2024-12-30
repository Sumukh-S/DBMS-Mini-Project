    <style>
    .floating-button {
        position: fixed;
        bottom: 70px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: white;
        border: 2px solid #ddd;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .floating-button:hover {
        background-color: #f1f1f1;
    }
    .floating-button img {
        width: 24px;
        height: 24px;
    }
    </style>
    <a href="../public/index.php" class="floating-button">
        <img src="../public/images/home.png" alt="Home">
    </a>