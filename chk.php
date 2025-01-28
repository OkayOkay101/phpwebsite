<?php
session_start();
require("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
        exit();
    }

    // Secure SQL using prepared statements
    $stmt = $con->prepare("SELECT * FROM employee WHERE emp_user = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (md5($password) === $row['emp_pass']) { // Replace with password_verify() for better security
            $_SESSION["emp_id"] = $row["emp_id"];
            $_SESSION["emp_user"] = $row["emp_name"] . " " . $row["empp_username"];
            $_SESSION["emp_level"] = $row["emp_level"];

            // Redirect based on level
            if ($_SESSION["emp_level"] === "a") {
                header("location:admin_page.php");
                exit();
            } elseif ($_SESSION["emp_level"] === "u") {
                header("location:user_page.php");
                exit();
            }
        } else {
            echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    header("location:login.php");
    exit();
}
?>
