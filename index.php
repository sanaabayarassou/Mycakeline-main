
<?php
// يجب أن يكون هذا أول سطر في الملف
session_start();
require 'includes/db.php';

// التحقق من وجود أخطاء في الاتصال
if (!isset($conn) || $conn->connect_error) {
    die("Connection failed");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lora&family=Poppins&family=Raleway&family=Open+Sans&family=Dancing+Script&display=swap" rel="stylesheet">  
    <title>Mycakeline </title>
</head>
<body> 
    
    <div class="navbar">
        <div class="logo">
           <h3>Mycakeline</h3>
        </div>
        <div class="list">
            <ul>
                <li> <a href="index.php"> Home</a></li>
                <li> <a href="login.php">login </a></li> 
              
            </ul>
        </div>

    </div>
    
    <div class="Home">
        <div class="hero-content">
            <h1>Welcome to  Mycakeline </h1>
            <p>Indulge in the finest handmade pastries, crafted with love and tradition.</p>
            <button onclick="window.location.href='customize-cake.php'">Make Your Own Cake</button>
        </div>
    </div>
    <script src="js.js"></script>
    
</body>
</html>