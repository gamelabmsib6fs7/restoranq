<?php

include("../config/database.php");

if(isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $note = $_POST['note'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category_id = $_POST['category_id'];


    try {
        $sql = "";

        if ($id) {
            $sql = "update menus set name='$name', note='$note', price='$price' , status='$status' , category_id='$category_id'  where id= $id";
        } else {
            $sql = "insert into menus(name, note, price, status, category_id) values ('$name', '$note', '$price', '$status', '$category_id')";
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
