

<style>
footer {
    background-color: rgba(0, 0, 0, 0.28);
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    animation: fadeIn 2s ease-in-out;
}

footer p {
    margin: 0;
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
<footer>
   <p>&copy; <?php echo date("Y"); ?> Eyewear Store. All rights reserved.</p>
</footer>