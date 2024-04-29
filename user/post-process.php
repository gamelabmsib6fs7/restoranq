<?php

include("../config/database.php");

if(isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "";

        if ($id) {
            if($password) {
                $sql = "update users set name='$name', username='$username', password='" . md5($password) . "' where id= $id";
            } else {
                $sql = "update users set name='$name', username='$username' where id= $id";
            }
        } else {
            $sql = "insert into users(name, username, password) values ('$name', '$username','" . md5($password) . "')";
        }

        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: index.php?success=Data berhasil dieksekusi');
        } else {
            header('Location: form.php?error=Data gagal dieksekusi' . "&id=$id");
        }
    } catch(Exception $exception) {
        header('Location: form.php?error=' . $exception->getMessage() . "&id=$id");
    }
} else {
    die("akses dilarang...");
}
