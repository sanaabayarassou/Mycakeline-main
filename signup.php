<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // تحقق من عدم وجود email مكرر
    $check = $conn->query("SELECT id FROM users WHERE email='$email'");
    
    if ($check->num_rows > 0) {
        die("البريد الإلكتروني مسجل مسبقاً");
    } else {
        // إدراج البيانات
        $sql = "INSERT INTO users (name, email, password) 
                VALUES ('$name', '$email', '$password')";
        
        if ($conn->query($sql)) {
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: index.php");
            exit();
        } else {
            die("خطأ في التسجيل: " . $conn->error);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lora&family=Poppins&family=Raleway&family=Open+Sans&family=Dancing+Script&display=swap" rel="stylesheet">  
    <title>Sign Up </title>
</head>
<body>
    

    <div class="signup-container">
        <h2>Sign Up</h2>
        <div class="form-group">
    <label for="email">email</label>
    <input type="email" id="email" name="email" required>
</div>

<div class="form-group">
    <label for="password">password </label>
    <input type="password" id="password" name="password" required minlength="6">
</div>

<div class="form-group">
    <label for="confirm-password">confirm password</label>
    <input type="password" id="confirm-password" name="confirm-password" required>
</div>

<button type="submit"> submit</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>

    
</body>
</html>