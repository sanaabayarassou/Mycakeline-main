<?php
session_start();
require 'includes/db.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $email;
                
                header("Location: index.php");
                exit();
            } else {
                $error_message = "كلمة المرور غير صحيحة";
            }
        } else {
            $error_message = "البريد الإلكتروني غير مسجل";
        }
    } catch (mysqli_sql_exception $e) {
        $error_message = "حدث خطأ في قاعدة البيانات: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title>Login </title>
</head>
<body>
    <div class="login-container">
        <h2 >Login to Mycakeline</h2>
        <form id="login-form" method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn " ><h2> login</h2></button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>

    
</body>
</html>