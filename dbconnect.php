<!--<link href="css/style.css" rel="stylesheet">-->
<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "mydata");

// Check connection
if (!$con) {
    die("เกิดข้อผิดพลาด: " . mysqli_connect_error());
}

// Set character encoding to UTF-8
mysqli_set_charset($con, "utf8");
?>

