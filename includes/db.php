<?php
// إعدادات عرض الأخطاء
error_reporting(E_ALL);
ini_set('display_errors', 1);

// معلومات الاتصال بقاعدة البيانات
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mycakeline_db';

// إنشاء اتصال
$conn = new mysqli($host, $user, $pass, $db);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// تعيين ترميز الأحرف
$conn->set_charset("utf8mb4");
?>