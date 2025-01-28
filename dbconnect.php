<?php
$servername = "localhost";
$username = "its66040233114";
$password = "U3seT8U5"; // เว้นว่างไว้หากไม่ได้ตั้งรหัสผ่าน
$dbname = "its66040233114"; // ชื่อฐานข้อมูลของคุณ

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>


