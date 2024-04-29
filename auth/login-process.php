<?php

include("../config/database.php");

session_start();

if (isset($_SESSION['user_id'])) {

    header("Location: ../dashboard");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['id'];

        header("Location: ../dashboard");
    } else {
        header("Location: index.php?error=Username atau password Anda salah. Silahkan coba lagi!");
    }
}
