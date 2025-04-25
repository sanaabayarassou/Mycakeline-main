<?php
require 'db.php'; // استدعاء ملف الاتصال

// اختبار استعلام بسيط
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>الجداول الموجودة في قاعدة البيانات:</h3>";
    while($row = $result->fetch_assoc()) {
        echo "- " . $row["Tables_in_mycakeline_db"] . "<br>";
    }
} else {
    echo "لا توجد جداول في قاعدة البيانات";
}

$conn->close();
?>